@extends('layouts.app')

@section('content')
    <div class="user-panel">
        <div class="medical-card">
            <form action="{{ route('addValidate') }}" method="GET" class="form-horizontal medical-card-form">
                <div class="form-group medical-card-title">
                    <label for="Doctor_card" class="control-label col-md-10">Doctor
                        card {{ Auth::user()->first_name }} {{ Auth::user()->last_name  }}</label>
                </div>
                <div class="form-group">
                    <label for="patent" class="control-label col-md-4">Patent:</label>
                    <div class="col-md-6">
                        <input type="file" id="patent" name="patent" class="form-control" required
                               autofocus onchange="preview(this.value)"/>
                    </div>
                </div>
                <div class="preview">
                    <img id="previewImg"/>
                </div>
                <div class="form-group">
                    <label for="doctor_types" class="control-label col-md-4">Doctor type:</label>
                    <div class="col-md-6">
                        <select id="doctor_types" name="doctor_types" class="form-control" required>
                            @foreach($types as $type)
                                <option value="{{ $type }}" class="form-control">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="experience" class="control-label col-md-4">Experience:</label>
                    <div class="col-md-6">
                        <input type="number" id="experience" name="experience" class="form-control" required max="50" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <label for="start_time" class="control-label col-md-4">Start work:</label>
                    <div class="col-md-6">
                        <input type="time" id="start_time" name="start_time" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="end_time" class="control-label col-md-4">End work:</label>
                    <div class="col-md-6">
                        <input type="time" id="end_time" name="end_time" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary medical-card-button">
                            Send
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection