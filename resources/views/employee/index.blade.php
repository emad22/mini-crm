@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}"> Add New Employee</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="danger">
                <th>No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Company Name</th>
                <!-- <th>Company Logo</th> -->
                <th >Action</th>
            </tr>
        </thead>
        @foreach ($employees as $key => $employee)
        <tbody>
            <tr class="Info">
                <td>{{ ++$i }}</td>
                <td>{{ $employee->fname }}  {{ $employee->lname }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->company->name }}</td>
                
                <td>
                    <a class="btn btn-info" href="{{ route('employee.show',$employee->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['employee.destroy', $employee->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    {!! $employees->links() !!}
@endsection