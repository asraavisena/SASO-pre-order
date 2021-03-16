<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Show an event</h1>
        
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
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
                <div class="mb-2 float-left">
                    <a class="btn btn-primary" href="{{ route('events.edit', $event->id) }}" role="button">Edit</a>
                    <a class="btn btn-light btn-close" href="{{ route('events.index') }}" role="button">Cancel</a></button>
                    <a class="btn btn-info" href="{{ route('images.index') }}" role="button">Upload Image</a>
                </div>
                <div class="mb-2 float-right">
                    <form method="POST" action="{{route('events.destroy', $event->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Path</th>
                            <th>Type</th>
                            <th>Label</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($event->images as $image)
                            <tr>
                                <td>{{$image->id}}</td>
                                <td>{{$image->path}}</td>
                                <td>{{$image->imageable_type}}</td>
                                <td>{{$image->label}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
</x-admin-master>