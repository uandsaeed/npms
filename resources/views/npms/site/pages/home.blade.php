@extends('npms.site.template.front_end_1')

@section('title', $title)


@section('content')

    <!-- Header -->
    <header class="masthead masthead-home">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">SkinLyst</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">You are different. Your skincare regime should be too. SkinLyst offers personalised beauty product recommendations.</h2>
                <a href="assessment.html" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </header>


    <!-- About Section -->
    <section id="about" class="about-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">Built by beauty experts</h2>
                    <p class="text-white-50">SkinLyst was created by cosmetology scientists and beauticians who have a deep understanding of skincare regimes and their effect on individual skin concerns.
                        You can read more about how the <a href="process.html">SkinLyst Method</a> differs from other beauty care recommendation services.</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <img src="{{ url(IMAGE_PATH."SkinLyst-mask-landscape.jpg") }}" class="img-fluid" alt="">
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
        <div class="container">

            <!-- Featured Project Row -->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-6 col-lg-6">
                    <div class="featured-text text-center text-lg-left">
                        <h4>A skin care regime just for you</h4>
                        <p class="text-black-50 mb-0">No more "one-size fits all" regimes. We have trawled through
                            thousands of beauty products to find you the best options given your skin type,
                            environment and skin concerns.</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <img class="img-fluid mb-3 mb-lg-0"
                         src="{{ url(IMAGE_PATH."skinlyst-model-landscape-2a.jpg") }}"
                         alt="">
                </div>
            </div>

            <!-- Project One Row -->
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                <div class="col-lg-6">
                    <img class="img-fluid" src="{{ url(IMAGE_PATH."skinlyst-model-1f.jpg") }}" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">A free personalised recommendation service</h4>
                                <p class="mb-0 text-white-50">SkinLyst is free and there is no commitment to purchase.
                                    Why not start your free assessment now?</p>
                                <br/>
                                <a href="assessment.html" class="btn btn-primary js-scroll-trigger">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Two Row -->
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-6">
                    <img class="img-fluid" src="{{ url(IMAGE_PATH."skinlyst-model-1b.jpg")  }}" alt="">
                </div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Beauty experts on-hand and ready to help</h4>
                                <p class="mb-0 text-white-50">If after the assessment you would still like to speak
                                    with a skin care expert, you can chat or email us to go over your results. No chatbots,
                                    no lengthy support queues.</p>
                                <hr class="d-none d-lg-block mb-0 mr-0">
                            </div>
                        </div>
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