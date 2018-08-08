@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="error-role">
                To access this page you need {{ $role }} rights. You is {{ $yourRole }}.<br> Go to your <a href="{{ route($yourRole) }}">profile</a>.
            </div>
        </div>
    </div>
@endsection