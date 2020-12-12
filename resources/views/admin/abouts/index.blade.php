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
        <!-- attach gambar -->
        <div class="custom-input-group">
          <div class="custom-input-label"><label for="abouts_image">Image</label></div>
            <div class="row">
              <div class="col-md-12"> 
                <!-- kondisi update -->
                @if(!empty($products))
                  <input type="text" class="form-control" name="abouts_image" id="hf_portofolio_image" value="{{ $products['image'] }}">               
                  <div class="uploadform dropzone no-margin dz-clickable image-portofolio-uploader" id="image-portofolio-uploader" style="display:none;">
                    <div class="dz-default dz-message">
                      <span>Drop your cover picture here</span>
                    </div>                  
                  </div>  
                  @if(!empty($errors->first('abouts_image')))
                  <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('abouts_image') }}</p>
                  @endif                      
                  <div class="show-image-portofolio text-center">
                      <div class="img-div"><img src="{{ '/public/uploads/'.$products['image'] }}" class="user-image" alt="" style="width: 250px; height: 250px;" /></div><br>
                      <div class="btn-div"><button type="button" class="btn btn-danger remove-image-portofolio">Remove image</button></div>
                  </div>
                @else
                <!-- kondisi create -->
                  <input type="text" class="form-control" name="abouts_image" id="hf_portofolio_image" value="{{ old('abouts_image') }}">               
                  <div class="uploadform dropzone no-margin dz-clickable image-portofolio-uploader" id="image-portofolio-uploader">
                    <div class="dz-default dz-message">
                      <span>Drop your cover picture here</span>
                    </div>                  
                  </div>  
                  @if(!empty($errors->first('abouts_image')))
                  <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('abouts_image') }}</p>
                  @endif                      
                  <div class="show-image-portofolio text-center" style="display:none;">
                      <div class="img-div"><img src="" class="user-image" alt="" style="width: 250px; height: 250px;" /></div><br>
                      <div class="btn-div"><button type="button" class="btn btn-danger remove-image-portofolio">Remove image</button></div>
                  </div>
                @endif
              </div>
            </div>
        </div>
        <!-- end -->
      </div>
      <div class="form-group">
        <label for="abouts_title">Title</label>
        <input type="text" name="abouts_title" class="form-control" @if(!empty($products)) value="{{ $products['title']}}" @else value="{{ old('abouts_title') }}" @endif>
        @if(!empty($errors->first('abouts_title')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('abouts_title') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="abouts_description">Description</label>
        <textarea class="form-control" name="abouts_description" id="portofolio-content" rows="10" cols="80">@if(!empty($products)) {{ $products['description']}} @else {{ old('abouts_description') }} @endif</textarea>
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