<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Show users</h1>
        
        <div class="row">
            <div class="card-body">
                <div class="mb-2 float-left">
                    <a class="btn btn-light btn-close" href="{{ route('menus.index') }}" role="button">Cancel</a></button>
                </div>
                <div class="mb-2 float-right ">
                    <form method="POST" action="{{route('users.destroy', $user->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="">{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




        <div class="row">
           <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Roles</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td>
                                    <form method="POST" action="{{route('user.role.attach', $user)}}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="role" value="{{$role->id}}">
                                        <button type="submit" class="btn btn-primary"
                                                @if($user->roles->contains($role))
                                                    disabled
                                                @endif>
                                            Attach
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{route('user.role.detach', $user)}}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="role" value="{{$role->id}}">
                                        <button type="submit" class="btn btn-danger"
                                                @if(!$user->roles->contains($role))
                                                    disabled
                                                @endif>
                                            Detach
                                        </button>
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