<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Orders</h1>
        @if(session('order-created-message'))
          <div class="alert alert-success">{{session('order-created-message')}}</div>
        @elseif(session('order-updated-message'))
            <div class="alert alert-success">{{session('order-updated-message')}}</div>
        @elseif(session('order-destroy-message'))
            <div class="alert alert-danger">{{session('order-destroy-message')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-left d-inline">
                    <h4 class=" h4 m-0 font-weight-bold text-primary">ORDER TABLES</h4>
                </div>
                <div class="m-0 float-right">
                    <a class="btn btn-primary btn-sm" href="" role="button">Add Location to Pick up</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>order_id</th>
                        <th>billing_email</th>
                        <th>billing_name</th>
                        <th>billing_address</th>
                        <th>billing_city</th>
                        <th>billing_province</th>
                        <th>billing_postalcode</th>
                        <th>billing_phone</th>
                        <th>billing_subtotal</th>
                        <th>billing_total</th>
                        <th>ordered_menu</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>order_id</th>
                        <th>billing_email</th>
                        <th>billing_name</th>
                        <th>billing_address</th>
                        <th>billing_city</th>
                        <th>billing_province</th>
                        <th>billing_postalcode</th>
                        <th>billing_phone</th>
                        <th>billing_subtotal</th>
                        <th>billing_total</th>
                        <th>ordered_menu</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->billing_email}}</td>
                            <td>{{$order->billing_name}}</td>
                            <td>{{$order->billing_address}}</td>
                            <td>{{$order->billing_city}}</td>
                            <td>{{$order->billing_province}}</td>
                            <td>{{$order->billing_postalcode}}</td>
                            <td>{{$order->billing_phone}}</td>
                            <td>{{$order->billing_subtotal}}</td>
                            <td>{{$order->billing_total}}</td>
                            
                            <td>
                            @foreach($order->menus as $menu)
                                
                                <div>&#9679 {{ $menu->pivot->quantity }} {{ $menu->name }}</div>
                               
                            @endforeach
                            </td>
                            
                            <td>{{$order->created_at->diffForHumans()}}</td>
                            <td>{{$order->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        @endsection
</x-admin-master>