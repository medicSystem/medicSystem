@extends('layouts.app')

@section('content')
    <div class="user-panel">
        <div class="medical-card">
            <form action="{{ route('addMedicalCard') }}" method="GET" class="form-horizontal medical-card-form">
                <div class="form-group medical-card-title">
                    <label for="medical_card" class="control-label col-md-10">Medical
                        card {{ Auth::user()->first_name }} {{ Auth::user()->last_name  }}</label>
                </div>
                <div class="form-group">
                    <label for="postal_address" class="control-label col-md-4">Postal address:</label>
                    <div class="col-md-6">
                        <input type="text" id="postal_address" name="postal_address" class="form-control" required
                               autofocus max="60"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sex" class="control-label col-md-4">Sex:</label>
                    <div class="col-md-6">
                        <select id="sex" name="sex" class="form-control" required>
                            <option value="M" class="form-control" selected>Male</option>
                            <option value="F" class="form-control">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="chronic_disease" class="control-label col-md-4">Chronic disease:</label>
                    <div class="col-md-6">
                        <textarea type="text" id="chronic_disease" name="chronic_disease" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="allergy" class="control-label col-md-4">Allergy:</label>
                    <div class="col-md-6">
                        <textarea type="text" id="allergy" name="allergy" class="form-control" required></textarea>
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