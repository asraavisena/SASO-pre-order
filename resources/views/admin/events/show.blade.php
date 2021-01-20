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
                        <th>Image</th>
                        <th>Start</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$event->id}}</td>
                            <td>{{$event->name}}</td>
                            <td><img width="100px" src="{{$event->event_image}}" alt=""></td>
                            <td>{{$event->started_at}}</td>
                            <td>{{$event->desc}}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="mb-2 float-left">
                    <a class="btn btn-primary" href="{{ route('events.edit', $event->id) }}" role="button">Edit</a>
                    <a class="btn btn-light btn-close" href="{{ route('events.index') }}" role="button">Cancel</a></button>
                </div>
                <div class="mb-2 float-right">
                <form method="POST" action="{{route('events.destroy', $event->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>

    @endsection
</x-admin-master>