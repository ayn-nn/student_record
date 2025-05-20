@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Student Information Management') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 m-auto">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Add new student</h3>
                                </div>

                                @if (session('status'))
                                <div class="alert alert-success">{{session('status')}}</div>
                                @endif

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form action="{{ route('students.index') }}" method="POST">
                                    @csrf
                                    <div class="row card-body col-24">
                                        <div class="form-group col-6">
                                            <label
                                                for="FirstName">First Name
                                            </label>
                                            <input type="text" class="form-control g-2" id="FirstName" name="FirstName" placeholder="Enter your Firstname" require>
                                            @error('FirstName') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="LastName">Last Name</label>
                                            <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Enter your Last Name">
                                            @error('LastName') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="MiddleName">Middle Name</label>
                                            <input type="text" class="form-control" id="MiddleName" name="MiddleName" placeholder="Enter your Middle Name">
                                            @error('MiddleName') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="Age">Age</label>
                                            <input type="integer" class="form-control" id="Age" name="Age" placeholder="Enter your Age">
                                            @error('Age') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="Address">Address</label>
                                            <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter Address">
                                            @error('Address') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group d-grid mx-auto">
                                            <button type="submit" class="btn btn-success">SUBMIT</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table id="example2" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>
                                            <th>Age</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($studentss as $items)
                                        <tr>
                                            <td>{{$items->StudID}}</td>
                                            <td>{{$items->FirstName}}</td>
                                            <td>{{$items->MiddleName}}</td>
                                            <td>{{$items->LastName}}</td>
                                            <td>{{$items->Address}}</td>
                                            <td>{{$items->Age}}</td>
                                            <td>
                                                <span class="badge bg-warning p-1 px-3"><a href="{{ route('students.edit', $items->StudID) }}">
                                                        <b><h5>EDIT</h5></b>
                                                    </a></span>

                                                <span class="badge bg-danger p-1"><a href="{{ route('students.delete', $items->StudID) }}">
                                                        <b></b><h5>DELETE</h5></b>
                                                    </a></span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
        @endsection