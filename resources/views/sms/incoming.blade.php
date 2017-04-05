@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Incoming Messages</div>

        <div class="panel-body">
          <table class="table table-bordered" id="incoming">
            <thead>
              <tr>
                <th>From</th>
                <th>Text</th>
                <th>Action</th>
                <th>Date</th>
              </tr>
            </thead>
          </table>
			  </div>

    </div>


    <script>
    $(document).ready(function() {
      $.noConflict();
      $('#incoming').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! url('incomingsmsdata') !!}',
          columns: [
            { data: 'from', name: 'from' },
            { data: 'text', name: 'text' },
            { data: 'status', name: 'status' },
            { data: 'date', name: 'date'}

          ]
        });
      });
    </script>

@endsection
