$(document).ready(function () {
    $(".preloader").fadeOut(5500);
})


var original = "";
$(document).ready(function () {

    $("#next").click(function () {
        $('.form-guess').addClass('d-none');
        $('.form-player').removeClass('d-none');
        document.getElementById("form-playground").reset();
        generate()
    });


    function clearConsole() {
        if (window.console || window.console.firebug) {
            console.clear();
        }
    }

    function generate() {
        $.ajax({
            url: "/scrambler/generate",
            method: "get",
            success: function (responseGenerate) {
                original = responseGenerate.original_word;
                $('span#scramble-word').text("(" + responseGenerate.scramble_word + ")");
                clearConsole()
            }
        })
    }

    function score() {
        $.ajax({
            url: "/score/get",
            method: "get",
            success: function (responseGenerate) {
                original = responseGenerate.original_word;
                $('span#score').text(responseGenerate);
                clearConsole()
            }
        })
    }
    if (window.location.href.indexOf("playground") > -1) {
        generate()
        score()
    }

    $('#guess').click(function (e) {
        e.preventDefault();
        /*Ajax Request Header setup*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /* Submit form data using ajax*/
        $.ajax({
            url: "/scrambler/check",
            method: 'post',
            data: {
                original_word: original,
                form : $('#form-playground').serialize(),
            },

            success: function (response) {
                //------------------------
                $('#res_message').show();
                $('span#res_message').text(response.message);
                $('.form-guess').removeClass('d-none');
                $('.form-player').addClass('d-none');

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
