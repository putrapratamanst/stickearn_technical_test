$(document).ready(function () {
    $(".preloader").hide(5500);
})


var original = "";
var scramble = "";
$(document).ready(function () {

    $("#next").click(function () {
        $('.form-guess').addClass('d-none');
        $('.form-player').removeClass('d-none');
        document.getElementById("form-playground").reset();
        generate()

    });


    function generate() {
        $('.preloader').show(300)

        $.ajax({
            url: "/scrambler/generate",
            method: "get",
            success: function (responseGenerate) {
                original = responseGenerate.original_word;
                scramble = responseGenerate.scramble_word;
                $('span#scramble-word').text("(" + responseGenerate.scramble_word + ")");
                $('.preloader').hide();

            }
        })
    }

    function score() {
        $('.preloader').show();

        $.ajax({
            url: "/score/get",
            method: "get",
            success: function (responseScore) {
                $('span#score').text(responseScore);
                $('.preloader').hide();
            }
        })
    }
    if (window.location.href.indexOf("playground") > -1) {
        generate();
        score();
    }

    $('#guess').click(function (e) {
        e.preventDefault();
        /*Ajax Request Header setup*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.preloader').show();

        /* Submit form data using ajax*/
        $.ajax({
            url: "/scrambler/check",
            method: 'post',
            data: {
                original_word: original,
                scramble_word: scramble,
                form : $('#form-playground').serialize(),
            },

            success: function (response) {
                //------------------------
                score();
                $('#res_message').show();
                $('span#res_message').text(response.message);
                $('.form-guess').removeClass('d-none');
                $('.form-player').addClass('d-none');
                $('.preloader').hide();

                // document.getElementById("form-playground").reset();
                // setTimeout(function () {
                //     $('#form-guess').hide();
                //     $('#form-player').show();
                // }, 10000);
                //--------------------------
            },
        });
    });
});
