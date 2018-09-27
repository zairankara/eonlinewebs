// Copyright 2012 Google Inc. All Rights Reserved.

/**
 * @fileoverview Survery URL Javascript file for the 'IAB Mobile Rising Stars
 * Adhesion' DoubleClick Rich Media ad format. The file needs to be linked to
 * the creative in DFA. Talk to your trafficker to set this up for you.
 * Version 1.11.
 * @author pigozzop@google.com (Paolo Pigozzo)
 */


/**
 * Namespace declaration.
 * @type {Object}
 */
var dcrm = dcrm || {};


/** @const */ dcrm.COLLAPSED_WIDTH = '100%';
/** @const */ dcrm.DEFAULT_HEIGHT = 50;


/**
 * Updates the viewport variables.
 */
dcrm.getViewport = function() {
  dcrm.fullscreenWidth = window.innerWidth;
  dcrm.fullscreenHeight = window.innerHeight;
};


/**
 * Checks if a string is contained in navigator.userAgent.
 * @param {string} str The string to be checked against.
 * @return {boolean} Whether navigator.userAgent contains the input string.
 */
dcrm.browserCheck = function(str) {
  return (navigator.userAgent.toLowerCase().indexOf(str.toLowerCase()) >= 0);
};


/**
 * Checks if current browser supports correctly 'position:fixed'.
 * @return {boolean} Whether current browser supports 'position:fixed'.
 */
dcrm.checkPositionFixedSupport = function() {
  var supported = false;
  // Supported correctly on Android 2.3+.
  if (dcrm.browserCheck('android')) {
    if (dcrm.browserCheck('android 2.3') || dcrm.browserCheck('android 3') ||
        dcrm.browserCheck('android 4') || dcrm.browserCheck('android 5')) {
      supported = true;
    }
    // Chrome on Android has an issue (the clickable area doesn't scroll).
    if (dcrm.browserCheck('chrome') || dcrm.browserCheck('CriOS')) {
      supported = false;
    }
  }
  // iOS support.
  if (dcrm.browserCheck('iPhone OS')) {
    // Supported in Mobile Safari only in iOS 5+ (and only after user scroll).
    if (dcrm.browserCheck('Safari')) {
      dcrm.iOsVersion = navigator.userAgent.charAt(navigator.userAgent.indexOf(
          'iPhone OS') + 10);
      if (Number(dcrm.iOsVersion) > 4) {
        supported = true;
        // Sets a flag to apply a workaround during the first user scroll.
        dcrm.positionFixedFix = true;
      }
    }
    // Full support with Chrome/iOS.
    if (dcrm.browserCheck('Chrome') || dcrm.browserCheck('CriOS')) {
      supported = true;
      dcrm.positionFixedFix = false;
    }
  }
  // Blackberry support (version 7+).
  if (dcrm.browserCheck('blackberry') && (Number(navigator.userAgent.charAt(
      navigator.userAgent.indexOf('Version/') + 8)) > 6)) {
    supported = true;
  }
  // Regardless of OS, not fully supported in Opera (Mobile\Mini) browsers.
  if (dcrm.browserCheck('opera')) {
    supported = false;
  }
  return supported;
};


/**
 * Applies site-specific fixes (based on document domain).
 */
dcrm.siteSpecificFixes = function() {
  // Corriere.it needs scaling in landscape mode (through class 'fixedScale').
  if ((document.domain.indexOf('corriere.it') >= 0) &&
      dcrm.browserCheck('iPhone')) {
    if ((window.orientation == 90) || (window.orientation == -90)) {
      var jsonMessage = { action: 'fixedScale' };
    } else {
      var jsonMessage = { action: 'removeFixedScale' };
    }
    try {
      window.frames[0].postMessage(JSON.stringify(jsonMessage), '*');
    } catch (e) {
    }
  }
};


/**
 * Setups the positioning of the footer ad and the sets the values of some
 * variables depending on the browser or Studio version.
 * Invoked from the creative main JS file though a postMessage call.
 */
dcrm.creativeSetup = function() {
  dcrm.fullscreenHeight = '100%';
  dcrm.fullscreenWidth = '100%';
  dcrm.collapsedHeight = dcrm.collapsedHeight ? dcrm.collapsedHeight : dcrm.DEFAULT_HEIGHT;
  dcrm.positionFixedSupported = false;
  dcrm.positionFixedFix = false;
  dcrm.verticalScrollOnExpand = 0;
  dcrm.previousOrientation = 0;
  dcrm.studioV2 = (typeof studioV2 != 'undefined');
  if (dcrm.studioV2 && studioV2.api) {
    for (var i = 0; i < studioV2.api.creatives.length; i++) {
      if (studioV2.api.creatives[i].getAdserverCreativeId() ==
          dcrm.creativeId) {
        dcrm.asset = studioV2.api.creatives[i].getFirstAssetByType(
            studioV2.api.creatives[i].AssetTypes.FLOAT);
        break;
      }
    }
    dcrm.creativeDiv = dcrm.asset.getContainerElement();
    dcrm.creativeIframe = dcrm.asset.getAssetElement();
    dcrm.asset.setPosition(0, 'auto');
    dcrm.asset.setDimension(dcrm.COLLAPSED_WIDTH, dcrm.collapsedHeight);
    dcrm.asset.addExpandCallback(dcrm.expandCallbackStudioV2);
  } else {
    if (typeof creative == 'undefined') {
      // delay in studioV2 availability
      setTimeout('dcrm.creativeSetup()', 100);
      return;
    }
    if (dcrm.adId) {
      dcrm.creativeDiv = document.getElementById('DIV_' + dcrm.adId);
      dcrm.creativeIframe = document.getElementById('IFRAME_' + dcrm.adId);
    }
    if (creative.assets[core.ASSET_TYPE_FLOATING]) {
      creative.assets[core.ASSET_TYPE_FLOATING].offsetRight = '5000px';
      creative.assets[core.ASSET_TYPE_FLOATING].top = 'auto';
      creative.assets[core.ASSET_TYPE_FLOATING].left = '0px';
      if (!dcrm.creativeDiv) {
        // fallback solution in case dcrm.adId has not been correctly set
        dcrm.creativeDiv = document.getElementById('DIV_' +
            creative.assets[core.ASSET_TYPE_FLOATING].variableName);
        dcrm.creativeIframe = document.getElementById('IFRAME_' +
            creative.assets[core.ASSET_TYPE_FLOATING].variableName);
      }
    }
  }
  dcrm.positionFixedSupported = dcrm.checkPositionFixedSupport();
  dcrm.creativeCollapse();
  dcrm.siteSpecificFixes();
};


/**
 * Adjusts the creative properties on collapse.
 */
dcrm.creativeCollapse = function() {
  if (dcrm.positionFixedSupported) {
    if (dcrm.positionFixedFix) {
      // Need to use absolute positioning in Safari before first user scroll.
      dcrm.creativeDiv.style.position = 'absolute';
      var fixedInnerHeight = (window.orientation == 0) ?
          (screen.height > 480 ? 504 : 416) : 220;
      dcrm.creativeDiv.style.top = (fixedInnerHeight - dcrm.collapsedHeight) +
          'px';
    } else {
      dcrm.creativeDiv.style.position = 'fixed';
      dcrm.creativeDiv.style.top = 'auto';
    }
  } else {
    dcrm.creativeDiv.style.position = 'absolute';
    dcrm.creativeDiv.style.top = (window.pageYOffset + window.innerHeight -
        dcrm.collapsedHeight) + 'px';
  }
  dcrm.creativeDiv.style.left = '0px';
  dcrm.creativeDiv.style.width = dcrm.COLLAPSED_WIDTH;
  dcrm.creativeDiv.style.height = dcrm.collapsedHeight + 'px';
  dcrm.creativeIframe.style.width = dcrm.COLLAPSED_WIDTH;
  dcrm.creativeIframe.width = dcrm.COLLAPSED_WIDTH;
  dcrm.creativeIframe.height = dcrm.collapsedHeight + 'px';
  dcrm.creativeDiv.style.bottom = '0px';
  if (dcrm.studioV2) {
    dcrm.asset.setDimension(dcrm.COLLAPSED_WIDTH, dcrm.collapsedHeight);
  }
  dcrm.creativeState = 'collapsed';
  // we need a small delay to be sure the footer is properly positioned:
  setTimeout('window.scrollTo(0, dcrm.verticalScrollOnExpand)', 50);
};


/**
 * Adjusts the creative properties on expand.
 */
dcrm.creativeExpand = function() {
  dcrm.verticalScrollOnExpand = window.scrollY;
  window.scrollTo(0, 1);
  dcrm.getViewport();
  dcrm.creativeDiv.style.left = '0px';
  dcrm.creativeDiv.style.top = '0px';
  dcrm.creativeDiv.style.position = 'absolute';
  dcrm.creativeDiv.style.width = dcrm.fullscreenWidth + 'px';
  dcrm.creativeDiv.style.height = dcrm.fullscreenHeight + 'px';
  dcrm.creativeIframe.style.width = dcrm.fullscreenWidth + 'px';
  dcrm.creativeIframe.style.height = dcrm.fullscreenHeight + 'px';
  if (dcrm.studioV2) {
    dcrm.asset.setDimension(dcrm.fullscreenWidth, dcrm.fullscreenHeight);
  }
  dcrm.creativeState = 'expanded';
  setTimeout('dcrm.checkExpandedPanel()', 500);
};

/**
 * Updates the expanded size of the panel to avoid issues on some devices where
 * size\orientation changes do not fire events correctly.
 */
dcrm.checkExpandedPanel = function() {
  if (dcrm.creativeState == 'expanded') {
    dcrm.checkOrientation();
    dcrm.creativeExpand();
  }
};

/**
 * Updates the creative size on expand (V2 GlobalTemplate).
 */
dcrm.expandCallbackStudioV2 = function() {
  dcrm.asset.setDimension(dcrm.fullscreenWidth, dcrm.fullscreenHeight);
};


/**
 * Updates the footer position on scroll\move\resize\orientation change.
 */
dcrm.updatePosition = function() {
  if (dcrm.creativeState == 'collapsed') {
    if (dcrm.creativeDiv.style.position == "absolute") {
      dcrm.creativeDiv.style.top = (window.pageYOffset + window.innerHeight -
          dcrm.collapsedHeight) + 'px';
    }
  } else if (dcrm.creativeState == 'expanded') {
    dcrm.creativeDiv.style.top = (window.pageYOffset) + 'px';
  }
};


/**
 * Handles the footer position\visibility on 'touchmove' events.
 */
dcrm.touchMoveHandler = function() {
  console.log('touchmove');
  if ((dcrm.creativeState == 'collapsed') &&
      (!dcrm.positionFixedSupported || dcrm.positionFixedFix)) {
    if (!dcrm.browserCheck('Android')) {
      // Hides footer while scrolling (no reliable 'touchend' event in Android)
      dcrm.creativeDiv.style.visibility = 'hidden';
      console.log('hidden visibility');
    }
    dcrm.updatePosition();
  }
  if (dcrm.positionFixedFix) {
    dcrm.positionFixedFix = false;
    // After first scroll 'position: fixed' can correctly work also on Safari.
    dcrm.creativeDiv.style.position = 'fixed';
    dcrm.creativeDiv.style.top = 'auto';
  }
};


/**
 * Handles the footer visibility on 'touchend' events.
 */
dcrm.touchEndHandler = function() {
  console.log('touchend');
  dcrm.creativeDiv.style.visibility = 'visible';
};


/**
 * Checks the device orientation and adapts the creative accordingly.
 */
dcrm.checkOrientation = function() {
  if (window.orientation !== dcrm.previousOrientation) {
    dcrm.previousOrientation = window.orientation;
    dcrm.siteSpecificFixes();
    if (dcrm.creativeState == 'expanded') {
      // Timeout needed because of small delays on Android standard browser.
      setTimeout('dcrm.creativeExpand()', 400);
    } else {
      dcrm.updatePosition();
    }
  }
};


/**
 * Handles messages received from the creative main JS file through postMessage.
 * @param {event} event The event containing the received message.
 */
dcrm.messageHandler = function(event) {
  // Checks the message comes from the trusted DoubleClick domain
  var message;
  /* need to avoid this check after latest Studio push
  if ((event.origin !== 'http://s0.2mdn.net') && (event.origin.indexOf('adstudio.googleusercontent.com') < 0)) {
    return;
  } */
  try {
    message = JSON.parse(event.data);
  } catch (e) {
    return;
  }
  switch (message.action) {
    case 'collapse':
      // need both these calls to avoid issues when an exit opens a new tab.
      if (dcrm.iOsVersion && (dcrm.iOsVersion < 6)) {
        dcrm.positionFixedFix = true;
      }
      dcrm.creativeCollapse();
      setTimeout('dcrm.creativeCollapse()', 100);
      break;
    case 'setup':
      dcrm.adId = message.adId;
      dcrm.creativeId = message.creativeId;
      if (message.collapsedHeight) {
        dcrm.collapsedHeight = message.collapsedHeight;
      }
      dcrm.creativeSetup();
      break;
    case 'expand':
      dcrm.creativeExpand();
      break;
    case 'landscape':
      dcrm.checkOrientation();
      break;
    case 'portrait':
      dcrm.checkOrientation();
      break;
  }
};


// Window listeners:
window.addEventListener('scroll', dcrm.updatePosition, false);
window.addEventListener('touchmove', dcrm.touchMoveHandler, false);
window.addEventListener('touchend', dcrm.touchEndHandler, false);
window.addEventListener('resize', dcrm.checkOrientation, false);
window.addEventListener('orientationchange', dcrm.checkOrientation, false);
window.addEventListener('message', dcrm.messageHandler, false);
