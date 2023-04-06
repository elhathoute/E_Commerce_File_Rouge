@extends('layouts.master')
@section('main')

<main class="main">
    {{-- breadcrumbs --}}
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
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
                                        <div class="card-body">
                                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                        </div>
                                    </div>
                                </div>
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
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#1357</td>
                                                            <td>March 45, 2022</td>
                                                            <td>Processing</td>
                                                            <td>$125.00 for 2 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2468</td>
                                                            <td>June 29, 2022</td>
                                                            <td>Completed</td>
                                                            <td>$364.00 for 5 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2366</td>
                                                            <td>August 02, 2022</td>
                                                            <td>Completed</td>
                                                            <td>$280.00 for 3 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
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
                                                  <form id="form-change-info" action="{{ route('e-commerce.change_adress_user') }}" method="post" enctype="multipart/form-data">

                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="row">
                                                        <div hidden class="form-group col-md-12">
                                                            <input type="number" hidden class="form-control" id="id" name="id" value="{{ auth()->user()->id }}">
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

                                            <form id="form-compte-info" action="{{ route('e-commerce.change_compte_user') }}" method="post" enctype="multipart/form-data">

                                                @csrf
                                                @method('PATCH')

                                                <div class="row">
                                                    <div hidden class="form-group col-md-12">
                                                        <input type="number" hidden class="form-control" id="id" name="id" value="{{ auth()->user()->id }}">
                                                      </div>
                                                    <div class="form-group col-md-6">
                                                        <label> Name <span class="required">*</span></label>
                                                        <input  class="form-control inputs-valid-compte" name="name" type="text" value="{{ auth()->user()->name }}">
                                                        <div id="name-error" class="text-danger inputs-error-compte">
                                                        </div>
                                                    </div>


                                                    <div class="form-group col-md-6">
                                                        <label>Email Address <span class="required">*</span></label>
                                                        <input required="" class="form-control inputs-valid-compte" name="email" type="email" value="{{ auth()->user()->email}}">
                                                        <div id="email-error" class="text-danger inputs-error-compte">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Current Password <span class="required">*</span></label>
                                                        <input required="" class="form-control inputs-valid-compte " name="password_old" type="password">
                                                        <div id="password_old-error" class="text-danger inputs-error-compte">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>New Password <span class="required">*</span></label>
                                                        <input required="" class="form-control inputs-valid-compte " name="password_new" type="password">
                                                        <div id="password_new-error" class="text-danger inputs-error-compte">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input required="" class="form-control inputs-valid-compte" name="password_confirm" type="password">
                                                        <div id="password_confirm-error" class="text-danger inputs-error-compte">
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
