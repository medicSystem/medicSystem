@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Test</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="GET" action="{{ route('testController') }}">
                            <div class="col-md-6">
                                <input id="picture" name="picture" type="file" accept="image/*">
                                <button type="submit">send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
