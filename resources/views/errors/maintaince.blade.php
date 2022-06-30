@extends('error.error_master')
@section('title')
    Maintaince
@endsection
@section('error-content')
<section class="error-page h-p100 bg-gradient-info theme-primary">
    <div class="container h-p100">
      <div class="row h-p100 align-items-center justify-content-center text-center">
          <div class="col-lg-7 col-md-10 col-12">
              <div class="b-double border-white rounded">
                  <h1 class="text-white font-size-180 font-weight-bold error-page-title"> <i class="fa fa-gear fa-spin"></i></h1>
                  <h1 class="text-white">UNDER MAINTENANCE!</h1>
                  <h3 class="text-white">We're sorry for the inconvenience.</h3>
                  <h4 class="mb-25 text-white">Please check back later.</h4>	
              </div>
          </div>				
      </div>
    </div>
</section>
@endsection