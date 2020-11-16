@extends('admin.includes.default')
@section('title', 'Update Abouts')
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
    <input type="hidden" name="abouts_params" value="admin-abouts">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="abouts_title">Title</label>
        <input type="text" name="abouts_title" class="form-control" @if(!empty($products)) value="{{ $products->title}}" @else value="{{ old('abouts_title') }}" @endif>
        @if(!empty($errors->first('abouts_title')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('abouts_title') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="abouts_description">Description</label>
        <textarea class="form-control" name="abouts_description" id="portofolio-content" rows="10" cols="80">@if(!empty($products)) {{ $products->description}} @else {{ old('abouts_description') }} @endif</textarea>
        @if(!empty($errors->first('abouts_description')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('abouts_description') }}</p>
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