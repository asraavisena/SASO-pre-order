<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Show an event</h1>
        @if(session('image-upload-message'))
          <div class="alert alert-success">{{session('image-upload-message')}}</div>
        @elseif(session('image-destroy-message'))
            <div class="alert alert-danger">{{session('image-destroy-message')}}</div>
        @endif
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="mb-2 float-left">
                        <a class="btn btn-primary" href="{{ route('events.edit', $event->id) }}" role="button">Edit</a>
                        <a class="btn btn-light btn-close" href="{{ route('events.index') }}" role="button">Cancel</a>
            
                    </div>
                    <div class="mb-2 float-right">
                        <form method="POST" action="{{route('events.destroy', $event->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Start</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$event->id}}</td>
                                <td>{{$event->name}}</td>
                                <td>{{$event->started_at}}</td>
                                <td>{{$event->desc}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>Upload Image</h3>
                <form class="mb-2" action="{{route('events.upload', $event->id)}}" method="POST" enctype="multipart/form-data">
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
                        @foreach($event->images as $image)
                            <tr>
                                <td>{{$image->id}}</td>
                                <td><div><img src="{{ asset('storage/images/events/' .$image->path )}}" alt="image" width="100px"></div></td>
                                <td>{{$image->imageable_type}}</td>
                                <td>{{$image->label}}</td>
                                <td>
                                    <form method="POST" action="{{route('events.imgdelete', $event->id )}}" enctype="multipart/form-data">
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

    @endsection
</x-admin-master>