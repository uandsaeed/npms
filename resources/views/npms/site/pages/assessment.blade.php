@extends('npms.site.template.front_end_1')

@section('title', $title)


@section('content')


    <!-- Header -->
    <header class="masthead masthead-assessment">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">Assessment</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">Take the plunge...</h2>
            </div>
        </div>
    </header>

    <!-- Content Section -->
    <section id="projects" class="projects-section bg-light">
        <div class="container">
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-md-12">

                    <section class="" >
                        <div class="container">

                            <div class="">
                                <div class="form-wizard">

                                    <!-- Form Wizard -->
                                    <form role="form" action="" method="post">

                                        <h3>Two minutes to get your free personalised results</h3>
                                        <p>Fill all form field to go next step</p>

                                        <!-- Form progress -->
                                        <div class="form-wizard-steps form-wizard-tolal-steps-4">
                                            <div class="form-wizard-progress">
                                                <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                                            </div>
                                            <!-- Step 1 -->
                                            <div class="form-wizard-step active">
                                                <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                                <p>Personal</p>
                                            </div>
                                            <!-- Step 1 -->

                                            <!-- Step 2 -->
                                            <div class="form-wizard-step">
                                                <div class="form-wizard-step-icon"><i class="fa fa-list" aria-hidden="true"></i></div>
                                                <p>Skin Details</p>
                                            </div>
                                            <!-- Step 2 -->

                                            <!-- Step 3 -->
                                            <div class="form-wizard-step">
                                                <div class="form-wizard-step-icon"><i class="fa fa-file" aria-hidden="true"></i></div>
                                                <p>Results</p>
                                            </div>
                                            <!-- Step 3 -->

                                            <!-- Step 4 -->
                                            <div class="form-wizard-step">
                                                <div class="form-wizard-step-icon"><i class="fa fa-box" aria-hidden="true"></i></div>
                                                <p>Order</p>
                                            </div>
                                            <!-- Step 4 -->
                                        </div>
                                        <!-- Form progress -->

                                        <!-- Form Step 1 -->
                                        <fieldset>
                                            <h4>Personal Information: <span>Step 1 - 4</span></h4>
                                            <div class="form-group">
                                                <label>First Name: <span>*</span></label>
                                                <input type="text" name="First Name" placeholder="First Name" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name: <span>*</span></label>
                                                <input type="text" name="Last Name" placeholder="Last Name" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Gender : </label>
                                                <label class="radio-inline" style="margin-left:30px;">
                                                    <input type="radio" name="Gender" value="option1" checked="checked"> Male
                                                </label>
                                                <label class="radio-inline" style="margin-left:30px;">
                                                    <input type="radio" name="Gender" value="option2"> Female
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Email: <span>*</span></label>
                                                <input type="text" name="Email" placeholder="Email" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Password: <span>*</span></label>
                                                <input type="password" name="Password" placeholder="User Password" class="form-control required">
                                            </div>
                                            <div class="form-wizard-buttons">
                                                <button type="button" class="btn btn-next">Next</button>
                                            </div>
                                        </fieldset>
                                        <!-- Form Step 1 -->

                                        <!-- Form Step 2 -->
                                        <fieldset>

                                            <h4>Skin Information : <span>Step 2 - 4</span></h4>


                                            <div class="form-wizard-buttons">
                                                <button type="button" class="btn btn-previous">Previous</button>
                                                <button type="button" class="btn btn-next">Next</button>
                                            </div>
                                        </fieldset>
                                        <!-- Form Step 2 -->

                                        <!-- Form Step 3 -->
                                        <fieldset>

                                            <h4>Skin Results: <span>Step 3 - 4</span></h4>

                                            <br/>
                                            <div class="form-wizard-buttons">
                                                <button type="button" class="btn btn-previous">Previous</button>
                                                <button type="button" class="btn btn-next">Next</button>
                                            </div>
                                        </fieldset>
                                        <!-- Form Step 3 -->

                                        <!-- Form Step 4 -->
                                        <fieldset>

                                            <h4>Payment Information: <span>Step 4 - 4</span></h4>
                                            <div style="clear:both;"></div>
                                            <div class="form-group">
                                                <label>Address: <span>*</span></label>
                                                <input type="text" name="Address" placeholder="Address" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Zip Code: <span>*</span></label>
                                                <input type="text" name="Zip Code" placeholder="Zip Code" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>City: <span>*</span></label>
                                                <input type="text" name="City" placeholder="City" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>State: <span>*</span></label>
                                                <input type="text" name="State" placeholder="State" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Country: </label>
                                                <select class="form-control">
                                                    <option>Australia</option>
                                                    <option>America</option>
                                                    <option>Canada</option>
                                                    <option>England</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Name: <span>*</span></label>
                                                <input type="text" name="Bank Name" placeholder="Bank Name" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Payment Type : </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Payment" value="option1" checked="checked"> Master Card
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Payment" value="option2"> Visa Card
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Holder Name: <span>*</span></label>
                                                <input type="text" name="Holder Name" placeholder="Holder Name" class="form-control required">
                                            </div>
                                            <div class="container-fluid">
                                                <div class="row form-inline">
                                                    <div class="form-group col-md-6 col-xs-6">
                                                        <label>Card Number: <span>*</span></label>
                                                        <input type="text" name="Card Number" placeholder="Card Number" class="form-control required">
                                                    </div>
                                                    <div class="form-group col-md-6 col-xs-6">
                                                        <label>CVC: <span>*</span></label>
                                                        <input type="text" name="CVC" placeholder="CVC" class="form-control required">
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="container-fluid">
                                                <div class="row form-inline">
                                                    <div class="form-group col-md-3 col-xs-3">
                                                        <label>Expiry Date: </label>
                                                    </div>
                                                    <div class="form-group col-md-3 col-xs-3">
                                                        <label>Month: </label>
                                                        <select class="form-control">
                                                            <option>Jan</option>
                                                            <option>Feb</option>
                                                            <option>Mar</option>
                                                            <option>Apr</option>
                                                            <option>May</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 col-xs-3">
                                                        <label>Year: </label>
                                                        <select class="form-control">
                                                            <option>2017</option>
                                                            <option>2018</option>
                                                            <option>2019</option>
                                                            <option>2020</option>
                                                            <option>2021</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="form-wizard-buttons">
                                                <button type="button" class="btn btn-previous">Previous</button>
                                                <button type="submit" class="btn btn-submit">Submit</button>
                                            </div>
                                        </fieldset>
                                        <!-- Form Step 4 -->

                                    </form>
                                    <!-- Form Wizard -->
                                </div>
                            </div>

                        </div>
                    </section>

                </div>
            </div>

        </div>
    </section>

    {{--signup--}}
    @include('npms.site.pages.widgets.signup')

    {{--contact--}}
    @include('npms.site.pages.widgets.contact')

    <style>
        .form-box {
            padding-top: 40px;
            padding-bottom: 40px;

            background: rgb(234,88,4); /* Old browsers */
            background: -moz-linear-gradient(top,  rgba(234,88,4,1) 0%, rgba(234,40,3,1) 51%, rgba(234,88,4,1) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top,  rgba(234,88,4,1) 0%,rgba(234,40,3,1) 51%,rgba(234,88,4,1) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom,  rgba(234,88,4,1) 0%,rgba(234,40,3,1) 51%,rgba(234,88,4,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ea5804', endColorstr='#ea5804',GradientType=0 ); /* IE6-9 */
        }

        .form-wizard {
            padding: 25px;
            background: #fff;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            border: #ddd 5px solid;
            font-size: 16px;
            font-weight: 300;
            color: #888;
            line-height: 30px;
            text-align: center;
        }

        .form-wizard strong { font-weight: 500; }

        .form-wizard a, .form-wizard a:hover, .form-wizard a:focus {
            color: #64a19d;
            text-decoration: none;
            -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
        }

        .form-wizard h1, .form-wizard h2 {
            margin-top: 10px;
            font-size: 38px;
            font-weight: 100;
            color: #555;
            line-height: 50px;
        }

        .form-wizard h3 {
            font-size: 25px;
            font-weight: 300;
            color: #64a19d;
            line-height: 30px;
            margin-top: 0;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .form-wizard h4 {
            float:left;
            font-size: 20px;
            font-weight: 300;
            color: #64a19d;
            line-height: 26px;
            width:100%;
        }
        .form-wizard h4  span{
            float:right;
            font-size: 18px;
            font-weight: 300;
            color: #555;
            line-height: 26px;
        }

        .form-wizard table tr th{font-weight:normal;}

        .form-wizard img { max-width: 100%; }

        .form-wizard ::-moz-selection { background: #64a19d; color: #fff; text-shadow: none; }
        .form-wizard ::selection { background: #64a19d; color: #fff; text-shadow: none; }


        .form-control {
            height: 44px;
            width:100%;
            margin: 0;
            padding: 0 20px;
            vertical-align: middle;
            background: #fff;
            border: 1px solid #ddd;
            font-size: 16px;
            font-weight: 300;
            line-height: 44px;
            color: #888;
            -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
            -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
            -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
        }
        .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
            position: absolute;
            margin-top: 9px;
            margin-left: -20px;
        }

        .form-control option:hover, .form-control option:checked  {
            box-shadow: 0 0 10px 100px #64a19d inset;
        }

        .form-control:focus {
            outline: 0;
            background: #fff;
            border: 1px solid #ccc;
            -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
        }

        .form-control:-moz-placeholder { color: #888; }
        .form-control:-ms-input-placeholder { color: #888; }
        .form-control::-webkit-input-placeholder { color: #888; }

        .form-wizard label { font-weight: 300; }
        .form-wizard label span { color:#64a19d; }


        .form-wizard .btn {
            min-width: 105px;
            height: 40px;
            margin: 0;
            padding: 0 20px;
            vertical-align: middle;
            border: 0;
            font-size: 16px;
            font-weight: 300;
            line-height: 40px;
            color: #fff;
            -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
            text-shadow: none;
            -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
            -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
        }

        .form-wizard .btn:hover {
            background:#f34727;
            color: #fff;
        }
        .form-wizard .btn:active {
            outline: 0;
            background:#f34727;
            color: #fff;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .form-wizard .btn:focus,
        .form-wizard .btn:active:focus,
        .form-wizard .btn.active:focus {
            outline: 0;
            background:#f34727;
            color: #fff;
        }

        .form-wizard .btn.btn-next,
        .form-wizard .btn.btn-next:focus,
        .form-wizard .btn.btn-next:active:focus,
        .form-wizard .btn.btn-next.active:focus {
            background: #64a19d;
        }

        .form-wizard .btn.btn-submit,
        .form-wizard .btn.btn-submit:focus,
        .form-wizard .btn.btn-submit:active:focus,
        .form-wizard .btn.btn-submit.active:focus {
            background: #64a19d;
        }

        .form-wizard .btn.btn-previous,
        .form-wizard .btn.btn-previous:focus,
        .form-wizard .btn.btn-previous:active:focus,
        .form-wizard .btn.btn-previous.active:focus {
            background: #bbb;
        }

        .form-wizard .success h3{
            color: #4F8A10;
            text-align: center;
            margin: 20px auto !important;
        }
        .form-wizard .success .success-icon {
            color: #4F8A10;
            font-size: 100px;
            border: 5px solid #4F8A10;
            border-radius: 100px;
            text-align: center !important;
            width: 110px;
            margin: 25px auto;
        }
        .form-wizard .progress-bar {
            background-color: #64a19d;
        }

        .form-wizard-steps{
            margin:auto;
            overflow: hidden;
            position: relative;
            margin-top: 20px;
        }
        .form-wizard-step{
            padding-top:10px !important;
            border:2px solid #fff;
            background:#ccc;
        }
        .form-wizard-step.active{
            background:#64a19d;
        }
        .form-wizard-step.activated{
            background:#64a19d;
        }
        .form-wizard-progress {
            position: absolute;
            top: 36px;
            left: 0;
            width: 100%;
            height: 0px;
            background: #64a19d;
        }
        .form-wizard-progress-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 0px;
            background: #64a19d;
        }

        .form-wizard-tolal-steps-3 .form-wizard-step {
            position: relative;
            float: left;
            width: 33.33%;
            padding: 0 5px;
        }
        .form-wizard-tolal-steps-4 .form-wizard-step {
            position: relative;
            float: left;
            width: 25%;
            padding: 0 5px;
        }
        .form-wizard-tolal-steps-5 .form-wizard-step {
            position: relative;
            float: left;
            width: 20%;
            padding: 0 5px;
        }

        .form-wizard-step-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-top: 4px;
            background: #ddd;
            font-size: 16px;
            color: #777;
            line-height: 40px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        .form-wizard-step.activated .form-wizard-step-icon {
            background: #64a19d;
            border: 1px solid #fff;
            color: #fff;
            line-height: 38px;
        }
        .form-wizard-step.active .form-wizard-step-icon {
            background: #fff;
            border: 1px solid #fff;
            color: #64a19d;
            line-height: 38px;
        }

        .form-wizard-step p {
            color: #fff;
        }
        .form-wizard-step.activated p { color: #fff; }
        .form-wizard-step.active p { color: #fff; }

        .form-wizard fieldset {
            display: none;
            text-align: left;
            border:0px !important
        }

        .form-wizard-buttons { text-align: right; }

        .form-wizard .input-error { border-color: #64a19d;}

        /** image uploader **/
        .image-upload a[data-action] {
            cursor: pointer;
            color: #555;
            font-size: 18px;
            line-height: 24px;
            transition: color 0.2s;
        }
        .image-upload a[data-action] i {
            width: 1.25em;
            text-align: center;
        }
        .image-upload a[data-action]:hover {
            color: #64a19d;
        }
        .image-upload a[data-action].disabled {
            opacity: 0.35;
            cursor: default;
        }
        .image-upload a[data-action].disabled:hover {
            color: #555;
        }
        .settings_wrap{
            margin-top:20px;
        }
        .image_picker .settings_wrap {
            overflow: hidden;
            position: relative;
        }
        .image_picker .settings_wrap .drop_target,
        .image_picker .settings_wrap .settings_actions {
            float: left;
        }
        .image_picker .settings_wrap .drop_target {
            margin-right: 18px;
        }
        .image_picker .settings_wrap .settings_actions {
            float: left;
            margin-top: 100px;
            margin-left: 20px;
        }
        .settings_actions.vertical a {
            display: block;
        }
        .drop_target {
            position: relative;
            cursor: pointer;
            transition: all 0.2s;
            width: 250px;
            height: 250px;
            background: #f2f2f2;
            border-radius: 100%;
            margin: 0 auto 25px auto;
            overflow: hidden;
            border: 8px solid #E0E0E0;
        }
        .drop_target input[type="file"] {
            visibility: hidden;
        }
        .drop_target::before {
            content: 'Drop Hear';
            font-family: FontAwesome;
            position: absolute;
            display: block;
            width: 100%;
            line-height: 220px;
            text-align: center;
            font-size: 40px;
            color: rgba(0, 0, 0, 0.3);
            transition: color 0.2s;
        }
        .drop_target:hover,
        .drop_target.dropping {
            background: #f80;
            border-top-color: #cc6d00;
        }
        .drop_target:hover:before,
        .drop_target.dropping:before {
            color: rgba(0, 0, 0, 0.6);
        }
        .drop_target .image_preview {
            width: 100%;
            height: 100%;
            background: no-repeat center;
            background-size: contain;
            position: relative;
            z-index: 2;
        }
    </style>
    <script>
        "use strict";
        function scroll_to_class(element_class, removed_height) {
            var scroll_to = $(element_class).offset().top - removed_height;
            if($(window).scrollTop() != scroll_to) {
                $('.form-wizard').stop().animate({scrollTop: scroll_to}, 0);
            }
        }

        function bar_progress(progress_line_object, direction) {
            var number_of_steps = progress_line_object.data('number-of-steps');
            var now_value = progress_line_object.data('now-value');
            var new_value = 0;
            if(direction == 'right') {
                new_value = now_value + ( 100 / number_of_steps );
            }
            else if(direction == 'left') {
                new_value = now_value - ( 100 / number_of_steps );
            }
            progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
        }

        jQuery(document).ready(function() {

            /*
             Form
             */
            $('.form-wizard fieldset:first').fadeIn('slow');

            $('.form-wizard .required').on('focus', function() {
                $(this).removeClass('input-error');
            });

            // next step
            $('.form-wizard .btn-next').on('click', function() {
                var parent_fieldset = $(this).parents('fieldset');
                var next_step = true;
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
                var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');

                // fields validation
                parent_fieldset.find('.required').each(function() {
                    if( $(this).val() == "" ) {
                        $(this).addClass('input-error');
                        next_step = false;
                    }
                    else {
                        $(this).removeClass('input-error');
                    }
                });
                // fields validation

                if( next_step ) {
                    parent_fieldset.fadeOut(400, function() {
                        // change icons
                        current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                        // progress bar
                        bar_progress(progress_line, 'right');
                        // show next step
                        $(this).next().fadeIn();
                        // scroll window to beginning of the form
                        scroll_to_class( $('.form-wizard'), 20 );
                    });
                }

            });

            // previous step
            $('.form-wizard .btn-previous').on('click', function() {
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
                var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');

                $(this).parents('fieldset').fadeOut(400, function() {
                    // change icons
                    current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
                    // progress bar
                    bar_progress(progress_line, 'left');
                    // show previous step
                    $(this).prev().fadeIn();
                    // scroll window to beginning of the form
                    scroll_to_class( $('.form-wizard'), 20 );
                });
            });

            // submit
            $('.form-wizard').on('submit', function(e) {

                // fields validation
                $(this).find('.required').each(function() {
                    if( $(this).val() == "" ) {
                        e.preventDefault();
                        $(this).addClass('input-error');
                    }
                    else {
                        $(this).removeClass('input-error');
                    }
                });
                // fields validation

            });


        });





        // image uploader scripts

        var $dropzone = $('.image_picker'),
            $droptarget = $('.drop_target'),
            $dropinput = $('#inputFile'),
            $dropimg = $('.image_preview'),
            $remover = $('[data-action="remove_current_image"]');

        $dropzone.on('dragover', function() {
            $droptarget.addClass('dropping');
            return false;
        });

        $dropzone.on('dragend dragleave', function() {
            $droptarget.removeClass('dropping');
            return false;
        });

        $dropzone.on('drop', function(e) {
            $droptarget.removeClass('dropping');
            $droptarget.addClass('dropped');
            $remover.removeClass('disabled');
            e.preventDefault();

            var file = e.originalEvent.dataTransfer.files[0],
                reader = new FileReader();

            reader.onload = function(event) {
                $dropimg.css('background-image', 'url(' + event.target.result + ')');
            };

            console.log(file);
            reader.readAsDataURL(file);

            return false;
        });

        $dropinput.change(function(e) {
            $droptarget.addClass('dropped');
            $remover.removeClass('disabled');
            $('.image_title input').val('');

            var file = $dropinput.get(0).files[0],
                reader = new FileReader();

            reader.onload = function(event) {
                $dropimg.css('background-image', 'url(' + event.target.result + ')');
            }

            reader.readAsDataURL(file);
        });

        $remover.on('click', function() {
            $dropimg.css('background-image', '');
            $droptarget.removeClass('dropped');
            $remover.addClass('disabled');
            $('.image_title input').val('');
        });

        $('.image_title input').blur(function() {
            if ($(this).val() != '') {
                $droptarget.removeClass('dropped');
            }
        });

        // image uploader scripts
    </script>

@endsection