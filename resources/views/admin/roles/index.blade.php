@extends('layouts.admin')

@section('content')

<div class="container">

    <h3 class="text-primary">View all Roles</h3>

    @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
          <tr>
            <th>Role ID</th>
            <th>Roles</th>
            <th>User Id</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)

                <tr>
                    <td> {{ $role->id }}</td>
                    <td> {{ $role->name }}</td>
                    <td>  {{ implode(',',$role->users()->get()->pluck('id')->toArray()) }} </td>
                    <td> {{ date('jS M Y',strtotime($role->created_at)) }}</td>
                    <td> {{ date('jS M Y',strtotime($role->updated_at)) }}</td>
                    <td>
                        <a href="{{ route('admin.roles.edit',$role->id) }}" class="float-left">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a><br><br/>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection
