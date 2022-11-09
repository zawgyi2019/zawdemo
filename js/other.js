// slider
  $('.slider').slick({
  	dots: true,
    arrows: false,
  	infinity: true,
    autoplay: true,
    autoplaySpeed: 800,
  });


  $(window).scroll(function(){
    var  scroll = $(window).scrollTop();

  if (scroll >= 200){
  	$('#header').addClass('fixed');
  } 
  else{
  	$('#header').removeClass('fixed');
  } 
});

$(function () {
      $("#amt").on("keyup keydown change",function () {
        $("#total").val(+$("#amt").val() * +$("#price").val());
      });
    });


$(document).ready(function() {
  //page top
  var topBtn = $('#pageTop');
    topBtn.removeClass('active');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            topBtn.addClass('active');
        } else {
            topBtn.removeClass('active');
        }
    });

    // totop Button
    $("#pageTop").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});

    $('.hamburgerMenu').click(function() {
      $(this).toggleClass('on');
      $('.spNav').slideToggle('200');
    });
     $('.hamburgerMenu').click(function() {
      $('body').toggleClass('no-scroll');
    });

     // dropdown faq
     
     $('.faqBlog').first().children('dt').addClass('on');
     $('.faqBlog dt').click(function(e) {
      e.preventDefault();
      $(this).toggleClass('on');
      $(this).next('dd').slideToggle(200);
    });

 AOS.init();

});