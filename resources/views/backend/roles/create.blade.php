@extends('admin.admin_master')

@section('title')
    Role Create Page
@endsection

@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Create New Role</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <!------ Form Error Message Show-------->
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $errors->first() }}</strong>
                                <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                </div>
                            @endif
                            <form action="{{ route('roles.store') }}" method="POST">

                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Role Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control"  required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <h5>Give Permission <span class="text-danger">*</span></h5>
                                                    <!---All Permission Check--->
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkPermissionAll" value="1">
                                                        <label for="checkPermissionAll">All</label>
                                                    </div>
                                                    <hr>

                                                    @php $i = 1; @endphp
                                                    @foreach ($permission_groups as $group)
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="{{ $i }}Management"  value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                                    <label for="{{ $i }}Management">{{ $group->name }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-9 role-{{ $i }}-management-checkbox">
                                                                @php
                                                                    $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                                                    $j = 1;
                                                                @endphp

                                                               @foreach ($permissions as $permission)
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" name="permissions[]" id="Checkbox_{{ $permission->id }}" value="{{ $permission->name }}">
                                                                        <label for="Checkbox_{{ $permission->id }}">{{ $permission->name }}</label>
                                                                    </div>
                                                                    @php $j++ @endphp
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        @php $i++ @endphp
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit" />
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('scripts')
    @include('backend.roles.partials.script')
@endsection