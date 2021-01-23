<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Events</h1>
        @if(session('event-created-message'))
            <div class="alert alert-success">{{session('event-created-message')}}</div>
        @elseif(session('event-updated-message'))
            <div class="alert alert-success">{{session('event-updated-message')}}</div>
        @elseif(session('event-destroy-message'))
            <div class="alert alert-danger">{{session('event-destroy-message')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">EVENT TABLES</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Start</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Start</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{$event->id}}</td>
                            <td><a href="{{route('events.show', $event->id)}}">{{$event->name}}</td>
                            <td><img width="100px" src="{{$event->event_image}}" alt=""></td>
                            <td>{{$event->started_at}}</td>
                            <td>{{$event->created_at->diffForHumans()}}</td>
                            <td>{{$event->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>


        @endsection
</x-admin-master>