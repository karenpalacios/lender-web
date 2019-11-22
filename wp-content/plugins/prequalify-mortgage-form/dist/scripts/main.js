jQuery(document).ready( function($) {
    var form = $("#mortgage-form");

    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        labels: {
            previous: "< Back",
        },
        onInit: function(event, currentIndex) {
            var choose_answer = function(choice) {
                choice.parent().find(".answer").val(choice.attr('data-value')); 
            }
            var formatter = new Intl.NumberFormat('en-US', {
                style: 'decimal',
                maximumFractionDigits: 0
            });

            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 3000000,
                step: 1000,
                values: [ 300000, 1000000 ],
                slide: function( event, ui ) {

                    $suffix = ' ';

                    if(ui.values[ 1 ] == 3000000) {
                        $suffix = ' + ';
                    }

                    $( "#amount" ).val( "$" + formatter.format(ui.values[ 0 ]) + " - $" + formatter.format(ui.values[ 1 ])  + $suffix );

                }
            });

            $( "#amount" ).val( "$" + formatter.format($( "#slider-range" ).slider( "values", 0 )) +
              " - $" + formatter.format($( "#slider-range" ).slider( "values", 1 )));

            $(".btn-answer").on('click', function() {
                $(this).addClass("selected");
                choose_answer($(this));
            });

        },
    });


    $('#btn-submit').click( function(e) { 
        e.preventDefault();
        var cn = $('#mortgage-form #client_name').val();
        var ce = $('#mortgage-form #client_email').val()
        var cp = $('#mortgage-form #client_phone').val();

        var reg_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var reg_phone = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;

        if( cn == "" || ce == ""  || cp == "") {
            $('#mortgage-form .pmf_error').html("Please complete all fields below.").show();
            $('#mortgage-form .pmf_success').hide();
        }
        else if (!reg_email.test(ce)) {
            $('#mortgage-form .pmf_error').html("You have entered an invalid email address.").show();
            $('#mortgage-form .pmf_success').hide();
        }
        else if (!reg_phone.test(cp)) {
            $('#mortgage-form .pmf_error').html("You have entered an invalid phone number.").show();
            $('#mortgage-form .pmf_success').hide();
        } else {
            $('#mortgage-form .pmf_error').hide();
            $(this).parent().hide();
            $.ajax({
                url : pmf_proccess_form.ajax_url,
                type : 'post',
                data : {
                    action : 'pmf_proccess_form',
                    values : form.serialize(),
                    security : pmf_proccess_form.check_nonce, 
                },
                success : function( response ) {
                    $('#mortgage-form .pmf_success').show();
                }
            });
        }

                    
    });



});