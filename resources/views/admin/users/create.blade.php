<x-admin-master>
    @section('content')
    <h1 class="h3 mb-4 text-gray-800">Create an user</h1>

    <div class="row">
        <div class="col-sm-6">
            <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email">
                    @error('email')
                    <strong class="invalid-feedback">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="password-confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password-confirmation">
                </div>
                
                <input class="btn btn-primary mb-5 mt-2" type="submit" name="submit">     

            </form>
        </div>
    </div>
    
    @endsection
</x-admin-master>