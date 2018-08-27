@extends('layouts.app')

@section('content')
    <div class="container container-acc">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="access-title">Access is denied</span></div>

                <div class="error-role">
                    <span class="access-role">Dear {{ $first_name }} {{ $last_name }}.</span> <span class="user-role">Your account is banned.</span><span
                            class="return-profile">For all question, please, write to <a href="#">Admin</a>.</span>
                </div>
            </div>
        </div>
    </div>
@endsection