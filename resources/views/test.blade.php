@extends('layouts.app')

@section('content')
    <div class="container container-acc">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Test</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('addMessage', ['id'=>5]) }}">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <input id="message" name="message" type="text" class="form-control">
                            </div>
                            {{--<div class="col-md-6">
                                <textarea id="treatment" name="treatment" type="text" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea id="symptoms" name="symptoms" type="text" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <input id="picture" name="picture" type="file" accept="image/*" class="form-control">
                            </div>--}}

                            <button type="submit">send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
