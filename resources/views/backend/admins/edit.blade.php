@extends('admin.admin_master')

@section('title')
    Admin Edit Page
@endsection

@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Update Admin: {{ $edit_data->name }}</h4>
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
                            <form action="{{ route('admin.update', $edit_data->id) }}" method="POST" autocomplete="off">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" value="{{ $edit_data->name }}" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" value="{{ $edit_data->email }}" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!--end row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Phone <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_number" value="{{ $edit_data->phone_number }}" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" value="{{ $edit_data->address }}" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!--end row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" name="password" autocomplete="off" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Assign Role <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select class="form-control js-example-basic-multiple" name="roles[]" multiple="multiple">
                                                            @foreach ($roles as $role )
                                                            <option value="{{ $role->name }}" {{ $edit_data->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!--end row-->
                                        {{-- <div class="row">
                                           
                                        </div> <!--end row--> --}}

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Save User" />
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
    
@endsection