@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="text-primary"> Manage Users</h1>

    @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('success') }}
        </div>
    @endif

    @if(Session::has('warning'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('warning') }}
          </div>
    @endif

    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
          <tr>
            <th>Users ID</th>
            <th>Users Image</th>
            <th>Name</th>
            <th>Email Id</th>
            <th>Roles</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
            {{-- {{ print_r($user->roles()->get()->pluck('name')->toArray()) }} --}}
        <tr>
            <td>{{ $user->id }}</td>
            <td> <img src="{{ asset('storage/userimages/'.$user->user_imgs) }}" width="100" height="100"></td>
            <td>{{ $user->name }}</td>
            <td> {{ $user->email }} </td>
            <td> {{ implode(",",$user->roles()->get()->pluck('name')->toArray()) }}</td>
            <td>
                @if($user->is_active) <span class='text-success'><b>Active</b></span>
                @else <span class="text-danger"><b>InActive</b></span>
                @endif
            </td>
            <td>{{ date('jS-M-Y H:i:s',strtotime($user->created_at)) }}</td>
            <td>{{ date('d-m-Y H:i:s',strtotime($user->updated_at)) }}</td>
            <td>
                <a href="{{ route('admin.users.edit',$user->id) }}" class="float-left">
                    <button type="button" class="btn btn-primary">Edit</button>
                </a><br><br/>

                <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST" class="float-left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>

    </table>
    {{ $users->links() }}

</div>

@endsection
