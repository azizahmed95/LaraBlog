@extends('layouts.admin')

@section('content')

<div class="container">

    <form method="POST" action="{{ route('admin.roles.store')}}" enctype="multipart/form-data" id="users_form">
        {{ csrf_field() }}

        <h3 class="text-primary">Create Roles</h3>

        <div class="form-group col-md-4">
            <label>Role Name</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="rolename" value="" class="form-control" placeholder="Enter Role Name" required />
        </div>

        <div class="form-group col-md-4">
            <input type="submit" name="add_role" value="Add New Role" class="btn btn-success"/>
        </div>

    </form>

</div>

@endsection
