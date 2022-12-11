@extends('layouts.master')

@section('content')
 <!-- DataTales Example -->
 <div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
      <h2>All User</h2>
      <ol class="breadcrumb">
          <li>
              <a href="{{ route('users.index') }}">User</a>
          </li>
          <li class="active">
              <strong>Index</strong>
          </li>
      </ol>
  </div>
  <div class="col-lg-2">
      <div class="ibox-tools m-t-xl">
          <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i class="fa fa-plus"></i> <strong>Create</strong></a>
      </div>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">

  @include('partials.flash_messages.flashMessages')

  <div class="row">
      <div class="col-lg-12">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>User</h5>
              </div>

              <div class="ibox-content">
                  <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Name</th>
              <th>Email</th>
              <th>User Role</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)   
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $roleName)
                              <label class="badge badge-primary">{{ $roleName }}</label>
                          @endforeach
                      @endif
                  </td>

                  <td>
                      <a title="Assign role" href="{{ route('assign-role.edit', $user->id) }}" class="cus_mini_icon color-success"> <i class="fa fa-user-plus" aria-hidden="true"></i></a>
                      <a title="Edit" href="{{ route('users.edit', $user->id) }}" class="cus_mini_icon color-success"> <i class="fa fa-pencil-square-o"></i></a>
                      <a title="Delete" data-toggle="modal" data-target="#myModal{{$user->id}}" type="button" class="cus_mini_icon color-danger"><i class="fa fa-trash"></i></a>
                  </td>
                  <div class="modal fade in" id="myModal{{$user->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Delete Training</h4>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                <h3>You are going to delete ' {{ $user->name }} ' ?</h3>

                                <a data-dismiss="modal" class="btn btn-sm btn-warning"><strong>No</strong></a>
                                <button class="btn btn-sm btn-primary" type="submit" onclick="event.preventDefault();
                                        document.getElementById('class-delete-form{{ $user->id }}').submit();">
                                    <strong>Yes</strong>
                                </button>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

                <form id="class-delete-form{{ $user->id }}" method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: none" >
                    {{method_field('DELETE')}}
                    @csrf()
                </form>                  
                </tr>  
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
</div>
</div>
</div>
</div>
@endsection

