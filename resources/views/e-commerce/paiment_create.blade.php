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
                    <div class="col-md-6">
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
                                <div class="form-group col-md-6">
                                    <label for="country">Country : </label>
                                    <input type="text" class="form-control " id="country" name="country" value="Morocco" readonly placeholder="Enter country">
                                    <div id="country-error" class="text-danger ">
                                    </div>
                                </div>
                                  <div class="form-group col-md-6">
                                    <label for="city">City : <span class="required">*</span> </label>
                                    <input type="text" class="form-control " id="city" name="city" value="{{ auth()->user()->city }}" readonly placeholder="Enter country">

                                    {{-- <select class="form-control inputs-valid" id="city" name="city">
                                      <option value="" selected disabled>Select city</option>
                                      <option   @if(auth()->user()->city=='Casablanca') selected @endif value="Casablanca">Casablanca</option>
                                      <option  @if(auth()->user()->city=='Rabat') selected @endif  value="Rabat" >Rabat</option>
                                      <option  @if(auth()->user()->city=='Marrakech') selected @endif value="Marrakech">Marrakech</option>
                                      <option  @if(auth()->user()->city=='Agadir') selected @endif value="Agadir">Agadir</option>
                                      <option  @if(auth()->user()->city=='Safi') selected @endif  value="Safi" >Safi</option>
                                      <option  @if(auth()->user()->city=='Tanger') selected @endif value="Tanger">Tanger</option>
                                      <option  @if(auth()->user()->city=='Fes') selected @endif  value="Fes">Fes</option>

                                    </select> --}}
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
                    <div class="col-md-6">
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
                                    <tbody>


                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{ asset('assets/imageProducts/'.$order->product->images()->first()->image) }}" alt="#"></td>
                                            <td>
                                                <h5><a href="#">{{ $order->product->name }}</a></h5> <span class="product-qty">x {{ $order->quantity }}</span>
                                            </td>
                                            <td>{{ ($order->quantity)*($order->price) }}DH</td>
                                        </tr>

                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">{{ ($order->quantity)*($order->price) }}DH</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>Free Shipping</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">{{ ($order->quantity)*($order->price) }}DH</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                    <div class="payment_method">
                        <div class="mb-25">
                            <h5>Payment</h5>
                        </div>
                        <form id="form-paiment" action="{{ route('e-commerce.store_paiment',['id'=>$order->id])}}" method="post">
                            @csrf
                        <div class="payment_option">

                            <div class="payment_option">
                                <div class="form-group">
                                  <label for="card_number">Card Number</label>
                                  <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Enter card number" required>
                                </div>
                                <div class="form-group">
                                  <label for="expiration_date">Expiration Date</label>
                                  <input type="text" class="form-control" id="expiration_date" name="expiration_date" placeholder="Enter expiration date" required>
                                </div>
                                <div class="form-group">
                                  <label for="cvc">CVC</label>
                                  <input type="text" class="form-control" id="cvc" name="cvc" placeholder="Enter CVC" required>
                                </div>
                              </div>



                        </div>
                    </div>

                    <button href="#"  class="btn btn-fill-out btn-block mt-30 d-flex justify-content-center">Done</button>
            </form>

                </div>
            </div>
            </div>



@endsection
