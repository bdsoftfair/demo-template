@extends('backend.auth.auth_master')
@section('title')
Login | Admin Panel
@endsection

@section('auth_content')
<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">	
        
        <div class="col-12">
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="content-top-agile p-10">
                        <h2 class="text-white">Get started with Us</h2>
                        <p class="text-white-50">Sign in to start your session</p>							
                    </div>
                    <div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                        <form action="{{ route('admin.login.submit') }}" method="POST" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                              <div class="row">
                                <div class="col-6">
                                  <div class="checkbox text-white">
                                    <input type="checkbox" name="remeber" id="basic_checkbox_1" >
                                    <label for="basic_checkbox_1">Remember Me</label>
                                  </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-12">
                                 <div class="fog-pwd text-right">
                                    <a href="#" class="text-white hover-info"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
                                  </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-12 text-center">
                                  <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN IN</button>
                                </div>
                                <!-- /.col -->
                              </div>
                        </form>														

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection