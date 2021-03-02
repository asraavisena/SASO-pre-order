<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Menus</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-left d-inline">
                    <h4 class=" h4 m-0 font-weight-bold text-primary">MENU TABLES</h4>
                </div>
                <div class="m-0 float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('categories.index') }}" role="button">Show Category</a>
                </div>
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
                        <th>Category</th>
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
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td>{{$menu->id}}</td>
                            <td><a href="{{route('menus.show', $menu->id)}}">{{$menu->name}}</td>
                            <td><img width="100px" src="{{$menu->menu_image}}" alt=""></td>
                            <td>{{$menu->quantity}}</td>
                            <td>{{$menu->price}}</td>
                            <td><a href="{{route('categories.show', $menu->category_id)}}" role="button">{{$menu->category ? $menu->category->name : 'Uncategorized'}}</a></td>
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