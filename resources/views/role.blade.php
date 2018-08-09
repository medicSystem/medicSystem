@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="access-title">Access is denied</span></div>

                    <div class="error-role">
                        <span class="access-role">To access this page you need {{ $role }} rights.</span> <span class="user-role">You is {{ $yourRole }}.</span><span class="return-profile">Go to your <a href="{{ route($yourRole) }}">profile</a>.</span>
                    </div>
                </div>
        </div>
    </div>
@endsection