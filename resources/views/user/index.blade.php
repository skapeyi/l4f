@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Users</div>

        <div class="panel-body">
          <table class="table table-bordered" id="users-table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Create At</th>
              </tr>
            </thead>
          </table>
        </div>
    </div>
    <script>

    $(document).ready(function() {
      $.noConflict();
      $('#users-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! url('usersdata') !!}',
          columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'created_at', name: 'created_at' },
          ]
        });
      });

    </script>
@endsection
