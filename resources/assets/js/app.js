/*jshint esnext: true */
(function () {
  class Article {
    constructor(text, url) {
      this.text = text;
      this.url = url;
    }
    shortText(){
      return this.text.substr(0, 10);
    }
  }
  let articles = document.querySelectorAll('article');

  var collection = [];
  var each = function (col, fn) {
    return Array.prototype.forEach.call(col, fn);
  };
    each(articles, function (article) {
      //p elements
      let text = article.children[1];
      let a = article.children[2];
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
