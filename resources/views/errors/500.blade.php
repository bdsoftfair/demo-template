@extends('errors.error_master')
@section('title')
    Error | Internal Server
@endsection
@section('error-content')
<section class="error-page h-p100 bg-gradient-primary">
    <div class="container h-p100">
      <div class="row h-p100 align-items-center justify-content-center text-center">
          <div class="col-lg-7 col-md-10 col-12">
              <div class="b-double border-white rounded30">
                  <h1 class="text-white font-size-180 font-weight-bold error-page-title"> 500</h1>
                  <h1 class="text-white">Internal Server Error</h1>
                  <div class="my-30"><a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-rounded">Back to dashboard</a></div>				  

                  <form class="search-form mx-auto my-30 w-p75">
                    <div class="input-group rounded60 overflow-h">
                      <input type="text" name="search" class="form-control" placeholder="Search">
                      <div class="input-group-prepend">
                          <button type="submit" name="submit" class="btn btn-rounded btn-danger btn-sm"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <!-- /.input-group -->
                  </form>
              </div>
          </div>				
      </div>
    </div>
</section>
@endsection