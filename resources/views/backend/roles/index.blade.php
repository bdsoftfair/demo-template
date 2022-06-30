@extends('admin.admin_master')

@section('title')
    Role Manage Page
@endsection

@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Role List</h3>
                            @if (Auth::guard('admin')->user()->can('role.create'))
                            <a href="{{ route('roles.create') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Role</a>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th width="10%">Role Name</th>
                                            <th>Permission</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $key => $role )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @foreach ($role->permissions as $perm)
                                                    <span class="badge badge-primary mr-2 mb-2">{{ $perm->name }}</span>   
                                                @endforeach
                                            </td>
                                            <td>
                                                @if (Auth::guard('admin')->user()->can('role.edit'))
                                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
                                                @endif
                                                
                                                @if (Auth::guard('admin')->user()->can('role.delete'))
                                                <a href="{{ route('roles.destroy',$role->id) }}" class="btn btn-danger"  onclick=" event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                                    Delete
                                                </a>
                                                <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy',$role->id) }}" method="POST" style="display: none">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection