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
      <h4 class="card-title">Edit Activity</h4>
      @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach

      <form action="{{ route('update.activity', ['id' => $activity->id]) }}" method="POST" enctype="multipart/form-data" class="forms-sample" >
        @csrf
        <div class="form-group">
          <label for="exampleInputName1">Year</label>
          <input type="text" class="form-control" name="year" value="{{ $activity->year }}" id="exampleInputName1" required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Month</label>
          <input type="text" class="form-control" name="month" value="{{ $activity->month }}" id="exampleInputName1" required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Activity</label>
          <textarea name="body" id="editor1" rows="10" cols="80">
            {{ $activity->body }}
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