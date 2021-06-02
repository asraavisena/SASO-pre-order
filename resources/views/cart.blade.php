<!-- // TEMPORARY WILL BE DELETED -->
@extends('layouts.app')
@section('content')
@if(session('cart-added'))
    <div class="alert alert-success">{{session('cart-added')}}</div>
@elseif(session('cart-removed'))
    <div class="alert alert-success">{{session('cart-removed')}}</div>
@endif

@if(Cart::count() > 0)
<h2>{{ Cart::count() }}Item(s) in Cart</h2>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Regular price Price</th>
                <th>Qty</th>
                <th>Total price Price</th>
                <th>Desc</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Total Sum:</th>
                <th></th>
                <th></th>
                <th><span>{{ Cart::total() }}</span></th>
                <th></th>
                <th> 
                    <a class="btn btn-primary" href="{{ route('checkout.index') }}">Checkout</a> 
                </th>
            </tr>
        </tfoot>
        <tbody>
        @foreach(Cart::content() as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td><a class="btn btn-increase" href="#">+</a> 
                    {{ $item->qty }} 
                    <a class="btn btn-reduce" href="#">-</a>
                </td>
                <td>{{ $item->subtotal }}</td>
                <td>{{ $item->model->desc }}</td>
                <td>
                    <form method="POST" action="{{route('cart.remove', $item->rowId)}}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
</div>
@else
<h2>No item(s) in Cart</h2>
@endif

@endsection