@extends('layouts.app')
@section('content')
    <div class="container container-acc">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="access-title">Access is denied</span></div>
                <div class="error-role">
                    <span class="access-role">Dear doctor,{{ Auth::user()->first_name }} {{ Auth::user()->last_name  }}. You validating.</span>
                </div>
            </div>
        </div>
    </div>
@endsection 