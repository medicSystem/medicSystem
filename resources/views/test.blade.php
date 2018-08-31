@extends('layouts.app')

@section('content')
    <div class="container container-acc">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Test</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('updateMedicalCard') }}">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <input id="phone_number" name="phone_number" type="tel" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input id="postal_address" name="postal_address" type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input id="chronic_disease" name="chronic_disease" type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input id="allergy" name="allergy" type="text" class="form-control">
                            </div>
{{--                            <div class="col-md-6">
                                <select id="disease_name" name="disease_name" class="form-control">
                                    @foreach($name as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>--}}
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
