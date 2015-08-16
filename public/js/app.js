/*jshint esnext: true */
'use strict';

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

(function () {
  var Article = (function () {
    function Article(text, url) {
      _classCallCheck(this, Article);

      this.text = text;
      this.url = url;
    }

    _createClass(Article, [{
      key: 'shortText',
      value: function shortText() {
        return this.text.substr(0, 10);
      }
    }]);

    return Article;
  })();

  var articles = document.querySelectorAll('article');

  var collection = [];
  var each = function each(col, fn) {
    return Array.prototype.forEach.call(col, fn);
  };
  each(articles, function (article) {
    //p elements
    var text = article.children[1];
    var a = article.children[2];
    console.log(text);
    text.innerHTML = "<p>Lorem itextsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem</p>";
    a.addEventListener('click', function (e) {
      e.preventDefault();
      console.log('dela');
      text.classList.toggle("show-text");
      article.classList.toggle('show');
    });
  });
})();
//# sourceMappingURL=app.js.map