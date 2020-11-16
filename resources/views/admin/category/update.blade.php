@extends('admin.includes.default')
@section('title', 'Update Category')
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
        <input type="text" name="category_nama" class="form-control" @if(!empty($products)) value="{{ $products->nama_category}}" @else value="{{ old('category_nama') }}" @endif>
        @if(!empty($errors->first('category_nama')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('category_nama') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="category_type">Type</label>

        <select name="category_type" class="form-control">
          <option value="">--Pilih--</option>
          <option value="portofolio" @if(!empty($products)) @if($products->type == 'portofolio') selected @endif @endif>Portofolio</option>
          <option value="resume" @if(!empty($products)) @if($products->type == 'resume') selected @endif @endif>Resume</option>
        </select>
        <!-- <input type="text" name="category_type" class="form-control" @if(!empty($products)) value="{{ $products->type}}" @else value="{{ old('category_type') }}" @endif> -->
        @if(!empty($errors->first('category_type')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('category_type') }}</p>
        @endif
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="{{ route('category')}}" class="btn btn-secondary">Back</a>
    </div>
  </form>
</div>
@endsection