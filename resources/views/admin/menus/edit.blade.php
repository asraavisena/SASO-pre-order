<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Edit a Menu</h1>
        <!-- @if(session('menu-create-fail-message'))
        <div class="alert alert-danger">{{session('menu-create-fail-message')}}</div>
        @endif -->
    <form method="POST" action="{{route('menus.update', $menu->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="event_id">Event for: </label>
            <select id="event_id" name="event_id" class="form-control @error('event_id') is-invalid @enderror">
                @foreach($events as $event)
                    <option name="event_id" value="{{$event->id}}" style="{{ $event->started_at < date('Y-m-d') ? 'display:none;' : '' }}"
                    {{ old('event_id', $menu->event_id) == $event->id ? 'selected' : '' }}>{{$event->name}} {{$menu->event_id}}</option>
                @endforeach 
            </select>
            @error('event_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" value="{{$menu->name}}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="quantity">Quantity: </label>
            <input type="number" name="quantity" class="form-control-date @error('quantity') is-invalid @enderror"  id="quantity" value="{{$menu->quantity}}">
            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price in Euro</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Price" value="{{$menu->price}}">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Select category: </label>
            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                @foreach($categories as $category)
                    <option name="category_id" value="{{$category->id}}"
                    {{ old('category_id', $menu->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach 
            </select>
            @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form group">
            <label for="desc">Description</label>
            <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="body" cols="30" rows="10">{{$menu->desc}}</textarea>
            @error('desc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input class="btn btn-primary mb-5 mt-2" type="submit" name="submit">
    </form>
    @endsection
</x-admin-master>