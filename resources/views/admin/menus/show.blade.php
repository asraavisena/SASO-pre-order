<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Show a menu</h1>
        
        <div class="row">
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
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$menu->id}}</td>
                            <td>{{$menu->name}}</td>
                            <td><img width="100px" src="{{$menu->menu_image}}" alt=""></td>
                            <td>{{$menu->quantity}}</td>
                            <td>{{$menu->price}}</td>
                            <td>{{$menu->category ? $menu->category->name : 'Uncategorized'}}</td>
                            <td>{{$menu->desc}}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="mb-2 float-left">
                    <a class="btn btn-primary" href="{{ route('menus.edit', $menu->id) }}" role="button">Edit</a>
                    <a class="btn btn-light btn-close" href="{{ route('menus.index') }}" role="button">Cancel</a></button>
                </div>
                <div class="mb-2 float-right">
                <form method="POST" action="{{route('menus.destroy', $menu->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>

    @endsection
</x-admin-master>