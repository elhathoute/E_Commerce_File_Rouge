@extends('layouts.master')

@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span> Order

        </div>
    </div>
</div>
{{-- panier --}}
<section class="mt-50 mb-50">
    <div class="container">

<div class="cart-dropdown-wrap cart-dropdown-hm2">
    <ul>
        @php
            $total_price=0;
        @endphp

        @if (!$order->isEmpty())

        @foreach ($order as $panier )
        <li>
            <div class="shopping-cart-img">
                <a href="{{ route('e-commerce.view_product',['id'=>$panier->product_id]) }}"><img alt="Surfside Media" src="{{ asset('assets/imageProducts/'.$panier->product->images->first()->image ) }}"></a>
            </div>
            <div class="shopping-cart-title">
                <h4><a href="{{ route('e-commerce.view_product',['id'=>$panier->product_id]) }}">{{ $panier->product->name }}</a></h4>
                <h4><span>{{ $panier->quantity }} × </span>{{ $panier->price }}DH</h4>
                <pre class="text-secondary">{{ $panier->date }}</pre>
                <pre class="text-secondary">{{ $panier->size->size }}</pre>
                <pre class="text-secondary">{{ $panier->color->name }}</pre>
                <a >#{{ $panier->product->category->name }} # {{ $panier->product->sub_category->name }}</a>

            </div>
            {{-- <div class="shopping-cart-delete">
                <a href="{{ route('e-commerce.delete_panier',['id'=>$panier->id]) }}"><i class="fi-rs-cross-small icon-delete-panier"></i></a>
            </div> --}}
        </li>
        @php
        $total_price+=$panier->total;
        @endphp
        @endforeach
        @else
        <h5 class="text-center text-secondary">Order not exist <span>
    <a href="{{ route('e-commerce.home') }}" class="outline">Back</a>
</span></h5>
        @endif

    </ul>
    @if (!$order->isEmpty())

    <div class="shopping-cart-footer">
        <div class="shopping-cart-total">
            <h4>Total <span>{{  $total_price }}DH</span></h4>
        </div>
        <div class="shopping-cart-button">
            <a href="{{ route('e-commerce.home') }}" class="outline">Back</a>

        </div>
    </div>
    @endif
</div>


</div>
@endsection
