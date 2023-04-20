@extends('layouts.master')
@section('main')

        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
                    <span></span> <a href="{{ route('e-commerce.shop') }}">Shop</a>
                    <span></span> Checkout
                </div>
            </div>
        </div>
      {{-- checkout --}}
            <div class="container mt-15 mb-15">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 my-2 ">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Order</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $total=0;
                                    @endphp
                                    @foreach ($orders as $key=>$order)
                                        @php
                                            $product = App\Models\Product::find($order->product_id);
                                            $color = App\Models\Color::find($order->color_id);
                                            $size = App\Models\Size::find($order->size_id);

                                            $total+=($order->quantity)*($order->price_product );
                                        @endphp
                                    <tbody>
                                        {{-- {{ dd($product) }} --}}


                                        <tr>
                                            <td class="image product-thumbnail d-flex align-items-center justify-content-between">
                                              <div><img src="{{ asset('assets/imageProducts/'.$product->images()->first()->image) }}" alt="#"></div>
                                               <div>
                                                 <ul class="list-filter color-filter">
                                                <li class="active"><a class="bg-secondary"><span class="product-color-{{ $color->name}}"></span></a></li>
                                            </ul>
                                              </div>
                                                <div>
                                                    <p class="ms-1 text-secondary fw-bold badge bg-white pt-2">{{ $size->size }}</p>
                                                </div>
                                                            </td>
                                            <td>
                                                <h5><a href="#">{{ $product->name }}</a></h5>
                                                <span class="product-qty fw-bold">{{ $order->quantity }} x {{ $order->price_product }}  </span>


                                            </td>
                                            <td ><span class="fw-bold text-primary">{{ ($order->quantity)*($order->price_product ) }}DH</span> </td>
                                        </tr>

                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">{{ ($order->quantity)*($order->price_product ) }}DH</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>Free Shipping</em></td>
                                        </tr>





                                    </tbody>
                                    @endforeach
                                    <tr class="bg-secondary text-white">
                                        <th>Total</th>
                                        <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">{{ $total }}DH</span></td>
                                    </tr>

                                </table>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>

                        <form id="form-change-info" action="{{ route('e-commerce.change_adress_user',['id'=>auth()->user()->id]) }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div hidden class="form-group col-md-12">
                                    {{-- <input type="number" hidden class="form-control" id="id" name="id" value="{{ auth()->user()->id }}"> --}}
                                  </div>
                                  <div class="form-group col-md-12">
                                    <label for="email">email : </label>
                                    <input type="email" class="form-control " id="email" name="email" value="{{ auth()->user()->email}}" readonly placeholder="Enter email">
                                    <div id="email-error" class="text-danger ">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">Country : </label>
                                    <input type="text" class="form-control " id="country" name="country" value="Morocco" readonly placeholder="Enter country">
                                    <div id="country-error" class="text-danger ">
                                    </div>
                                </div>
                                  <div class="form-group col-md-6">
                                    <label for="city">City : <span class="required">*</span> </label>
                                    <input type="text" class="form-control " id="city" name="city" value="{{ auth()->user()->city }}" readonly placeholder="Enter country">


                                    <div id="city-error" class="text-danger inputs-error">
                                    </div>
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="postal">Postal Code : <span class="required">*</span></label>
                                    <input readonly type="text" class="form-control inputs-valid" id="postal" name="postal" value="{{ auth()->user()->postal }}" placeholder="Enter postal code">
                                    <div id="postal-error" class="text-danger inputs-error">
                                    </div>
                                </div>
                                  <div class="form-group col-md-6">
                                    <label for="phone">Phone Number : <span class="required">*</span></label>
                                    <input readonly type="text" class="form-control inputs-valid" id="phone" name="phone" value="{{ auth()->user()->phone }}" placeholder="Enter phone number">
                                    <div id="phone-error" class="text-danger inputs-error">
                                    </div>
                                </div>
                                  <div class="form-group col-md-12">
                                    <label for="address">Address : <span class="required">*</span></label>
                                    <input  readonly type="text" class="form-control inputs-valid" id="address-input" name="address" value="{{ auth()->user()->address }}" placeholder="Enter address">
                                    <div id="address-error" class="text-danger inputs-error">
                                    </div>
                                </div>

                                  <div class="col-md-12 text-center">
                                    <a href="{{ route('e-commerce.user.profile') }}" class="text-danger" name="submit" value="Submit">Change Informations ?</a>
                                </div>
                            </div>
                          </form>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                        <div class="payment_method">
                            <div class="mb-25">
                                <h5>Payment</h5>
                            </div>

                            <form id="form-paiment" action="{{ route('e-commerce.store_paiment')}}" method="post">
                                @csrf
                                @csrf
                                <input type="hidden" name="orders" value="{{ json_encode($orders) }}">
                            <div class="payment_option">

                                <div class="payment_option">
                                    <div class="form-group">
                                      <label for="card_number">Card Number <span class="text-danger">*(16 digits)</span></label>
                                      <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Enter card number" required>
                                    </div>
                                    <div class="form-group ">
                                      <label for="expiration_date">Expiration Date <span class="text-danger">*(format 03/23)</span></label>
                                      <input type="text" class="form-control" id="expiration_date" name="expiration_date" placeholder="Enter expiration date" required>
                                    </div>
                                    <div class="form-group ">
                                      <label for="cvc">CVC <span class="text-danger" >*(4 digits)</span></label>
                                      <input type="text" class="form-control" id="cvc" name="cvc" placeholder="Enter CVC" required>
                                    </div>
                                  </div>



                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-30">
                            <button   class="btn btn-fill-out btn-block  d-flex justify-content-center">Done</button>
                            <a href="{{ route('e-commerce.panier') }}"  class="fw-bold">back</a>

                        </div>
                </form>

                    </div>

                </div>
                {{-- <div class="row"> --}}

            {{-- </div> --}}
            </div>



@endsection
