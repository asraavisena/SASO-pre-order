<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Edit an event</h1>
        <!-- @if(session('event-create-fail-message'))
        <div class="alert alert-danger">{{session('event-create-fail-message')}}</div>
        @endif -->
    <form method="POST" action="{{route('events.update', $event->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" value="{{$event->name}}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="started_at">Start date:</label>
            <input type="date" name="started_at" class="form-control-date @error('started_at') is-invalid @enderror"  id="started_at" value="{{$event->started_at}}">
            @error('started_at')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form group">
            <label for="desc">Description</label>
            <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="body" cols="30" rows="10">{{$event->desc}}</textarea>
            @error('desc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mt-2">
            <div class="mb-2 float-left">
                <input class="btn btn-primary" type="submit" name="submit">
                <button class="btn btn-light btn-close"><a  href="{{ route('events.show', $event->id) }}">Cancel</a></button>
            </div>
            
        </div>
        
    </form>
    @endsection
</x-admin-master>