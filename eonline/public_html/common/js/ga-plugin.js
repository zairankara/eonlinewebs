/*
 * videojs-ga - v0.4.1 - 2015-08-10
 * Copyright (c) 2016 ABZ
 * Licensed MIT
 */
(function() {
    var a = [].indexOf || function(a) {
        for (var b = 0, c = this.length; c > b; b++)
            if (b in this && this[b] === a) return b;
        return -1
    };
    videojs.plugin("ga", function(b) {
        var c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, A, B, C, D, E, F, G, H, I, J, K, L;
        return null == b && (b = {}), A = document.createElement("a"), A.href = document.referrer, self !== top && "preview-players.brightcove.net" === window.location.host && (A.hostname = "studio.brightcove.com") ? void videojs.log("Google analytics plugin will not track events in Video Cloud Studio") : (z = this, e = {}, this.options()["data-setup"] && (u = JSON.parse(this.options()["data-setup"]), u.ga && (e = u.ga)), g = ["player_load", "video_load", "percent_played", "start", "end", "seek", "play", "pause", "resize", "volume_change", "error", "fullscreen"], n = b.eventsToTrack || e.eventsToTrack || g, x = b.percentsPlayedInterval || e.percentsPlayedInterval || 10, k = b.eventCategory || e.eventCategory || "Videos Brightcove", f = b.eventLabel || e.eventLabel, G = b.sendbeaconOverride || !1, w = [], I = !1, i = !1, D = C = 0, E = !1, l = "", d = "", m = {
            video_load: "Video Load",
            percent_played: "Percent played",
            start: "video_start",
            seek_start: "Seek start",
            seek_end: "Seek end",
            play: "Media Play",
            pause: "Media Pause",
            error: "Error",
            fullscreen_exit: "Fullscreen Exited",
            fullscreen_enter: "Fullscreen Entered",
            resize: "Resize",
            volume_change: "Volume Change",
            player_load: "Player Load",
            end: "video_complete"
        }, p = function(a) {
            return b.eventNames && b.eventNames[a] ? b.eventNames[a] : e.eventNames && e.eventNames[a] ? e.eventNames[a] : m[a] ? m[a] : a
        }, ("players.brightcove.net" === window.location.host || "preview-players.brightcove.net" === window.location.host) && (K = b.tracker || e.tracker, K && (! function(a, b, c, d, e, f, g) {
            return a.GoogleAnalyticsObject = e, a[e] = a[e] || function() {
                return (a[e].q = a[e].q || []).push(arguments)
            }, a[e].l = 1 * new Date, f = b.createElement(c), g = b.getElementsByTagName(c)[0], f.async = 1, f.src = d, g.parentNode.insertBefore(f, g)
        }(window, document, "script", "//www.google-analytics.com/analytics.js", "ga"), ga("create", K, "auto"), ga("require", "displayfeatures"))), c = /(\s|^)vjs-ad-(playing|loading)(\s|$)/, s = function(a) {
            return c.test(a.el().className)
        }, t = function() {
            s(z) || (l = f ? f : z.mediainfo && z.mediainfo.id ? z.mediainfo.id + " | " + z.mediainfo.name : this.currentSrc().split("/").slice(-1)[0].replace(/\.(\w{3,4})(\?.*)?$/i, ""), z.mediainfo && z.mediainfo.id && z.mediainfo.id !== d && (d = z.mediainfo.id, w = [], I = !1, i = !1, D = C = 0, E = !1, a.call(n, "video_load") >= 0 && F(p("video_load"), !0)))
        }, J = function() {
            var b, c, d, e, f;
            if (!s(z)) {
                for (b = Math.round(this.currentTime()), c = Math.round(this.duration()), e = Math.round(b / c * 100), d = f = 0; 99 >= f; d = f += x) e >= d && a.call(w, d) < 0 && (a.call(n, "percent_played") >= 0 && 0 !== e && F(p("percent_played"), !0, d), e > 0 && w.push(d));
                a.call(n, "seek") >= 0 && (D = C, C = b, Math.abs(D - C) > 1 && (E = !0, F(p("seek_start"), !1, D), F(p("seek_end"), !1, C)))
            }
        }, h = function() {
            s(z) || i || (F(p("end"), !0), i = !0)
        }, y = function() {
            var a;
            s(z) || (a = Math.round(this.currentTime()), F(p("play"), !0, a), E = !1)
        }, H = function() {
            return !s(z) && a.call(n, "start") >= 0 && !I ? (F(p("start"), !0), I = !0) : void 0
        }, v = function() {
            var a, b;
            s(z) || (a = Math.round(this.currentTime()), b = Math.round(this.duration()), a === b || E || F(p("pause"), !0, a))
        }, L = function() {
            var a;
            a = this.muted() === !0 ? 0 : this.volume(), F(p("volume_change"), !1, a)
        }, B = function() {
            F(p("resize") + " - " + this.width() + "*" + this.height(), !0)
        }, j = function() {
            var a;
            a = Math.round(this.currentTime()), F(p("error"), !0, a)
        }, o = function() {
            var a;
            a = Math.round(this.currentTime()), ("function" == typeof this.isFullscreen ? this.isFullscreen() : void 0) || ("function" == typeof this.isFullScreen ? this.isFullScreen() : void 0) ? F(p("fullscreen_enter"), !1, a) : F(p("fullscreen_exit"), !1, a)
        }, F = function(a, b, c) {
            G ? G(k, a, l, c, b) : window.ga ? ga("send", "event", {
                eventCategory: k,
                eventAction: a,
                eventLabel: l,
                eventValue: c,
                nonInteraction: b
            }) : window._gaq ? _gaq.push(["_trackEvent", k, a, l, c, b]) : videojs.log("Google Analytics not detected")
        }, a.call(n, "player_load") >= 0 && (self !== top ? (q = document.referrer, r = 1) : (q = window.location.href, r = 0)), G ? G(k, p("player_load"), q, r, !0) : window.ga ? ga("send", "event", {
            eventCategory: k,
            eventAction: p("player_load"),
            eventLabel: q,
            eventValue: r,
            nonInteraction: !0
        }) : window._gaq ? _gaq.push(["_trackEvent", k, p("player_load"), q, r, !1]) : videojs.log("Google Analytics not detected"), void this.ready(function() {
            return this.on("loadedmetadata", t), this.on("timeupdate", J), a.call(n, "end") >= 0 && this.on("ended", h), a.call(n, "play") >= 0 && this.on("play", y), a.call(n, "start") >= 0 && this.on("playing", H), a.call(n, "pause") >= 0 && this.on("pause", v), a.call(n, "volume_change") >= 0 && this.on("volumechange", L), a.call(n, "resize") >= 0 && this.on("resize", B), a.call(n, "error") >= 0 && this.on("error", j), a.call(n, "fullscreen") >= 0 ? this.on("fullscreenchange", o) : void 0
        }))
    })
}).call(this);