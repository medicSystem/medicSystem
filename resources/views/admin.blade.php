@extends('layouts.app')

@section('content')
    <div class="user-panel">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div id="root"></div>
    </div>
@endsection
