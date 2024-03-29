@extends('layouts.master')
@section('main')

<main class="main">
    {{-- breadcrumbs --}}
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('e-commerce.home') }}" rel="nofollow">Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>
    {{-- account --}}
    <section class="pt-50 pb-50">

        <div class="container">

            <div class="row">

                <div id="sucess-error-update-info" class="col-md-10 m-auto">

                    {{-- show success or fail message --}}
                  </div>

                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <form method="post" action="{{ route('e-commerce.logout') }}">
                                            @csrf
                                            <button class="btn btn-logout w-100 " type="submit"><i class="fi-rs-sign-out mr-10"></i> Logout</button>
                                        </form>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Hello <strong class="text-decoration-underline  ">{{ auth()->user()->name }}</strong> </h5>
                                        </div>
                                        @if (auth()->user()->role=='user')
                                        <div class="card-body">
                                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                        </div>
                                        @else
                                        <div class="card-body">
                                            @php
                                            $count_products = App\Models\Product::count();
                                            $count_categories = App\Models\Category::count();
                                            $count_sub_categories = App\Models\SubCategory::count();
                                            $count_colors = App\Models\Color::count();
                                            $count_sizes= App\Models\Size::count();
                                            $count_reviews= App\Models\Review::count();
                                            $count_brands= App\Models\Brande::count();
                                            $count_orders = App\Models\Panier::where('etat','=','order')->count();
                                        @endphp
                                           <div class="row mb-3 ">


                                            <div class="col-md-3 ">


                                                <h3 class="text-center">Products</h3>

                                                <p class="fw-bold text-center">{{ $count_products }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h3 class="text-center">categories</h3>
                                                <p class="fw-bold text-center">{{  $count_categories }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h3 class="text-center">SubCategories</h3>
                                                <p class="fw-bold text-center">{{  $count_sub_categories }}</p>

                                            </div>
                                            <div class="col-md-3">
                                                <h3 class="text-center">Orders</h3>
                                                <p class="fw-bold text-center">{{  $count_orders }}</p>

                                            </div>
                                           </div>
                                           <hr>
                                           <div class="row mt-3">


                                            <div class="col-md-3">


                                                <h3 class="text-center">Colors</h3>

                                                <p class="fw-bold text-center">{{ $count_colors }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h3 class="text-center">Sizes</h3>
                                                <p class="fw-bold text-center">{{   $count_sizes }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h3 class="text-center">Reviews</h3>
                                                <p class="fw-bold text-center">{{   $count_reviews }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h3 class="text-center">Brands</h3>
                                                <p class="fw-bold text-center">{{   $count_brands }}</p>
                                            </div>

                                           </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                @php
                               $orders=App\Models\Panier::where('user_id','=',auth()->user()->id)
                              ->where('etat','=','order')
                              ->get();
                                @endphp
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Orders</h5>
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
                                                        @foreach ($orders as  $order)

                                                        <tr>
                                                            <td>#{{ $order->id }}</td>
                                                            <td>{{ $order->date }}</td>
                                                            <td>{{ $order->quantity }}</td>
                                                            <td>{{ $order->price }}DH</td>
                                                            <td>{{ $order->color->name }}</td>
                                                            <td>{{ $order->size->size }}</td>
                                                            <td>{{ $order->total }}DH</td>
                                                            <td><a href="{{ route('e-commerce.order',['id'=>$order->id]) }}" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h5 class="mb-0"> Address</h5>
                                                </div>
                                                <div class="card-body">
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
                                                            <select class="form-control inputs-valid" id="city" name="city">
                                                              <option value="" selected disabled>Select city</option>
                                                              <option   @if(auth()->user()->city=='Casablanca') selected @endif value="Casablanca">Casablanca</option>
                                                              <option  @if(auth()->user()->city=='Rabat') selected @endif  value="Rabat" >Rabat</option>
                                                              <option  @if(auth()->user()->city=='Marrakech') selected @endif value="Marrakech">Marrakech</option>
                                                              <option  @if(auth()->user()->city=='Agadir') selected @endif value="Agadir">Agadir</option>
                                                              <option  @if(auth()->user()->city=='Safi') selected @endif  value="Safi" >Safi</option>
                                                              <option  @if(auth()->user()->city=='Tanger') selected @endif value="Tanger">Tanger</option>
                                                              <option  @if(auth()->user()->city=='Fes') selected @endif  value="Fes">Fes</option>

                                                            </select>
                                                            <div id="city-error" class="text-danger inputs-error">
                                                            </div>
                                                          </div>

                                                          <div class="form-group col-md-6">
                                                            <label for="postal">Postal Code : <span class="required">*</span></label>
                                                            <input type="text" class="form-control inputs-valid" id="postal" name="postal" value="{{ auth()->user()->postal }}" placeholder="Enter postal code">
                                                            <div id="postal-error" class="text-danger inputs-error">
                                                            </div>
                                                        </div>
                                                          <div class="form-group col-md-6">
                                                            <label for="phone">Phone Number : <span class="required">*</span></label>
                                                            <input type="text" class="form-control inputs-valid" id="phone" name="phone" value="{{ auth()->user()->phone }}" placeholder="Enter phone number">
                                                            <div id="phone-error" class="text-danger inputs-error">
                                                            </div>
                                                        </div>
                                                          <div class="form-group col-md-12">
                                                            <label for="address">Address : <span class="required">*</span></label>
                                                            <input type="text" class="form-control inputs-valid" id="address-input" name="address" value="{{ auth()->user()->address }}" placeholder="Enter address">
                                                            <div id="address-error" class="text-danger inputs-error">
                                                            </div>
                                                        </div>

                                                          <div class="col-md-12 text-center">
                                                            <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                                        </div>
                                                    </div>
                                                  </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">

                                            <form id="form-compte-info" action="{{ route('e-commerce.change_compte_user',['id'=>auth()->user()->id]) }}" method="post" enctype="multipart/form-data">

                                                @csrf
                                                @method('PATCH')

                                                <div class="row">
                                                    <div hidden class="form-group col-md-12">
                                                        {{-- <input type="number" hidden class="form-control" id="id" name="id" value="{{ auth()->user()->id }}"> --}}
                                                      </div>
                                                    <div class="form-group col-md-6">
                                                        <label> Name <span class="required">*</span></label>
                                                        <input  class="form-control inputs-valid-compte @error('name') is-invalid @enderror" name="name" type="text" value="{{ auth()->user()->name }}">
                                                        {{-- <div id="name-error" class="text-danger   inputs-error-compte">
                                                        </div> --}}
                                                        <div class="invalid-feedback">
                                                            @error('name')
                                                            {{ $message }}
                                                            @enderror
                                                          </div>
                                                    </div>


                                                    <div class="form-group col-md-6">
                                                        <label>Email Address <span class="required">*</span></label>
                                                        <input required="" class="form-control inputs-valid-compte @error('email') is-invalid @enderror" name="email" type="email" value="{{ auth()->user()->email}}">
                                                        {{-- <div id="email-error" class="text-danger  inputs-error-compte">
                                                        </div> --}}
                                                        <div class="invalid-feedback">
                                                            @error('email')
                                                            {{ $message }}
                                                            @enderror
                                                          </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Current Password <span class="required">*</span></label>
                                                        <input required="" class="form-control inputs-valid-compte @error('password_old') is-invalid @enderror " name="password_old" type="password">
                                                        {{-- <div id="password_old-error" class="text-danger inputs-error-compte">
                                                        </div> --}}
                                                        <div class="invalid-feedback">
                                                            @error('password_old')
                                                            {{ $message }}
                                                            @enderror
                                                          </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>New Password <span class="required">*</span></label>
                                                        <input required="" class="form-control inputs-valid-compte @error('password_new') is-invalid @enderror " name="password_new" type="password">
                                                        {{-- <div id="password_new-error" class="text-danger inputs-error-compte">
                                                        </div> --}}
                                                        <div class="invalid-feedback">
                                                            @error('password_new')
                                                            {{ $message }}
                                                            @enderror
                                                          </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input required="" class="form-control inputs-valid-compte @error('password_confirm') is-invalid @enderror" name="password_confirm" type="password">
                                                        {{-- <div id="password_confirm-error" class="text-danger inputs-error-compte">
                                                        </div> --}}
                                                        <div class="invalid-feedback">
                                                            @error('password_confirm')
                                                            {{ $message }}
                                                            @enderror
                                                          </div>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
