require('./bootstrap');

global.$ = global.jQuery = require('jquery');

$('.header_logo').click(function() {
  window.location.href="/laravel-many-to-many/public/cars";
})
