/*jshint esnext: true */

import $ from 'jquery';
(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var topics = {};

$.Topic = function( id ) {
    var callbacks,
        topic = id && topics[ id ];
    if ( !topic ) {
        callbacks = jQuery.Callbacks();
        topic = {
            publish: callbacks.fire,
            subscribe: callbacks.add,
            unsubscribe: callbacks.remove
        };
        if ( id ) {
            topics[ id ] = topic;
        }
    }
    return topic;
};

  let form = $('#articleForm');
  let input = form.find('input');
  let textarea = form.find('textarea');
  let articleTable = $('.artilceBody');
  $.Topic("add:new:user").subscribe(function ({name, body}){
    $('#displayArticles').append(`<h2>${name}<h2>`);
    $('#displayArticles').append(`<p>${body}<p>`);
  });


  form.on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      method: 'POST',
      url: '/admin/articles',
      data: {
        name: input.val(),
        body: textarea.val()
      }

    }).then(function (respond) {
      $.Topic("add:new:user").publish(respond);
    });
  });

  $('.pagination').on('click', 'li', function(e) {
    var target = $(e.target);
    console.log(target.html());
    target.parent().addClass('active');
    target.parent().siblings().removeClass('active');
    $.ajax({
      method: 'get',
      url: '/admin/articlePagination/' + target.html(),
    }).then(function (articles) {
      articleTable.empty();
      articles.forEach(function ({title, body}) {
        articleTable.append(`<tr>
          <td>${title}</td>
          <td>
            <button type="button" class="btn btn-primary">Spremeni</button>
          </td>
          <td>
            <button type="button" class="btn btn-danger">Izbriši</button>
          </td>
          <tr>`);
      });
    });
  });




})();
