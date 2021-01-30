<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Categories</h1>
        @if(session('category-created-message'))
          <div class="alert alert-success">{{session('category-created-message')}}</div>
        @elseif(session('category-destroy-message'))
            <div class="alert alert-danger">{{session('category-destroy-message')}}</div>
        @endif

        <div class="row">
            <div class="col-sm-3">
                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">

                    <div>
                    @error('name')
                            <span><strong>{{$message}}</strong></span>
                    @enderror
                    </div>
                </div>
                <button class="btn btn-primary btn-block"type="submit">Create</button>
                </form>
            </div>
            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">CATEGORY TABLES</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td><a href="{{route('categories.show', $category->id)}}" role="button">{{$category->name}}</a></td>
                                    <td>{{$category->slug}}</td>
                                    <td>{{$category->created_at->diffForHumans()}}</td>
                                    <td>{{$category->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <form method="POST" action="{{route('categories.destroy', $category->id)}}" enctype="multipart/form-data">
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
                    </div>
                </div>
            </div>
        </div>


        @endsection
</x-admin-master>