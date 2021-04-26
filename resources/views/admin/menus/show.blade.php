<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Show a menu</h1>
        @if(session('image-upload-message'))
          <div class="alert alert-success">{{session('image-upload-message')}}</div>
        @elseif(session('image-destroy-message'))
            <div class="alert alert-danger">{{session('image-destroy-message')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                 <div class="mb-2 float-left">
                    <a class="btn btn-light btn-close" href="{{ route('menus.index') }}" role="button">Cancel</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price in Euro (€)</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$menu->id}}</td>
                                <td>{{$menu->name}}</td>
                                <td>{{$menu->quantity}}</td>
                                <td>{{$menu->price}}</td>
                                <td>{{$menu->category ? $menu->category->name : 'Uncategorized'}}</td>
                                <td>{{$menu->desc}}</td>
                                <td>
                                    <div class="d-flex flex-row bd-highlight">
                                        <a class="btn btn-primary" href="{{ route('menus.edit', $menu->id) }}" role="button">Edit</a>                                        
                                        <form method="POST" action="{{route('menus.destroy', $menu->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <h3>Upload Image</h3>
        <form class="mb-2" action="{{route('menus.upload', $menu->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <div class="form-group">
                <label for="label">Label</label>
                <input type="text" name="label" class="form-control @error('label') is-invalid @enderror" id="label">
                @error('label')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Path</th>
                    <th>Type</th>
                    <th>Label</th>
                    <th>Delete photo</th>                            
                </tr>
                </thead>
                <tbody>
                @foreach($menu->images as $image)
                    <tr>
                        <td>{{$image->id}}</td>
                        <td><div><img src="{{ asset('storage/images/menus/' .$image->path )}}" alt="image" width="100px"></div></td>
                        <td>{{$image->imageable_type}}</td>
                        <td>{{$image->label}}</td>
                        <td>
                            <form method="POST" action="{{route('menus.imgdelete', $menu->id )}}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @endsection
</x-admin-master>