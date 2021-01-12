<x-admin-master>
    @section('content')
        <h1>Create an category</h1>
        <!-- @if(session('category-create-fail-message'))
        <div class="alert alert-danger">{{session('category-create-fail-message')}}</div>
        @endif -->
    <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
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
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Enter slug">
            @error('slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input class="btn btn-primary mb-5 mt-2" type="submit" name="submit">
    </form>
    @endsection
</x-admin-master>