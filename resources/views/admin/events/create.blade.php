<x-admin-master>
    @section('content')
        <h1>Create an event</h1>
        <!-- @if(session('event-create-fail-message'))
        <div class="alert alert-danger">{{session('event-create-fail-message')}}</div>
        @endif -->
    <form method="POST" action="{{route('events.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="event_image">Image</label>
            <input type="file" name="event_image" class="form-control-file @error('event_image') is-invalid @enderror" id="event_image">
        </div>
        <div class="form-group">
            <label for="started_at">Start date:</label>
            <input type="date" name="started_at" class="form-control-date @error('started_at') is-invalid @enderror"  id="started_at">
        </div>
        <dif class="form group">
            <label for="desc">Description</label>
            <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="body" cols="30" rows="10"></textarea>
        </dif>
        <input type="submit" name="submit">
    </form>
    @endsection
</x-admin-master>