@extends('layouts.admin')

@section('content')

<div class="container">

    <form method="POST" action="{{ route('admin.users.update',['user'=>$user->id])}}" enctype="multipart/form-data" id="users_form">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <h2 class="text-primary"> Edit User : : {{$user->name}} </h2>

        <div class="form-row">
            <div class="form-group col-md-4"">
                <img src="{{ asset('storage/userimages/'.$user->user_imgs) }}" width="150" height="150">
                <br />
                <label for="title"><b>Update Users Image </b></label>
            <input type="file" class="form-control-file" name="user_imgs" id="imgs">
            </div>

            <div class="form-group col-md-5">
                <label>User ID</label>&nbsp;&nbsp;&nbsp;
                <input type="text" name="user_id" value="{{ $user->id }}" class="form-control col-md-2" readonly="true"/>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4"">
                <label>Username</label>&nbsp;&nbsp;&nbsp;
                <input type="text" name="name" value="{{ $user->name }}" class="form-control"/>
            </div>

            <div class="form-group col-md-4">
                <label>Email ID</label>&nbsp;&nbsp;&nbsp;
                <input type="text" name="email" value="{{ $user->email }}" class="form-control" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Select Status</label>&nbsp;&nbsp;&nbsp;
                <select class="form-control" name="is_active">
                    <option value="1" {{ (($user->is_active == 1) ?  'selected="selected"' : '') }} >Active</option>
                    <option value="0" {{ (($user->is_active == 0) ?  'selected="selected"' : '') }} >Inactive</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Choose Roles</label>&nbsp;&nbsp;&nbsp;
                @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ ($user->hasanyRole($role->name)) ? 'checked':'' }} />
                    <label> {{ $role->name}} </label>
                </div>
                @endforeach
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <input type="submit" class="btn btn-success" value="Update Data">
            </div>

            <div class="form-group">
            <a href="{{ route('admin.users.index') }}" />
                <button type="button" class="btn btn-primary">Back</button>
            </a>
            </div>
        </div>


    </form>

</div>


@endsection
