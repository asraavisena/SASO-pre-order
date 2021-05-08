<!-- // TEMPORARY WILL BE DELETED -->
@if(session('cart-added'))
    <div class="alert alert-success">{{session('cart-added')}}</div>
@elseif(session('cart-removed'))
    <div class="alert alert-success">{{session('cart-removed')}}</div>
@endif

@if(Cart::count() > 0)
<h2>{{ Cart::count() }}Item(s) in Cart</h2>
@else
<h2>No item(s) in Cart</h2>
@endif
<div>
    <table>
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
        <tbody>
        @foreach(Cart::content() as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->qty }}</td>
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
    <div>Total Sum:</div><span>{{ Cart::total() }}</span>
</div>