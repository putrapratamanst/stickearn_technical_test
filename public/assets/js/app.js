$(document).ready(function () {
    $(".preloader").fadeOut(5500);
})

$(document).ready(function () {
    $.ajax({
        url: "/scrambler/generate",
        method:"get",
        success: function(responseGenerate){
            $('span#scramble-word').text("("+responseGenerate.word+")");
        }
    })


    $('#guess').click(function (e) {
        e.preventDefault();
        /*Ajax Request Header setup*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#guess').html('Sending..');

        /* Submit form data using ajax*/
        $.ajax({
            url: "/scrambler/check",
            method: 'post',
            data: $('#form-playground').serialize(),
            success: function (response) {
                //------------------------
                $('#guess').html('Submit');
                $('#res_message').show();
                $('#res_message').html(response.msg);
                $('#msg_div').removeClass('d-none');

                document.getElementById("form-playground").reset();
                setTimeout(function () {
                    $('#res_message').hide();
                    $('#msg_div').hide();
                }, 10000);
                //--------------------------
            }
        });
    });
});
