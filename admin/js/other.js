// slider
  $('.slider').slick({
  	infinity: true,
    autoplay: true,
    autoplaySpeed: 800,
  });

	$('.imgBtn').bind("click" , function () {
        $('#imgUpload').click();
    });
 
  $("#imgUpload").on('change', function () {

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof (FileReader) != "undefined") {

            var image_holder = $(".ShowImg");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                        "class": "thumb-image"
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Pls select only images");
    }
});

$(function () {
    $('#food').on('change', function() {
        $("#foodval").val(+$("#food").val());
        otherValue=$(this).find('option:selected').attr('data-othervalue');
       $("#price").val(otherValue);

    });

  $("#amt,#food").on("keyup keydown change",function () {
    $("#total").val(+$("#amt").val() * +$("#price").val());
  });
});