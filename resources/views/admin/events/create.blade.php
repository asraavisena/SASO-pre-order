<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Create an event</h1>
        <!-- @if(session('event-create-fail-message'))
        <div class="alert alert-danger">{{session('event-create-fail-message')}}</div>
        @endif -->
    <form method="POST" action="{{route('events.store')}}" enctype="multipart/form-data">
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
            <label for="started_at">Start date:</label>
            <input type="date" name="started_at" class="form-control-date @error('started_at') is-invalid @enderror"  id="started_at">
            @error('started_at')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form group">
            <label for="desc">Description</label>
            <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="body" cols="30" rows="10"></textarea>
            @error('desc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" name="upcoming_event" type="checkbox" value="1" id="flexCheckDefault">
            <label class="form-check-label" for="upcoming_event">
                Upcoming Event
            </label>
        </div>
        <input class="btn btn-primary mb-5 mt-2" type="submit" name="submit">
    </form>
    @endsection
</x-admin-master>