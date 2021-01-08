<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Menus</h1>
        @if(session('menu-created-message'))
          <div class="alert alert-success">{{session('menu-created-message')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price in Euro (€)</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price in Euro(€)</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td>{{$menu->id}}</td>
                            <td>{{$menu->name}}</td>
                            <td><img width="100px" src="{{$menu->menu_image}}" alt=""></td>
                            <td>{{$menu->quantity}}</td>
                            <td>{{$menu->price}}</td>
                            <td>{{$menu->created_at->diffForHumans()}}</td>
                            <td>{{$menu->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        @endsection
</x-admin-master>