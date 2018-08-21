{{--@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Test</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('addCoupon') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <input id="date" name="date" type="datetime-local" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <select id="doctors_id" name="doctors_id" class="form-control">
                                    @foreach($doctor_id as $doctors_id)
                                        <option value="{{ $doctors_id }}">{{ $doctors_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            --}}{{--<div class="col-md-6">
                                <textarea id="treatment" name="treatment" type="text" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea id="symptoms" name="symptoms" type="text" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <input id="picture" name="picture" type="file" accept="image/*" class="form-control">
                            </div>--}}{{--

                            <button type="submit">send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection--}}
