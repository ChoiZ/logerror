/*
 * Error.js v1.0.0 - Log javascript errors
 * http://www.logerror.net
 *
 * Last modified: 2013-10-10
 * Author: François LASSERRE <choiz@me.com>
 * License: GNU GPL http://www.gnu.org/licenses/gpl.html
 *
 * Requires: jQuery 1.0 or newer
 * Requires: PHP or other language to save error on jQuery post
 */

window.maximum_error = 5;
window.last_error = {};

window.onerror = function(errorString, file, line) {
  window.errorCount || (window.errorCount = 0);

  e = {};
  e.fileName = file;
  e.message = errorString;
  e.lineNumber = line;

  Error.log(e);
}

var Error = {
    log : function(e) {
        window.errorCount || (window.errorCount = 0);
        if (window.errorCount < window.maximum_error && window.last_error.fileName != e.fileName && window.last_error.lineNumber != e.lineNumber) {
            window.errorCount = window.errorCount + 1;
            window.last_error = e;
            jQuery.post('/catch_error/', {
                type: "js",
                file: e.fileName,
                msg: e.message,
                line: e.lineNumber,
                url: window.location.href,
                ua: navigator.userAgent,
            });
        }
    }
};
