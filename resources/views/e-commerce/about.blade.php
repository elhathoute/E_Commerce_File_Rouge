@extends('layouts.master')
@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span> About us
        </div>
    </div>
</div>
{{-- About our company --}}
<section class="section-padding">
    <div class="container pt-25">
        <div class="row">
            <div class="col-lg-6 align-self-center mb-lg-0 mb-4">
                <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated">Our Company</h6>
                <h1 class="font-heading mb-40">
                    MyShoes ™: breathable shoes
                </h1>
                <p>
                    MyShoes combines urban-inspired design with innovative technologies to bring unique footwear and apparel collections to life.

Versatile and functional, the MyShoes collections include casual and elegant shoes, sneakers, boots, for men and women, as well as a wide range of children's shoes, synonymous with breathable comfort and well-being.
                </p>

            </div>
            <div class="col-lg-6">
                <img src="{{ asset('assets/imgs/page/about-2.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>

@endsection
