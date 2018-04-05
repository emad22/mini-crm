@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Employee </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'employee.store','method'=>'POST','files'=>TRUE)) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                {!! Form::text('fname', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Last Name:</strong>
                {!! Form::text('lname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Phone Number</strong>
                {!! Form::text('phone', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::Label('companyName', 'Company Name:') !!}
                <select class="form-control" name="company_id">
                    @foreach($companies as $company)
                        <option value="{{$company->Company_id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection