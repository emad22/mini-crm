@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('company.create') }}"> Create New company</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-condensed">
        <tr>
            <th>No</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Website</th>
            <th>Company Logo</th>
            <th >Action</th>
        </tr>
        @foreach ($companies as $key => $company)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td><a href="{{ $company->website }}" targeg="_blank">{{ $company->name }}</a></td>
            <td> <img src="{{ asset('images/' . $company->logo) }}" alt="{{ $company->name }}" height="100" width="100"> </td>
            <td>{{ $company->Email }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('company.show',$company->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('company.edit',$company->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['company.destroy', $company->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>
    {!! $companies->links() !!}
@endsection