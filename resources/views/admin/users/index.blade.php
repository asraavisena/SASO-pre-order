<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Users</h1>
        @if(session('user-created-message'))
          <div class="alert alert-success">{{session('user-created-message')}}</div>
          @elseif(session('user-destroy-message'))
            <div class="alert alert-danger">{{session('user-destroy-message')}}</div>

        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-left d-inline">
                    <h4 class=" h4 m-0 font-weight-bold text-primary">USER TABLES</h4>
                </div>
                <div class="m-0 float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}" role="button">Add a Role</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="{{route('users.show', $user->id)}}">{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        @endsection
</x-admin-master>