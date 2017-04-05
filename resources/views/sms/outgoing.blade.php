@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Outgoing Messages</div>

        <div class="panel-body">
          <table class="table table-bordered" id="outgoing">
            <thead>
              <tr>
                <th>To</th>
                <th>Text</th>
                <th>Status</th>
                <th>Date</th>
              </tr>
            </thead>
          </table>
			  </div>

    </div>


    <script>
    $(document).ready(function() {
      $.noConflict();
      $('#outgoing').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! url('outgoingsmsdata') !!}',
          columns: [
            { data: 'to', name: 'to' },
            { data: 'text', name: 'text' },
            { data: 'status', name: 'status' },
            { data: 'date', name: 'date'}

          ]
        });
      });
    </script>

@endsection
