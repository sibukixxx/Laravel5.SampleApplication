(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { 'default': obj }; }

var _UtilJs = require('./Util.js');

var _UtilJs2 = _interopRequireDefault(_UtilJs);

/**
 * アプリケーションのエントリー ポイントです。
 */
window.onload = function () {
  var date = _UtilJs2['default'].formatDate();
  console.log('[' + date + '] Application was launched.');
};

},{"./Util.js":2}],2:[function(require,module,exports){

/**
 * ユーテリティ メソッドを提供します。
 */
'use strict';

Object.defineProperty(exports, '__esModule', {
  value: true
});

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

var Util = (function () {
  function Util() {
    _classCallCheck(this, Util);
  }

  _createClass(Util, null, [{
    key: 'formatDate',

    /**
     * 日時データを指定された書式に基いて文字列化します。
     *
     * @param {Date}   date   日時データ。省略時は最新の日時。
     * @param {String} format 書式指定。省略時は "YYYY-MM-DD hh:mm:ss.SSS"。
     *
     * @return {String} 文字列。
     *
     * @see http://qiita.com/osakanafish/items/c64fe8a34e7221e811d0
     */
    value: function formatDate(date, format) {
      date = date === undefined ? new Date() : date;
      format = format === undefined ? 'YYYY-MM-DD hh:mm:ss.SSS' : format;

      format = format.replace(/YYYY/g, date.getFullYear());
      format = format.replace(/MM/g, ('0' + (date.getMonth() + 1)).slice(-2));
      format = format.replace(/DD/g, ('0' + date.getDate()).slice(-2));
      format = format.replace(/hh/g, ('0' + date.getHours()).slice(-2));
      format = format.replace(/mm/g, ('0' + date.getMinutes()).slice(-2));
      format = format.replace(/ss/g, ('0' + date.getSeconds()).slice(-2));

      // ゼロ詰め置換を経ても残っているなら、そのまま数値化
      format = format.replace(/M/g, date.getMonth() + 1);
      format = format.replace(/D/g, date.getDate());
      format = format.replace(/h/g, date.getHours());
      format = format.replace(/m/g, date.getMinutes());
      format = format.replace(/s/g, date.getSeconds());

      if (format.match(/S/g)) {
        var milliSeconds = ('00' + date.getMilliseconds()).slice(-3);
        for (var i = 0, max = format.match(/S/g).length; i < max; ++i) {
          format = format.replace(/S/, milliSeconds.substring(i, i + 1));
        }
      }

      return format;
    }
  }]);

  return Util;
})();

exports['default'] = Util;
module.exports = exports['default'];

},{}]},{},[1])
//# sourceMappingURL=bundle.js.map
