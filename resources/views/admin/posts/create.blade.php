@extends('layouts.admin')

@section('content')

<div class="container">

    <form method="POST" action="{{ route('admin.posts.store')}}" enctype="multipart/form-data" id="users_form">
        {{ csrf_field() }}

        <h3 class="text-primary">Create New Posts</h3>

        <div class="form-group col-md-4">
            <label>Post Title</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="post_title" value="" class="form-control" placeholder="Enter Title" required />
        </div>
        <div class="form-group col-md-4">
            <label>Post Description</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="post_desc" value="" class="form-control" placeholder="Enter Post Description" required/>
        </div>


        <input type="submit" class="btn btn-primary" value="Create New Post">

    </form>
</div>

@endsection
