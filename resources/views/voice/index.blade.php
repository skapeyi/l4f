@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
          Incoming Calls
          <button class="btn btn-primary pull-right" id="addResponse" data-toggle="modal" data-target="#myModal" title="New Log">
              <i class="glyphicon glyphicon-plus pull-right"></i>
          </button>

        </div>

        <div class="panel-body">
          <table class="table table-bordered" id="voices">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Caetgory</th>
                <th>Age</th>
                <th>Reason</th>
                <th>Response</th>
                <th>Created on</th>
              </tr>
            </thead>
          </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add new response</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action' => 'VoiceController@store']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Caller Name') !!}
                        {!! Form::text('name', '',['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone', 'Phone') !!}
                        {!! Form::text('phone', '',['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('subject', 'Common leagal issues') !!}
                        <select class="form-control" id="category" name="subject">
                            <option value="business">Business </option>
                            <option value="crime">Crime </option>
                            <option value="family">Family </option>
                            <option value="land">Land</option>
                            <option value="others">Others </option>
                        </select
                    </div>
                    <div class="form-group">
                        {!! Form::label('gender', 'Gender') !!}
                        <select class="form-control" id="category" name="gender">
                            <option value="female">Female </option>
                            <option value="male">Male </option>
                        </select
                    </div>
                    <div class="form-group">
                        {!! Form::label('age_bracket', 'Age') !!}
                        <select class="form-control" id="category" name="age_bracket">
                            <option value="12-18">12-18yrs </option>
                            <option value="19-24">19-24yrs </option>
                            <option value="25-40">25-40yrs </option>
                            <option value="41-54">51-54yrs </option>
                            <option value="above 55">Above 55 </option>
                        </select
                    </div>
                    <div class="form-group">
                        {!! Form::label('reason', 'Reason for Calling') !!}
                        {!! Form::textarea('message', '',['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('response', 'Your Response') !!}
                        {!! Form::textarea('response', '',['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('status', 'Status') !!}
                        <select class="form-control" id="status" name="category">
                            <option value="Closed">Closed </option>
                            <option value="Follow-up">Follow Up </option>
                            <option value="Open">Open </option>
                            <option value="Pending">Pending </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <script>
    $(document).ready(function() {
      $.noConflict();
      $('#voices').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! url('callsdata') !!}',
          columns: [
            { data: 'name', name: 'name' },
            { data: 'phone', name: 'phone' },
            { data: 'subject', name: 'subject' },
            { data: 'age_bracket', name: 'age_bracket' },
            { data: 'reason', name: 'reason' },
            { data: 'response', name: 'response' },
            { data: 'created_at', name: 'created_at' },
          ]
        });
      });
    </script>
@endsection
