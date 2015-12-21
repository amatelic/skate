import $ from 'jquery';
(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
  });
  //cheking witch browser we are on
  var text = 'Uporabljate brskalnik ki ne podpira datum elementa prosim uporabljajte chrome ali pa zapišitei datum v tem formatu 13/04/20015 ';
  var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
  var isChrome = !!window.chrome && !isOpera;

  if (!isChrome) {
    $('#dateOfStory')
      .after(`</br><p class="bg-warning">${text}</p>`);
  }

  var button = $('.delete-button');

  button.on('click', function(e) {
    let target = $(e.target);
    $.ajax({
      method: 'DELETE',
      url: '/admin/notifications/' + target.data('id'),
    }).then(function(respond) {
      target.closest('tr').remove();
    }, function() {
      alert('Žal uporabnika ni bilo mogoče zbrisati probi znova');
    });
  });
})();
