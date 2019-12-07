class CommonRegex {
    constructor() {
        this.alphanumeric = /^(?:[a-zA-Z0-9 ]+)?$/;
        this.email = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
        this.numeric = /^[0-9]*/
    }
}

$(document).ready(function () {
    $(".datepicker").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: parseInt(moment().format('YYYY')) - 60,
        maxYear: parseInt(moment().format('YYYY')) - 16
    });

    $("#user_code").inputmask({
        placeholder: "*",
        mask: "9999 9999 9999 9999",
        regex: "^[0-9]*"
    })

    $(".string_mask").inputmask({
        placeholder: "",
        regex: "^(?:[a-zA-Z0-9 ]+)?$"
    });

    $(".number_mask").inputmask({
        placeholder: "*",
        mask: "(+63)999 999 9999",
        regex: "[0-9]*"
    });

    $(".mobile_mask").inputmask({
        placeholder: "*",
        mask: "(+63)999 999 9999",
        regex: "[0-9]*"
    });

    $(".tele_mask").inputmask({
        placeholder: "*",
        mask: "(+99)999 999 9999",
        regex: "[0-9]*"
    })
    parseData();
});

class Registration {
    constructor(eMail, fName, mName, lName, bDate, bPlace, pNum, uName, uPass, uCPass, sCode) {
        this.data = {
            email: eMail,
            firstname: fName,
            middlename: mName,
            lastname: lName,
            birthdate: bDate,
            birthplace: bPlace,
            phonenumber: pNum.replace(/\s/g, ''),
            username: uName,
            userpass: uPass,
            secret_key: sCode.replace(/\s/g, '')
        }
        this.message = {
            emailErr: "You have inputted an invalid email"
        }
    }

    validateEmail() {
        var rep = new CommonRegex()
        if (rep.email.exec(this.data.email) != null) {
            console.info("Test")
        } else {
            $("#emailErrSpan").removeClass("hide");
            $("#emailErr").html(this.message.emailErr)
        }
        // this.submit();
    }

    submit() {
        console.table(this.data.birthdate);
    }
}

function parseData() {
    var reg = new Registration($("#user_email").val(), $("#user_firstname").val(), $("#user_middlename").val(), $("#user_lastname").val(), $("#user_birthdate").val(), $("#user_birthplace").val(), $("#user_contact").val(), $("#user_name").val(), $("#user_password").val(), $("#user_confirmpass"), $("#user_code").val());
    reg.validateEmail();
}

function scroll_to_class(element_class, removed_height) {
    var scroll_to = $(element_class).offset().top - removed_height;
    if ($(window).scrollTop() != scroll_to) {
        $('html, body').stop().animate({
            scrollTop: scroll_to
        }, 0);
    }
}

function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data('number-of-steps');
    var now_value = progress_line_object.data('now-value');
    var new_value = 0;
    if (direction == 'right') {
        new_value = now_value + (100 / number_of_steps);
    } else if (direction == 'left') {
        new_value = now_value - (100 / number_of_steps);
    }
    progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}

jQuery(document).ready(
    function () {

        /*
        Fullscreen background
        */
        $.backstretch("assets/img/backgrounds/1.jpg");

        $('#top-navbar-1').on(
            'shown.bs.collapse',
            function () {
                $.backstretch("resize");
            }
        );
        $('#top-navbar-1').on(
            'hidden.bs.collapse',
            function () {
                $.backstretch("resize");
            }
        );

        /*
        Form
        */
        $('.f1 fieldset:first').fadeIn('slow');

        $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on(
            'focus',
            function () {
                $(this).removeClass('input-error');
            }
        );

        // next step
        $('.f1 .btn-next').on(
            'click',
            function () {
                var parent_fieldset = $(this).parents('fieldset');
                var next_step = true;
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                // fields validation
                parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(
                    function () {
                        // if($(this).val() == "" ) {
                        //     $(this).addClass('input-error');
                        //     next_step = false;
                        // }
                        // else {
                        //     $(this).removeClass('input-error');
                        // }
                    }
                );
                // fields validation

                if (next_step) {
                    parent_fieldset.fadeOut(
                        400,
                        function () {
                            // change icons
                            current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                            // progress bar
                            bar_progress(progress_line, 'right');
                            // show next step
                            $(this).next().fadeIn();
                            // scroll window to beginning of the form
                            scroll_to_class($('.f1'), 20);
                        }
                    );
                }

            }
        );

        // previous step
        $('.f1 .btn-previous').on(
            'click',
            function () {
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                $(this).parents('fieldset').fadeOut(
                    400,
                    function () {
                        // change icons
                        current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
                        // progress bar
                        bar_progress(progress_line, 'left');
                        // show previous step
                        $(this).prev().fadeIn();
                        // scroll window to beginning of the form
                        scroll_to_class($('.f1'), 20);
                    }
                );
            }
        );

        // submit
        $('.f1').on(
            'submit',
            function (e) {

                // fields validation
                $(this).find('input[type="text"], input[type="password"], textarea').each(
                    function () {
                        if ($(this).val() == "") {
                            e.preventDefault();
                            $(this).addClass('input-error');
                        } else {
                            $(this).removeClass('input-error');
                        }
                    }
                );
                // fields validation

            }
        );


    }
);
