@extends('npms.site.template.front_end_1')

@section('title', $title)


@section('content')

    <header class="masthead masthead-about">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">About us</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">Learn about what what we do and why we do it.</h2>
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
                        <h3>We got started to help those frustrated with their ineffective skin care regimes. We thought of a better way.</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-md-12">
                    <h3>Our Team</h3>
                    <p class="text-black-50 mb-0">You may not know know this but our team is amazing. Comprising of the finest experts from the worldover. We are the best because we just are. period. Don't be shy to learn why we are the best, if its not obvious already!</p>
                    <hr class="my-4">
                    <h3>Our Philosophy</h3>
                    <p class="text-black-50 mb-0">We believe in just getting things done.</p>
                    <hr class="my-4">
                    <h3>Our Commitment</h3>
                    <p class="text-black-50 mb-0">We are commited to making are users very very happy.</p>
                </div>
            </div>

        </div>
    </section>


    {{--signup--}}
    @include('npms.site.pages.widgets.signup')

    {{--contact--}}
    @include('npms.site.pages.widgets.contact')

@endsection