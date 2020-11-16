@extends('admin.includes.default')
@section('title', 'Update Resume')
@section('content')
<!-- jquery validation -->
<div class="card card-default">
  <div class="card-header">
    <h3 class="card-title">{{ $title_form }}</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="category_nama">Nama Category</label>

        <select name="category_nama" class="form-control">
          <option value="">--Pilih--</option>
          @foreach($category as $c)          
          <option value="{{ $c['id'] }}" @if(!empty($products)) @if($c['id'] == $products->id_category) selected @endif @else @if(old('category_nama')) selected @endif @endif>{{ $c['nama_category'] }}</option>
          @endforeach
        </select>
        @if(!empty($errors->first('category_nama')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('category_nama') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="resume_title">Title</label>
        <input type="text" name="resume_title" class="form-control" @if(!empty($products)) value="{{ $products->title}}" @else value="{{ old('resume_title') }}" @endif>
        @if(!empty($errors->first('resume_title')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('resume_title') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="resume_start">Start</label>
        <input type="text" name="resume_start" class="form-control" @if(!empty($products)) value="{{ $products->start}}" @else value="{{ old('resume_start') }}" @endif>
        @if(!empty($errors->first('resume_start')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('resume_start') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="resume_end">End</label>
        <input type="text" name="resume_end" class="form-control" @if(!empty($products)) value="{{ $products->end}}" @else value="{{ old('resume_end') }}" @endif>
        @if(!empty($errors->first('resume_end')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('resume_end') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="resume_address">Address</label>
        <input type="text" name="resume_address" class="form-control" @if(!empty($products)) value="{{ $products->address}}" @else value="{{ old('resume_address') }}" @endif>
        @if(!empty($errors->first('resume_address')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('resume_address') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="resume_description">Description</label>
        <textarea class="form-control" name="resume_description" id="portofolio-content" rows="10" cols="80">@if(!empty($products)) {{ $products->description}} @else {{ old('resume_description') }} @endif</textarea>
        @if(!empty($errors->first('resume_description')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('resume_description') }}</p>
        @endif
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="{{ route('resume-list')}}" class="btn btn-secondary">Back</a>
    </div>
  </form>
</div>
@endsection