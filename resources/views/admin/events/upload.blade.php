<x-admin-master>
                <h3>Upload Image</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    
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
</x-admin-master>