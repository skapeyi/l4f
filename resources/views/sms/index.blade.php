@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Messages</div>

        <div class="panel-body">
          <div class="example">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#incoming" data-toggle="tab">Incoming</a></li>
              <li><a href="#outgoing" data-toggle="tab">Outgoing</a></li>
            </ul>
          </div>

          <div class="tab-content">
    			  <div class="tab-pane active" id="incoming">
              <h3>Same as example 1 but we have now styled the tab's corner</h3>
    				</div>

    				<div class="tab-pane" id="outgoing">
              <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
    				</div>
			    </div>
        </div>
    </div>

@endsection
