import $ from 'jquery';
(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
  });

  $('.delete-article').on('click', function(e) {
    let target = $(e.target);
    $.ajax({
      method: 'DELETE',
      url: '/admin/notifications/'+ target.data('id'),
    }).then(function (respond) {
      alert('bla');
      console.log(respond);
    });
  });
})();
