@extends('layouts.master')
@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span> Contact us
        </div>
    </div>
</div>
{{-- contact --}}
<section class="pt-50 pb-50 contact-us">
    <div class="container">

        <div class="row">
            <div class="col-xl-8 col-lg-10 m-auto">
                 @if(Session::has('message_sent'))
        <div class="alert alert-success text-center fw-bold" role="alert">
            {{ Session::get('message_sent') }}


        </div>
        @endif
                <div class="contact-from-area padding-20-row-col wow FadeInUp">
                    <h3 class="mb-4 text-center ">Contact us</h3>
                    <form class="contact-form-style text-center" id="contact-form" action="{{ route('e-commerce.send-email') }}" method="post" enctype="multipart/form-data">
                       @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="name" placeholder="First Name" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="email" placeholder="Your Email" type="email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="telephone" placeholder="Your Phone" type="tel">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="subject" placeholder="Subject" type="text">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="textarea-style mb-30">
                                    <textarea name="message"  placeholder="Message"></textarea>
                                </div>
                                <button class="submit submit-auto-width" type="submit">Send message</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
