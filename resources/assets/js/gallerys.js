/*jshint esnext: true */
import Images from './images/images';
import $ from 'jquery';

(function (window) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  new Images('#articleSection');
})(window);
