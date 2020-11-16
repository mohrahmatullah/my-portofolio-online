@extends('admin.includes.default')
@section('title', 'Skill')
@section('content')
@include('pages_message.notify-msg-success')
<!-- jquery validation -->
<div class="card card-default">
  <div class="card-header">
    <h3 class="card-title">{{ $title_form }}</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="setting_params" value="admin-setting">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="skill_php">PHP</label>
        <div class="d-flex justify-content-center my-3">
            <span class="font-weight-bold indigo-text mr-2 mt-1">10</span>
            <div class="range-field w-25">
              <input class="form-control-range" name="skill_php" type="range" id="slider_pax" @if(!empty($products)) value="{{ $products['php']}}" @else value="{{ old('skill_php') }}" @endif min="10" max="100" />
              <span id="slider_pax_value"></span>
            </div>
            <span class="font-weight-bold indigo-text ml-2 mt-1">100</span>
        </div> 
        @if(!empty($errors->first('skill_php')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('skill_php') }}</p>
        @endif
      </div>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label for="skill_php">PHP</label>
        <div class="d-flex justify-content-center my-3">
            <span class="font-weight-bold indigo-text mr-2 mt-1">10</span>
            <div class="range-field w-25">
              <input class="form-control-range" name="skill_php" type="range" id="slider_pax" @if(!empty($products)) value="{{ $products['php']}}" @else value="{{ old('skill_php') }}" @endif min="10" max="100" />
              <span id="slider_pax_value"></span>
            </div>
            <span class="font-weight-bold indigo-text ml-2 mt-1">100</span>
        </div> 
        @if(!empty($errors->first('skill_php')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('skill_php') }}</p>
        @endif
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
@endsection