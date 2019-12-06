@extends('auth.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/form-elements.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('assets/plugins/daterangepicker/moment.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
<div class="col-3 form-box">
    <div class="login-logo">
        <a href="{{ route('home') }}"><b>Admin</b>LTE</a>
    </div>
    <form role="form" action="" method="post" class="f1">

        <p class="login-box-msg">Fill up to begin using the system</p>
        <div class="f1-steps">
            <div class="f1-progress">
                <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;">
                </div>
            </div>
            <div class="f1-step active">
                <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                <p>Personal Information</p>
            </div>
            <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                <p>User Account</p>
            </div>
            <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-lock"></i></div>
                <p>Terms & Condition</p>
            </div>
        </div>

        <fieldset>
            <div class="form-group">
                <input type="email" name="user_email" placeholder="Email Address" class="form-control string_mask" id="user_email" value="earltacs96@gmail">
                <span class="invalid-feedback hide" id="emailErrSpan" role="alert">
                    <strong id="emailErr"></strong>
                </span>
            </div>
            <div class="form-group">
                <input type="text" name="user_firstname" placeholder="Firstname" class="form-control string_mask"
                    id="user_firstname">
            </div>
            <div class="form-group">
                <input type="text" name="user_middlename" placeholder="Middlename" class="form-control string_mask"
                    id="user_middlename">
            </div>
            <div class="form-group">
                <input type="text" name="user_lastname" placeholder="Lastname" class="form-control string_mask" id="user_lastname">
            </div>
            <div class="form-group">
                <input type="text" name="user_birthdate" class="form-control datepicker" id="user_birthdate"
                    Placeholder="Birthdate">
            </div>
            <div class="form-group">
                <input type="text" name="user_birthplace" placeholder="Birthplace" class="form-control string_mask"
                    id="user_birthplace">
            </div>
            <div class="form-group">
                <input type="text" name="user_contact" placeholder="Phone Number" class="form-control number_mask"
                    id="user_contact">
            </div>
            <div class="f1-buttons">
                <button type="button" class="btn btn-next">Next</button>
            </div>
        </fieldset>

        <fieldset>
            <div class="form-group">
                <input type="text" name="user_name" placeholder="Username" class="form-control string_mask" id="user_name">
            </div>
            <div class="form-group">
                <input type="password" name="user_password" placeholder="Password" class="form-control string_mask"
                    id="user_password">
            </div>
            <div class="form-group">
                <input type="password" name="user_confirmpass" placeholder="Confirm password" class="form-control string_mask"
                    id="user_confirmpass">
            </div>
            <div class="f1-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next">Next</button>
            </div>
        </fieldset>

        <fieldset>
            <div class="form-group">
                <input type="text" name="user_code" placeholder="Secret Code" class="form-control" id="user_code">
            </div>
            <div class="form-group text-center">
                <input type="checkbox" name="user_terms" id="user_terms">
                <label class="form-check-label">I accept the <a href="#">Terms and Conditions</a></label>
            </div>
            <div class="f1-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" onclick="parseData()" class="btn btn-submit">Submit</button>
            </div>
        </fieldset>
        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </form>
</div>
<script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('js/retina-1.1.0.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script>
    class CommonRegex{
        constructor(){
            this.alphanumeric = /^(?:[a-zA-Z0-9 ]+)?$/;
            this.email  = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
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

        validateEmail(){
            var rep = new CommonRegex()
            if(rep.email.exec(this.data.email) != null){
                console.info("Test")
            }else{
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

</script>
@endsection
