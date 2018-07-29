@extends('npms.site.template.front_end_1')

@section('title', $title)


@section('content')

    <!-- Header -->
    <header class="masthead masthead-contact">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">Contact</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">Get in touch with us.</h2>
            </div>
        </div>
    </header>

    <section id="contact">
        <div class="section-content">
            <h1 class="section-header">We usually respond to enquiries within 24 hours.</h1>
        </div>
        <div class="contact-section">
            <form>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 form-line">
                            <div class="form-group">
                                <label for="exampleInputUsername">Your name</label>
                                <input type="text" class="form-control" id=""
                                       placeholder=" Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Email Address</label>
                                <input type="email" class="form-control" id="exampleInputEmail"
                                       placeholder=" Enter Email" required>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Mobile (optional)</label>
                                <input type="tel" class="form-control" id="telephone"
                                       placeholder=" Enter mobile number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for ="description"> Message</label>
                                <textarea  class="form-control" id="description"
                                           placeholder="Enter Your Message" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
    </section>

    {{--signup--}}
    @include('npms.site.pages.widgets.signup')

    {{--contact--}}
    @include('npms.site.pages.widgets.contact')


@endsection