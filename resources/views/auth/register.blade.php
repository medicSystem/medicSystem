@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                           value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name"
                                           value="{{ old('last_name') }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="col-md-4 control-label">User Type</label>

                                <div class="col-md-6">
                                    <select id="type" name="type" class="form-control" required>
                                        @if(old('type') == 'doctor')
                                            <option value="patient" class="form-control">Patient</option>
                                            <option value="doctor" class="form-control" selected>Doctor</option>
                                        @else
                                            <option value="patient" class="form-control" selected>Patient</option>
                                            <option value="doctor" class="form-control">Doctor</option>
                                        @endif
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                <label for="birthday" class="col-md-4 control-label">Birthday</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="date" class="form-control" name="birthday"
                                           value="{{ old('birthday') }}" required>

                                    @if ($errors->has('birthday'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                                <div class="col-md-6">
                                    <div class="form-group" id="country_type_div">
                                        <select id="country_type" name="country_type" class="form-control" required>
                                            <option value="belarus" class="form-control" selected>Belarus</option>
                                            <option value="russia" class="form-control">Russia</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="phone_number_div">
                                        <input id="phone_number" type="tel" class="form-control" name="phone_number"
                                               value="{{ old('phone_number') }}"
                                               pattern="^(\+375|80)(29|25|44|33)(\d{3})(\d{2})(\d{2})$" maxlength="14"
                                               minlength="11" required disabled>
                                    </div>
                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                <label for="avatar" class="col-md-4 control-label">Profile Photo</label>

                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="form-control" name="avatar"
                                           value="{{ old('avatar') }}" accept="image/*" required>

                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('agree') ? ' has-error' : '' }}">
                                <div class="col-md-10" id="conditions_div">
                                    <input type="checkbox" class="form-control" name="agree" id="agree" value="agree"
                                           required disabled>
                                    <span id="conditions" class="control-label">I agree with <a href="#"
                                                                                                name="go" id="go">conditions</a></span>

                                    @if ($errors->has('agree'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('agree') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div id="modal_form" class="form-group">
                                <div id="modal_name">Conditions</div>
                                <div id="modal_close">&#215;</div>
                                <div id="modal_content"></div>
                            </div>
                            <div id="overlay"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
