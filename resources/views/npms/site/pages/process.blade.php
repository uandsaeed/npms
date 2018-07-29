@extends('npms.site.template.front_end_1')

@section('title', $title)


@section('content')

    <!-- Header -->
    <header class="masthead masthead-process">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">Our Process</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">What sets us apart is how we deliver our service.</h2>
            </div>
        </div>
    </header>

    <!-- Content Section -->
    <section id="projects" class="projects-section bg-light">
        <div class="container">

            <!-- Content Row -->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-md-12">
                    <div class="featured-text text-center text-lg-left">
                        <h3>Our recommendation algorithm is continually fine tuned to ensure you only get the best and most relevant skin care regime options.</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-md-4">
                    <div class="card-body text-center">
                        <img src="{{ url(IMAGE_PATH."icon_fill-out-form.svg") }}" style="width:100px;">
                        <br/><br/>
                        <h3>Assessment</h3>
                        <p class="text-black-50 mb-0">You fill out the assessment form and provide some details about your skin</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body text-center">
                        <img src="{{ url(IMAGE_PATH."icon_benchmarking_p-1.svg") }}" style="width:100px;">
                        <br/><br/>
                        <h3>Algorithm</h3>
                        <p class="text-black-50 mb-0">Our algorithm determines the skin care products most suitable for your skin type.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body text-center">
                        <img src="{{ url(IMAGE_PATH."icon_dynamic-content_B.svg") }}" style="width:100px;">
                        <br/><br/>
                        <h3>Recommendations</h3>
                        <p class="text-black-50 mb-0">Your recommendations are delivered via email and shown on screen.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-md-4">
                    <div class="card-body text-center">
                        <img src="{{ url((IMAGE_PATH."icon_multiple-accounts_p-1.svg")) }}" style="width:100px;">
                        <br/><br/>
                        <h3>Order</h3>
                        <p class="text-black-50 mb-0">Should you chose to place an order, the products in your regime will be posted to you.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body text-center">
                        <img src="{{ url(IMAGE_PATH."icon_progressive-profiling_b.svg") }}" style="width:100px;">
                        <br/><br/>
                        <h3>Regime</h3>
                        <p class="text-black-50 mb-0">Follow the skin regime for four to six weeks and assess your skin improvement.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body text-center">
                        <img src="{{ url(IMAGE_PATH."icon_agency_p.svg") }}" style="width:100px;">
                        <br/><br/>
                        <h3>Feedback</h3>
                        <p class="text-black-50 mb-0">Your feedback refines future recommendations and that of others with similar skin.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>


    {{--signup--}}
    @include('npms.site.pages.widgets.signup')

    {{--contact--}}
    @include('npms.site.pages.widgets.contact')

@endsection