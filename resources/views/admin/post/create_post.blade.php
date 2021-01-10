@extends ('admin.layouts.master')
@section('content')

<div class="content-wrapper">
<br>
<div class="row">
    <div class="col-lg-12 grid-margin">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h4 class="font-weight-bold mb-0">Admin Dashboard</h4>
        </div>
      </div>
    </div>
</div>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add post</h4>
      <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

      <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data" class="forms-sample" >
        @csrf
        <div class="form-group">
          <label for="exampleInputName1">Title</label>
          <input type="text" class="form-control" name="title" id="exampleInputName1" placeholder="Title" required>
          <div class="form-group">
            <label for="exampleInputName1">Preview</label>
            <input type="text" class="form-control" name="preview" id="exampleInputName1" placeholder="Preview" required>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Username</label>
            <input type="text" class="form-control" name="author" id="exampleInputName1" placeholder="Username" required>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Read_More</label>
          <textarea name="read_more" id="editor1" rows="10" cols="80">
            {{ old('body') }}
        </textarea>
        <script>
            CKEDITOR.replace( 'editor1' );
        </script>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Submit</button>
      </form>
    </div>
  </div>
</div>

@endsection