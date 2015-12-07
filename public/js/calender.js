(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { 'default': obj }; }

var _modal = require('./modal');

var _modal2 = _interopRequireDefault(_modal);

var calender = (function () {
  var date = new Date();
  var month = date.getMonth();
  var year = date.getFullYear();
  var head = $('.head-dates');
  var body = $('.body-dates');
  var className = 'skavt-circle';
  var content;
  var dialog;

  function createHead(year) {
    var tr = '<tr><td colspan="7">' + year + '</td></tr><tr>';
    var days = ['N', 'P', 'T', 'S', 'Č', 'P', 'S'];
    days.forEach(function (day) {
      tr += '<td>' + day + '</td>';
    });
    tr += '</tr>';
    return tr;
  }

  function dates(years, months) {
    var date = new Date(year, months);
    var row = new Array(7);
    var col = [];
    var i = 0;
    while (date.getMonth() == months) {
      if (row[6]) {
        col[i] = row;
        i++;
        row = new Array(7);
      }

      row[date.getDay()] = date.getDate();
      date.setDate(date.getDate() + 1);
    }

    col[4] = row;
    return col;
  }

  function createBody(days, ajax) {
    var tr = '';
    days.forEach(function (day, index) {
      tr += '<tr>' + createColumn(day, ajax) + '</td>';
    });
    return tr;
  }

  function createColumn(data, collection) {
    var concat = '';
    for (var i = 0; i < 7; i++) {
      var day = typeof data[i] === 'undefined' ? '' : data[i];
      var classAdd = addClass(collection, data[i], 'class=\'' + className + '\'');
      var dataId = addClass(collection, data[i], 'data-content=\'' + data[i] + '\'');
      concat += '<td ' + dataId + ' ' + classAdd + '>' + day + '</td>';
    }

    return concat;
  }

  function addClass(collection, number, value) {
    if (collection === undefined) collection = {};

    return collection.indexOf(number) !== -1 ? value : '';
  }

  function createCalender(days, ajaxData) {
    //body.empty();
    head.html(createHead(year));
    body.html(createBody(days, ajaxData));
  }

  function addEvents() {
    body.find('.' + className).on('click', function (e) {
      var id = $(e.target).data('content');
      dialog.show(content[id]);
    });
  }

  return {
    init: function init(modal) {
      var days = dates(year, month);
      $.get('http://skavti.dev/notification', { year: year, month: month }, function (res) {
        content = res;
        createCalender(days, res.dates);
        dialog = modal;
        dialog.init();
        addEvents();
      });
    }
  };
})();

calender.init(_modal2['default']);

},{"./modal":2}],2:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, '__esModule', {
  value: true
});
var modal = (function () {
  var body = $('body');
  var $window = $(window);
  var modal = $('<div>').addClass('modal-skavti').hide().on('click', hideAll);
  var layer = $('<div/>').css({
    width: $window.width(),
    height: $window.height()
  }).addClass('black-box').hide().on('click', hideAll);
  function hideAll() {
    modal.hide();
    layer.hide();
  }

  function showModal(data) {
    layer.show();
    modal.html(template(data)).show();
  }

  function template(_ref) {
    var title = _ref.title;
    var body = _ref.body;

    return '\n      <div>\n        <h1>' + title + '</h1>\n        <p>' + body + '</p>\n      </div>';
  }

  return {
    init: function init() {
      body.append(layer);
      body.append(modal);
    },

    show: showModal
  };
})();

exports['default'] = modal;
module.exports = exports['default'];

},{}]},{},[1]);

//# sourceMappingURL=calender.js.map
