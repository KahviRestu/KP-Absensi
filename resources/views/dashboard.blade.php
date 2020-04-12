@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
      <div class="card shadow h-100">
          <div class="card-header">
              <h5 class="m-0 pt-1 font-weight-bold">ABSENSI GURU</h5>
          </div>
          <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                  @method('patch')
                  @csrf                                  
                  <div class="form-group row">
                    <div class="col-md-3"></div>
                     <h1>Selamat Datang {{ Auth::user()->name }}</h1>
                  </div>                  
              </form>
          </div>
      </div>
  </div>
</div>
@stop