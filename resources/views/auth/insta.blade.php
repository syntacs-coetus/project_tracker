@extends('auth.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/form-elements.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('assets/plugins/daterangepicker/moment.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
<div class="login-page">
    <div class="col-3 form-box">
        <div class="login-logo">
            <a href="{{ route('home') }}"><b>Admin</b>LTE</a>
        </div>
        <form role="form" action="" method="post" class="f1">

            <p class="login-box-msg">Set up your company</p>
            <div class="f1-steps">
                <div class="f1-progress">
                    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;">
                    </div>
                </div>
                <div class="f1-step active">
                    <div class="f1-step-icon"><i class="fa fa-lock"></i></div>
                    <p>Company Information</p>
                </div>
                <div class="f1-step">
                    <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                    <p>Personal Information</p>
                </div>
                <div class="f1-step">
                    <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                    <p>User Account</p>
                </div>
            </div>

            <fieldset>
                    <div class="form-group">
                        <input type="text" name="company_name" placeholder="Company Name" class="form-control string_mask" id="company_name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="company_address" placeholder="Company Address" class="form-control string_mask" id="company_address">
                    </div>
                    <div class="form-group">
                        <input type="email" name="company_email" placeholder="Company Email" class="form-control string_mask" id="company_email">
                    </div>
                    <div class="form-group">
                        <input type="email" name="company_support_email" placeholder="Company Support Email" class="form-control string_mask" id="company_support_email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="company_mobile" placeholder="Company Mobile No." class="form-control mobile_mask" id="company_mobile">
                    </div>
                    <div class="form-group">
                        <input type="text" name="company_phone" placeholder="Company Telephone No." class="form-control tele_mask" id="company_phone">
                    </div>
                    <div class="f1-buttons">
                        <button type="button" class="btn btn-next">Next</button>
                    </div>
            </fieldset>
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
                    <button type="button" class="btn btn-previous">Previous</button>
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
                    <button type="button" onclick="parseData()" class="btn btn-submit">Submit</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('js/retina-1.1.0.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
@endsection