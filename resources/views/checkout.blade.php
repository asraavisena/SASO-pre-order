<!-- TEMPORARY WILL BE DELETED -->
@extends('layouts.app')

@section('content')
<h1 class="mb-4 text-gray-800">Checkout</h1>
    <div class="container">
        <form action="" method="POST" id="payment-form"  enctype="multipart/form-data">
            @csrf
            <h2 class="h3 mb-4 text-gray-800">Billing Details</h2>

            <div class="col">
                <div class="form-group">
                    <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="" required>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="" required>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="" required>
                </div>

                <div class="form-group">
                    <label for="province">Province</label>
                    <input type="text" class="form-control" id="province" name="province" value="" required>
                </div>

                <div class="form-group">
                    <label for="postalcode">Postal Code</label>
                    <input type="text" class="form-control" id="postalcode" name="postalcode" value="" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="" required>
                </div>
                <div class="col">
                a
                </div>
            </div>

            <input class="btn btn-primary mb-5 mt-2" type="submit" name="submit">
        </form>
        
        <div class="col">
            @foreach (Cart::content() as $item)
                <div class="row">
                    <p>   {{ $item->name }} &nbsp;</p>
                    <p> {{ $item->price }} &nbsp;</p>
                    <p>  {{ $item->qty }} &nbsp;</p>
                    <p>   {{ $item->subtotal }} </p>
                <br>
                </div>
            @endforeach
            <span>{{ Cart::total() }}</span>

        </div> <!-- end checkout-table -->
    </div>

@endsection
