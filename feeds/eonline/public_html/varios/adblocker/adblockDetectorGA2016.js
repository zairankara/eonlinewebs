// ===============================================
// AdBlock detector
//
// Attempts to detect the presence of Ad Blocker software
// and notify listener of its existence.
// Copyright (c) 2015 IAB
//
// The MIT License (MIT)
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
// 
// The above copyright notice and this permission notice shall be included in all
// copies or substantial portions of the Software.
// 
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
// SOFTWARE.
//
//THIS SCRIPT IS PROVIDED STRICTLY "AS IS", AND SHOULD ONLY BE USED IN COMPLIANCE WITH EXISTING LOCAL LAWS AND REGULATIONS.
// ===============================================

/**
* @name window.adblockDetector
*
* IAB Adblock detector.
* Usage: window.adblockDetector.init(options);
*
* Options object settings
*
*   @prop blockLists: 	Array  
*         Array of string URLs to additional external definition files for bait
*
*	@prop testRemoteList: boolean
*         Flag to indicate a remote list should be used for testing
*         in addition to the simple bait definition in this file.
*         true:  Download external bait definition
*         false: Only test with quick bait
*
*	@prop debug:  boolean
*         Flag to indicate additional debug output should be printed to console
*
*	@prop debug:  useLocalBait
*         Flag to turn on or off usage of the internal quick bait.
*         This is primarily used for testing of remote bait. True by default
*
*	@prop found: @function
*         Callback function to fire if adblock is detected
*
*	@prop notfound: @function
*         Callback function to fire if adblock is not detected.
*         NOTE: this function may fire multiple times and give false negative
*         responses during a test until adblock is successfully detected.
*
*	@prop complete: @function
*         Callback function to fire once a round of testing is complete.
*         The test result (boolean) is included as a parameter to callback
*
* example: 	window.adblockDetector.init(
				{
					blockLists: ['example_remote_adblockdetector_data.js'],
					found: function(){ ...},
 					notFound: function(){...}
				}
			);
*
*
*/

"use strict";
(function(win) {

	function isMobile(){
	    return (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino|android|playbook|silk/i.test(navigator.userAgent||navigator.vendor||window.opera)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test((navigator.userAgent||navigator.vendor||window.opera).substr(0,4)))
	}
	if(isMobile()) {
		var esmobile=" MOBILE";
	}else{
		var esmobile=" DESKTOP";
	}

	
	var ENABLE_ANALYTICS = true;
	var GA_TRACKING_ID = 'UA-18061947-40'; // sample for http://adblockdetector.emination.com/
	var analytics = {}; // later initialized
	
	// Credit to Easylist https://easylist.adblockplus.org/en/
	// var blockListUrl = 'https://easylist-downloads.adblockplus.org/easylist_noadult.txt'
	
	var ofs = 'offset', cl = 'client';
	var noop = function(){};
	
	var testedOnce = false;
	var testExecuting = false;
	
	var isOldIEevents = (win.addEventListener === undefined);
	
	/**
	* Options set with default options initialized
	*
	*/	
	var _options = {
		loopDelay: 50,
		maxLoop: 5,
		testRemoteList: true,
		debug: true,
		useLocalBait: true,
		blockLists: [],
		found: noop, 					// function to fire when adblock detected
		notfound: noop, 				// function to fire if adblock not detected after testing
		complete: noop  				// function to fire after testing completes, passing result as parameter
	}
	
	function parseAsJson(data){
		var result, fnData;
		try{
			result = JSON.parse(data);
		}
		catch(ex){
			try{
				fnData = new Function("return " + data);
				result = fnData();
			}
			catch(ex){
				log('Failed secondary JSON parse', true);
			}			
		}
		
		return result;
	}
	
	/**
	* Ajax helper object to download external scripts.
	* Initialize object with an options object
	* Ex:
	  {
		  url : 'http://example.org/url_to_download',
		  method: 'POST|GET',
		  success: callback_function,
		  fail:  callback_function
	  }		
	*/
	var AjaxHelper = function(opts){
		var xhr = new XMLHttpRequest();
		
		this.success = opts.success || noop;
		this.fail = opts.fail || noop;
		var me = this;
		
		var method = opts.method || 'get';
		
		/**
		* Abort the request
		*/
		this.abort = function(){
			try{
				xhr.abort();
			}
			catch(ex){
			}
		}
		
		function stateChange(vals){
			if(xhr.readyState == 4){
				if(xhr.status == 200){
					me.success(xhr.response);
				}
				else{
					// failed
					me.fail(xhr.status);
				}				
			}
		}
		
		xhr.onreadystatechange = stateChange;
		
		function start(){
			xhr.open(method, opts.url, true);
			xhr.send();
		}
		
		start();
	}
	
	/**
	* Object tracking the various block lists
	*/
	var BlockListTracker = function(){
		var me = this;
		var externalBlocklistData = {};
		
		/**
		* Add a new external URL to track
		*/
		this.addUrl = function(url){
			externalBlocklistData[url] = {
				url: url,
				state: 'pending',
				format: null,
				data: null,
				result: null
			}
			
			return externalBlocklistData[url];
		}
		
		/**
		* Loads a block list definition
		*/
		this.setResult = function(urlKey, state, data){
			var obj = externalBlocklistData[urlKey];
			if(obj == null){
				obj = this.addUrl(urlKey);
			}
			
			obj.state = state;
			if(data == null){
				obj.result = null;
				return;
			}
			
			if(typeof data === 'string'){
				try{
					data = parseAsJson(data);
					obj.format = 'json';
				}
				catch(ex){
					obj.format = 'easylist';
					// parseEasyList(data);
				}
			}
			obj.data = data;
			
			return obj;
		}
		
	}
	
	var listeners = []; // event response listeners
	var baitNode = null;
	var quickBait = {
		cssClass: 'pub_300x250 pub_300x250m pub_728x90 text-ad textAd text_ad text_ads text-ads text-ad-links'		
	};
	var baitTriggers = {
		nullProps: [ofs + 'Parent'],
		zeroProps: []
	};
	
	baitTriggers.zeroProps = [
		ofs +'Height', ofs +'Left', ofs +'Top', ofs +'Width', ofs +'Height',
		cl + 'Height', cl + 'Width'
	];
	
	// result object
	var exeResult = {
		quick: null,
		remote: null
	};
	
	var findResult = null; // result of test for ad blocker
	
	var timerIds = {
		test: 0,
		download: 0
	};
	
	function isFunc(fn){
		return typeof(fn) == 'function';
	}
	
	/**
	* Make a DOM element
	*/
	function makeEl(tag, attributes){
		var k, v, el, attr = attributes;
		var d = document;
		
		el = d.createElement(tag);
		
		if(attr){
			for(k in attr){
				if(attr.hasOwnProperty(k)){
					el.setAttribute(k, attr[k]);
				}
			}
		}
		
		return el;
	}
	
	function attachEventListener(dom, eventName, handler){
		if(isOldIEevents){
			dom.attachEvent('on' + eventName, handler);
		}
		else{
			dom.addEventListener(eventName, handler, false);
		}
	}
	
	function log(message, isError){
		if(!_options.debug && !isError){
			return;
		}
		if(win.console && win.console.log){
			if(isError){
				console.error('[ABD] ' + message);
			}
			else{
				console.log('[ABD] ' + message);
			}
		}
	}
	
	var ajaxDownloads = [];
	
	/**
	* Load and execute the URL inside a closure function
	*/
	function loadExecuteUrl(url){
		var ajax, result;
		
		blockLists.addUrl(url);
		// setup call for remote list
		ajax = new AjaxHelper(
			{ 
				url: url,
				success: function(data){
					log('downloaded file ' + url); // todo - parse and store until use
					result = blockLists.setResult(url, 'success', data);
					try{
						var intervalId = 0,
							retryCount = 0;
						
						var tryExecuteTest = function(listData){
							if(!testExecuting){
								beginTest(listData, true);
								return true;
							}
							return false;			
						}
						
						if(findResult == true){
							return;
						}
						
						if(tryExecuteTest(result.data)){
							return;
						}
						else{							
							log('Pause before test execution');
							intervalId = setInterval(function(){
								if(tryExecuteTest(result.data) || retryCount++ > 5){
									clearInterval(intervalId);
								}
							}, 250);
						}
					}
					catch(ex){
						log(ex.message + ' url: ' + url, true);
					}
				},
				fail: function(status){
					log(status, true);
					blockLists.setResult(url, 'error', null);
				}
			});
			
		ajaxDownloads.push(ajax);
	}
	
	
	/**
	* Fetch the external lists and initiate the tests
	*/
	function fetchRemoteLists(){
		var i, url;
		var opts = _options;
		
		for(i=0;i<opts.blockLists.length;i++){
			url = opts.blockLists[i];
			loadExecuteUrl(url);			
		}
	}
	
	function cancelRemoteDownloads(){
		var i, aj;
		
		for(i=ajaxDownloads.length-1;i >= 0;i--){
			aj = ajaxDownloads.pop();
			aj.abort();
		}		
	}
	
	
	// =============================================================================
	/**
	* Begin execution of the test
	*/
	function beginTest(bait, isRemote){
		log('start beginTest');
		if(findResult == true){
			return; // we found it. don't continue executing
		}
		testExecuting = true;
		castBait(bait);
		
		if(!isRemote){
			exeResult.quick = 'testing';
		}
		else {
			exeResult.remote = 'testing';
		}
		
		timerIds.test = setTimeout(
			function(){ reelIn(bait, 1); },
			5);
			
		if(!isRemote && _options.testRemoteList){
			fetchRemoteLists();
		}
	}
	
	/**
	* Create the bait node to see how the browser page reacts
	*/
	function castBait(bait){
		var i, d = document, b = d.body;
		var t;
		var baitStyle = 'width: 1px !important; height: 1px !important; position: absolute !important; left: -10000px !important; top: -1000px !important;'
		
		if(bait == null || typeof(bait) == 'string'){
			log('invalid bait being cast');
			return;
		}
		
		if(bait.style != null){
			baitStyle += bait.style;
		}
		
		baitNode = makeEl('div', {
			'class': bait.cssClass,
			'style': baitStyle
		});
		
		log('adding bait node to DOM');
		b.appendChild(baitNode);
		
		// touch these properties to insure initialization
		for(i=0;i<baitTriggers.nullProps.length;i++){
			t = baitNode[baitTriggers.nullProps[i]];
		}
		for(i=0;i<baitTriggers.zeroProps.length;i++){
			t = baitNode[baitTriggers.zeroProps[i]];
		}
	}
	
	/**
	* Run tests to see if browser has taken the bait and blocked the bait element
	*/
	function reelIn(bait, attemptNum){
		var i, k, v;
		var body = document.body;
		var found = false;
		var findTrigger = null;
		
		if(baitNode == null){
			log('recast bait');
			castBait(bait || quickBait);
		}
		
		if(typeof(bait) == 'string'){
			log('invalid bait used', true);
			if(clearBaitNode()){
				setTimeout(function(){
					testExecuting = false;
				}, 5);
			}

			return;
		}
		
		if(timerIds.test > 0){
			clearTimeout(timerIds.test);
			timerIds.test = 0;
		}
		
		// test for issues
		
		if(body.getAttribute('abp') !== null){
			log('found adblock body attribute');
			found = true;
			findTrigger = 'body_abp_attr';
		}
		
		if(!found){
			for(i=0;i<baitTriggers.nullProps.length;i++){
				if(baitNode[baitTriggers.nullProps[i]] == null){
					found = true;
					log('found adblock null attr: ' + baitTriggers.nullProps[i]);
					findTrigger = 'null_attr ' + baitTriggers.nullProps[i];
					break;
				}
				if(found == true){
					break;
				}
			}

			for(i=0;i<baitTriggers.zeroProps.length;i++){
				if(found == true){
					break;
				}
				if(baitNode[baitTriggers.zeroProps[i]] == 0){
					found = true;
					findTrigger = 'zero_attr ' + baitTriggers.zeroProps[i];
					log('found adblock zero attr: ' + baitTriggers.zeroProps[i]);
				}
			}
		}
		
		if(!found){
			if(window.getComputedStyle !== undefined) {
				var baitTemp = window.getComputedStyle(baitNode, null);
				if(baitTemp.getPropertyValue('display') == 'none'
				|| baitTemp.getPropertyValue('visibility') == 'hidden') {
					found = true;
					findTrigger = 'computedStyle indicator';
					log('found adblock computedStyle indicator');
				}
			}
		}
		
		testedOnce = true;
		if(found || attemptNum++ >= _options.maxLoop){
			findResult = found;
			try{
				if(found){
					analytics.blockerDetected(findTrigger, attemptNum);
				}
				else{
					analytics.blockerNotDetected();
				}
			}
			catch(ex){
				log(ex.message);
			}
					
			log('exiting test loop - value: ' + findResult);
			notifyListeners();
			if(clearBaitNode()){
				setTimeout(function(){
					testExecuting = false;
				}, 5);
			}
		}
		else{
			timerIds.test = setTimeout(function(){
				reelIn(bait, attemptNum);
			}, _options.loopDelay);
		}
	}
	
	function clearBaitNode(){
		if(baitNode === null){
			return true;
		}
		
		try{
			if(isFunc(baitNode.remove)){
				baitNode.remove();
			}
			document.body.removeChild(baitNode);
		}
		catch(ex){
		}
		baitNode = null;
		
		return true;		
	}
	
	/**
	* Halt the test and any pending timeouts
	*/
	function stopFishing(){
		if(timerIds.test > 0){
			clearTimeout(timerIds.test);
		}
		if(timerIds.download > 0){
			clearTimeout(timerIds.download);
		}
		
		cancelRemoteDownloads();
		
		clearBaitNode();
	}
	
	/**
	* Fire all registered listeners
	*/
	function notifyListeners(){
		var i, funcs;
		if(findResult === null){
			return;
		}
		for(i=0;i<listeners.length;i++){
			funcs = listeners[i];
			try{			
				if(funcs != null){
					if(isFunc(funcs['complete'])){
						funcs['complete'](findResult);
					}
					
					if(findResult && isFunc(funcs['found'])){
						funcs['found']();
					}
					else if(findResult === false && isFunc(funcs['notfound'])){
						funcs['notfound']();
					}
				}
			}
			catch(ex){
				log('Failure in notify listeners ' + ex.Message, true);
			}
		}
	}
	
	/**
	* Attaches event listener or fires if events have already passed.
	*/
	function attachOrFire(){
		var fireNow = false;
		var fn;
		
		if(document.readyState){
			if(document.readyState == 'complete'){
				fireNow = true;
			}
		}
		
		fn = function(){
			if(_options.useLocalBait){
				beginTest(quickBait, false);
			}
			else{
				log('ignoreing local bait - download remote');
				fetchRemoteLists();
			}
		}
		
		if(fireNow){
			fn();
		}
		else{
			attachEventListener(win, 'load', fn);
		}
	}
	
	
	var blockLists; // tracks external block lists
	
	var impl = {
		
		init: function(options){
			var k, v, funcs;
			
			if(!options){
				return;
			}
			
			funcs = {
				complete: noop,
				found: noop,
				notfound: noop
			};
			
			for(k in options){
				if(options.hasOwnProperty(k)){
					if(k == 'complete' || k == 'found' || k == 'notFound'){
						funcs[k.toLowerCase()] = options[k];
					}
					else{
						_options[k] = options[k];
					}					
				}
			}
			
			listeners.push(funcs);
			
			blockLists = new BlockListTracker();
			
			attachOrFire();
		}
	}
	
	win['adblockDetector'] = impl;
	
	
	// ================= ANALYTICS WRAPPER ==================
	/**
	* Object literal wrapper for the various analytics frameworks
	*/
	analytics = {
		key: {
			BLOCKER : 'AdBlocker',
			FOUND : 'Adblocker Encontrado',
			NOT_FOUND: 'Adblocker No Encontrado',
			DETECT: 'Detect Adblocker '+esmobile			
		},
		
		recordEvent: function(category, action, label, value){
			if(!ENABLE_ANALYTICS){
				return;
			}
			
			// send, event, CATEGORY, ACTION, LABEL, VALUE
			ga('send', 'event', category, action, label, value);
		},
		
		blockerDetected: function(triggerFound, attemptNum){
			var k = analytics.key;
			analytics.recordEvent(k.DETECT, k.FOUND, triggerFound, attemptNum);
		},
		
		blockerNotDetected: function(){
			var k = analytics.key;
			analytics.recordEvent(k.DETECT, k.NOT_FOUND);
		}
		
	}
	
	
	// Addition of Analytics
	function initAnalytics(ga_code){
	
	  /*(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', ga_code, 'auto');
	  ga('send', 'pageview');*/
	}
	

	// init analytics inline
	if(ENABLE_ANALYTICS){
		initAnalytics(GA_TRACKING_ID);
	}

})(window)	
