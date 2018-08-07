@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-5 error-role">
                you is not {{$role}}
            </div>
        </div>
    </div>
@endsection