
$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $('.upBtn').fadeIn();
    }
  });

  $('.upBtn').click(function () {
    $('html, body').animate({ scrollTop: 0 }, 800);
    return false;
  });
});

$('#sm-box').delay(3000).fadeOut();

$('.confirm-ms-link').on('click', function () {

  if (confirm('Are you sure?')) {
    return true;
  }

  return false;

});

$('.carousel').carousel();

