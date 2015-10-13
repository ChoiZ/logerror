/*
 * Error.js v1.0.1 - Log javascript errors
 * http://www.logerror.net
 *
 * Last modified: 2015-10-13
 * Author: François LASSERRE <choiz@me.com>
 * License: GNU GPL http://www.gnu.org/licenses/gpl.html
 *
 * Requires: jQuery 1.0 or newer
 * Requires: PHP or other language to save error on jQuery post
 */

'use strict';

var LogError = (function() {
    var error_count = 0;
    var error_maximum = 5;
    var last_error = {};

    var reporting = function (e) {
        if (error_count < error_maximum && last_error != e) {
            error_count++;
            last_error = e;
            jQuery.post('/LogError.php', {
                type: "js",
                file: e.f,
                msg: e.m,
                line: e.l,
                column: e.c,
                trace: e.t,
                url: window.location.href,
                user_agent: navigator.userAgent,
            });
        }

        return true;
    };

    return {
        reporting: reporting
    };
})(jQuery);

window.onerror = function(m, f, l, c, t) {
    var e = {};
    e.m = m;
    e.f = f;
    e.l = l;
    e.c = c;
    e.t = t;

    return LogError.reporting(e);
}
