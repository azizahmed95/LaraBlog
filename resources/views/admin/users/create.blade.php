@extends('layouts.admin')

@section('content')

<div class="container">


<form method="POST" action="{{ route('admin.users.store')}}" enctype="multipart/form-data" id="users_form">
    {{ csrf_field() }}

    <h1 class="text-primary"> Create Users</h1>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Username</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="username" value="" class="form-control" placeholder="Enter Name" required />
        </div>
        <div class="form-group col-md-4">
            <label>Email ID</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="emailid" value="" class="form-control" placeholder="Enter Email ID" required/>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Password</label>&nbsp;&nbsp;&nbsp;
            <input type="password" name="password" value="" class="form-control" placeholder="Enter Password" required/>
        </div>

        <div class="form-group col-md-4">
            <label>Select Role</label>&nbsp;&nbsp;&nbsp;
            <select class="form-control" name="roles">
                <option value="select">-- Select User Role --</option>

                @foreach ($roles as $role)
                    <option value="{{ $role->id}}"> {{ $role->name }}</option>
                @endforeach

            </select>
        </div>

    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Select DOB</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="dob" id="dobdate_picker" class="form-control" placeholder="Select Date of birth"/>
        </div>

        <div class="form-group col-md-4">
            <label for="title"><b>Select Users Image </b></label>
            <input type="file" class="form-control-file" name="imgs" id="imgs">
        </div>

    </div>

    <div class="form-group">
        <label>Select Status</label>&nbsp;&nbsp;&nbsp;
        <select class="form-control col-md-3" name="status">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    <input type="submit" class="btn btn-primary" value="Create User">

</form>

</div>

@endsection
