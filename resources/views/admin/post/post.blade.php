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
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Activities</h4>
                  @if(Session::has('success'))
                  <div class="alert  alert-success alert-dismissible fade show">
                      <span class="badge badge-pill badge-success">Success</span>
                      {{ Session::get('success') }}
                  </div>
                  @endif
                  <div class="table-responsive">
                    
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Year
                          </th>
                          <th>
                            Month
                          </th>
                          <th>
                            Activity
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                         $count = 1;
                        @endphp
                        @foreach($activity as $row)
                        <tr>
                          <td>
                            {{ $count++ }}
                          </td>
                          <td>
                            {{ $row->year }}
                          </td>
                          <td>
                            {{ $row->month }}
                          </td>
                          <td>
                            {!! $row->body !!}
                          </td>
                          <td>
                            <a href="{{ route('edit.activity', ['id' => $row->id]) }}"> Edit </a>
                          </td>
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                    
                  </div>
                  
                </div>
              </div>
            </div>
</div>

@endsection