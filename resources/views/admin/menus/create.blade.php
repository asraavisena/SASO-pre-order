<x-admin-master>
    @section('content')
    <h1>Create an menu</h1>


    <form method="POST" action="{{route('menus.store')}}" enctype="multipart/form-data">
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
            <label for="menu_image">Image</label>
            <input type="file" name="menu_image" class="form-control-file @error('menu_image') is-invalid @enderror" id="menu_image">
            @error('menu_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="quantity">Quantity: </label>
            <input type="number" name="quantity" class="form-control-date @error('quantity') is-invalid @enderror"  id="quantity">
            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price in Euro</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Price">
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
                    <option name="category_id" value="{{$category->id}}">{{$category->name}}</option>
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
            <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="body" cols="30" rows="10"></textarea>
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