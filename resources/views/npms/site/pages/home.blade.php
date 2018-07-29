@extends('npms.site.template.front_end_1')

@section('title', $title)


@section('content')

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

    <!-- Signup Section -->
    <section id="signup" class="signup-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto text-center">

                    <i class="far fa-paper-plane fa-2x mb-2"></i>
                    <h2 class="mb-5">Subscribe to receive updates and newsletters</h2>

                    <form class="form-inline d-flex">
                        <input type="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail"
                               placeholder="Enter email address...">
                        <button type="submit" class="btn btn-primary mx-auto">Subscribe</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section bg-black">
        <div class="container">

            <div class="row">

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">20-22 Wenlock Road, London N17GU</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">
                                <a href="#">hello@skinlyst.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">+44 (0) 208 123 1234</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="social d-flex justify-content-center">
                <a href="#" class="mx-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-github"></i>
                </a>
            </div>

        </div>
    </section>


@endsection