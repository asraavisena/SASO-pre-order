<!-- TEMPORARY WILL BE DELETED -->
@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Beli</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="float-left d-inline">
            <h4 class=" h4 m-0 font-weight-bold text-primary">MENU TABLES</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price in Euro (€)</th>
                <th>Description</th>
                <th>Action</th>
                <th>Event</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price in Euro(€)</th>
                <th>Description</th>
                <th>Action</th>
                <th>Event</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($menus as $menu)
            @if($menu->event->upcoming_event === 1)
                <tr>
                <form method="POST" action="{{route('cart.store')}}" enctype="multipart/form-data">
                    @csrf
                    <td> <input type="hidden" name="id" value="{{$menu->id}}"> {{$menu->id}}</td>
                    <td> <input type="hidden" name="name" value="{{$menu->name}}"> {{$menu->name}}</td>
                    <td> <input type="hidden" name="quantity" value="{{$menu->quantity}}"> {{$menu->quantity}}</td>
                    <td> <input type="hidden" name="price" value="{{$menu->price}}"> {{$menu->price}}</td>
                    <td> <input type="hidden" name="desc" value="{{$menu->desc}}"> {{$menu->desc}}</td>
                    <td><a href="{{route('events.show', $menu->event_id)}}" role="button">
                                {{$menu->event ? $menu->event->name : 'Uncategorized'}}</td>
                    <td>
                        <button type="submit" name="submit" class="btn btn-primary">Add to Cart</button>
                    </td>
                </form>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

@endsection
