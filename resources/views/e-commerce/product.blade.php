@extends('layouts.master')

@section('main')
{{-- breadcrumbs --}}
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
            <span></span> Product

        </div>
    </div>
</div>
{{-- product --}}
<div class="container mt-15 mb-15">
    <div class="" id="products"  aria-labelledby="products-tab">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Your Products</h5>
                <a href="{{ route('e-commerce.create_product') }}"><i class="fi-rs-add"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Qte</th>
                                <th>Price</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($orders as  $order) --}}

                            <tr>
                                <td>#</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>
                                    <a href="#" class="btn-small d-block">View</a>
                                </td>
                            </tr>
                            {{-- @endforeach --}}


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
