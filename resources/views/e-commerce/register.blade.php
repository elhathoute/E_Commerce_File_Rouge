@extends('layouts.master')
@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span> SignUp
        </div>
    </div>
</div>
{{-- login --}}
<section class="pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1 d-flex align-items-center justify-content-evenly">
                                    <h3 class="mb-30">Create an Account</h3>
                                    <svg class="mb-30" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#f4870b" stroke="#f4870b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#E4EAF8;" d="M494.345,472.276H17.655C7.904,472.276,0,464.372,0,454.621V57.379 c0-9.751,7.904-17.655,17.655-17.655h476.69c9.751,0,17.655,7.904,17.655,17.655v397.241 C512,464.372,504.096,472.276,494.345,472.276z"></path> <g> <path style="fill:#D5DCED;" d="M432.552,229.517H79.448c-4.875,0-8.828-3.953-8.828-8.828v-52.966c0-4.875,3.953-8.828,8.828-8.828 h353.103c4.875,0,8.828,3.953,8.828,8.828v52.966C441.379,225.565,437.427,229.517,432.552,229.517z"></path> <path style="fill:#D5DCED;" d="M512,83.862H0V57.379c0-9.751,7.904-17.655,17.655-17.655h476.69 c9.751,0,17.655,7.904,17.655,17.655V83.862z"></path> </g> <path style="fill:#E4EAF8;" d="M26.483,75.034h-8.828c-4.875,0-8.828-3.953-8.828-8.828v-8.828c0-4.875,3.953-8.828,8.828-8.828 h8.828c4.875,0,8.828,3.953,8.828,8.828v8.828C35.31,71.082,31.358,75.034,26.483,75.034z"></path> <path style="fill:#FF5050;" d="M423.724,75.034h-8.828c-4.875,0-8.828-3.953-8.828-8.828v-8.828c0-4.875,3.953-8.828,8.828-8.828 h8.828c4.875,0,8.828,3.953,8.828,8.828v8.828C432.552,71.082,428.599,75.034,423.724,75.034z"></path> <path style="fill:#FFF082;" d="M459.034,75.034h-8.828c-4.875,0-8.828-3.953-8.828-8.828v-8.828c0-4.875,3.953-8.828,8.828-8.828 h8.828c4.875,0,8.828,3.953,8.828,8.828v8.828C467.862,71.082,463.91,75.034,459.034,75.034z"></path> <path style="fill:#A0FFB4;" d="M494.345,75.034h-8.828c-4.875,0-8.828-3.953-8.828-8.828v-8.828c0-4.875,3.953-8.828,8.828-8.828 h8.828c4.875,0,8.828,3.953,8.828,8.828v8.828C503.172,71.082,499.22,75.034,494.345,75.034z"></path> <g> <path style="fill:#FFFFFF;" d="M432.552,339.862H220.69c-4.875,0-8.828-3.953-8.828-8.828v-17.655c0-4.875,3.953-8.828,8.828-8.828 h211.862c4.875,0,8.828,3.953,8.828,8.828v17.655C441.379,335.91,437.427,339.862,432.552,339.862z"></path> <path style="fill:#FFFFFF;" d="M432.552,410.483H220.69c-4.875,0-8.828-3.953-8.828-8.828V384c0-4.875,3.953-8.828,8.828-8.828 h211.862c4.875,0,8.828,3.953,8.828,8.828v17.655C441.379,406.53,437.427,410.483,432.552,410.483z"></path> </g> <path style="fill:#464655;" d="M158.897,357.517h-17.655v-35.31c0-14.603-11.88-26.483-26.483-26.483s-26.483,11.88-26.483,26.483 v35.31H70.621v-35.31c0-24.337,19.801-44.138,44.138-44.138s44.138,19.801,44.138,44.138V357.517z"></path> <path style="fill:#707487;" d="M114.759,419.31L114.759,419.31c24.376,0,44.138-19.762,44.138-44.138v-17.655 c0-4.875-3.953-8.828-8.828-8.828H79.448c-4.875,0-8.828,3.953-8.828,8.828v17.655C70.621,399.549,90.382,419.31,114.759,419.31z"></path> <path style="fill:#464655;" d="M114.759,392.828c-4.879,0-8.828-3.948-8.828-8.828v-8.828c0-4.879,3.948-8.828,8.828-8.828 c4.879,0,8.828,3.948,8.828,8.828V384C123.586,388.879,119.638,392.828,114.759,392.828z"></path> <path style="fill:#f09800;" d="M194.207,180.966v52.966c0,4.875,3.953,8.828,8.828,8.828h105.931c4.875,0,8.828-3.953,8.828-8.828 v-52.966H194.207z"></path> <g> <path style="fill:#dbac00;" d="M353.103,172.129l-17.655,0.018l0.086,70.621c0.009,4.871,3.957,8.819,8.828,8.819h0.009 c4.879-0.009,8.828-3.966,8.819-8.836L353.103,172.129z"></path> <path style="fill:#dbac00;" d="M194.207,209.241l48.146,12.839c4.45,1.186,9.042,1.789,13.647,1.789 c4.606,0,9.197-0.601,13.647-1.789l48.146-12.839v-28.276H194.207V209.241z"></path> </g> <path style="fill:#ffae00;" d="M246.902,139.254l-112.263,29.937c-3.019,0.806-3.019,5.09,0,5.895l112.263,29.937 c5.961,1.59,12.235,1.59,18.196,0l112.263-29.937c3.019-0.806,3.019-5.09,0-5.895l-112.263-29.937 C259.137,137.664,252.863,137.664,246.902,139.254z"></path> <circle style="fill:#f09800;" cx="344.276" cy="269.241" r="8.828"></circle> </g></svg>
                                </div>

                                <form method="post" action="{{ route('e-commerce.register_user') }} " enctype="multipart/form-data">
                                    @if(Session::has('register_success'))
                                    <div class="alert-success">
                                        {{ Session::get('register_success')}}
                                    </div>
                                    @endif

                                    @if(Session::has('register_error'))
                                    <div class="alert-success">
                                        {{ Session::get('register_error') }}
                                    </div>
                                    @endif

                                    @csrf
                                    <div class="form-group">
                                        <input type="text" required name="name" placeholder="Name">
                                        <span class="text-danger">
                                            @error('name')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required name="email" placeholder="Email">
                                        <span class="text-danger">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input required type="password" name="password" placeholder="Password">
                                        <span class="text-danger">
                                            @error('password')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input required type="password" name="password_verify" placeholder="Confirm password">
                                        <span class="text-danger">
                                            @error('password_verify')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="check" id="check"   value="checked">
                                                <label class="form-check-label" for="check"><span>I agree to terms &amp; Policy.</span></label>
                                                <span class="text-danger">
                                                    @error('check')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-fill-out  btn-block hover-up" name="login">Submit &amp; Register</button>
                                    </div>
                                </form>
                                <div class="text-muted text-center">Already have an account? <a href="{{ route('e-commerce.login') }}">Sign in now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-contant-center">
                        <img class="rounded-3" src="{{ asset('assets/imgs/register.png') }}">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
