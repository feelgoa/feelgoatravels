@extends('layouts.app')

@section('content')
<section style="padding-top:30px;">
    <div class="" style="padding: 0px 12px 0px 12px;">
        <div class="row"
            style="color: black;font-size: 20px;background-size: cover; background-image: url('../../assets/images/contact-us-4.jpg'); padding: 12px;">
            <div class="col-md-4">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4" style="background-color: #0000008c; border-radius: 15px; padding:12px;">
                        <h2 class="heading-text" style="color:white;">Contact Us</h2>
                        <form id="contactus_form" name="contactus_form" action="/recapcha-page" method="post">
                            @csrf
                            <div class="form-group ">
                                <input type="hidden" id="link" name="link" value="{{ $details['pid'] }}">
                            <input type="checkbox" id='pnrchkbox' @if($details['firstname'] != "") disabled @endif/>
                                <label for="firstname" class="form-labels">I already have a PNR number</label>
                                <span class="required-field"></span>
                                <div id="pnrholder" style="display:none;">
                                <div class="col-md-8 col-sm-8 col-xs-8" style="padding-left:0px;"> 
                                <input class="form-control" type="text" name="ref_id" id="ref_id" maxlength="8"
                                    placeholder="Enter PNR Number" @if(isset($details['ref_id'])) value="{{ $details['ref_id'] }}" @endif>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                <input type="button" id="verify_ref_id" class="btn btn-success" value="VERIFY">
                                </div>
                                <p class="form-labels">Once you verify your PNR number, all fields will be automatically filled with your existing details.</p>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="firstname" class="form-labels">First Name:</label>
                                <span class="required-field">*</span>
                                <input class="form-control" type="text" name="firstname" id="firstname"
                                    placeholder="Enter First Name" value="{{ $details['firstname'] }}"
                                    onblur="ValidateEmptyField(this,'First name cannot be empty')" required @if($details['firstname'] != "") readonly @endif>
                            </div>
                            <div class="form-group ">
                                <label for="lastname" class="form-labels">Last Name:</label>
                                <span class="required-field">*</span>
                                <input class="form-control" type="text" name="lastname" id="lastname" value="{{ $details['lastname'] }}"
                                    placeholder="Enter last Name"
                                    onblur="ValidateEmptyField(this,'Last name cannot be empty')" required  @if($details['firstname'] != "") readonly @endif>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="form-labels">Email:</label>
                                <span class="required-field">*</span>
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Enter email id" value="{{ $details['email'] }}"
                                    onblur="ValidateEmail(this,'Please your check email format')" required  @if($details['firstname'] != "") readonly @endif>
                            </div>
                            <div class="form-group ">
                                <label for="phone" class="form-labels">Phone:</label>
                                <input class="form-control" type="text" name="phone" id="phone" value="{{ $details['phone'] }}"
                                    onblur="ValidateContact(this,'Enter 10 digit mobile Number')"
                                    placeholder="Contact number"  @if($details['firstname'] != "") readonly @endif>
                            </div>
                            <div class="form-group">
                                <label for="comment" class="form-labels">Message:</label>
                                <span class="required-field">*</span>
                                <textarea class="form-control"
                                    placeholder="Enter description here."
                                    name="message" rows="5" id="message" style="width:100%;resize: none;"
                                    onblur="ValidateEmptyField(this,'Message cannot be empty')" required></textarea>
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="{{ RECAPCHA_SITE_KEY }}"></div>
                            </div>
                            <span class="label label-danger"
                                style="font-size: 14px;margin-bottom:14px;white-space: normal;"
                                id="error_message"></span></br>
                            <div>
                            <input type="button" id="contact_us_submit" class="btn btn-success" value="SUBMIT">
                            </form>
                            <input type="button" id="contact_us_reset" class="btn btn-info" value="RESET" @if($details['firstname'] != "") disabled @endif>
                            </div>
                            <br><br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
@endsection