@extends('admin.includes.default')
@section('title', 'Update Portofolio')
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
        <label for="portofolio_title">Title</label>
        <input type="text" name="portofolio_title" class="form-control" @if(!empty($products)) value="{{ $products->title}}" @else value="{{ old('portofolio_title') }}" @endif>
        @if(!empty($errors->first('portofolio_title')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('portofolio_title') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="portofolio_slug">Slug</label>
        <input type="text" name="portofolio_slug" class="form-control" @if(!empty($products)) value="{{ $products->slug}}" @else value="{{ old('portofolio_slug') }}" @endif>
        @if(!empty($errors->first('portofolio_slug')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('portofolio_slug') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="portofolio_content">Content</label>
        <textarea class="form-control" name="portofolio_content" id="portofolio-content" rows="10" cols="80">@if(!empty($products)) {{ $products->content}} @else {{ old('portofolio_content') }} @endif</textarea>
        @if(!empty($errors->first('portofolio_content')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('portofolio_content') }}</p>
        @endif
      </div>
      <div class="form-group">
        <!-- attach gambar -->
		    <div class="custom-input-group">
          <div class="custom-input-label"><label for="portofolio_image">Image</label></div>
            <div class="row">
              <div class="col-md-12"> 
              	<!-- kondisi update -->
              	@if(!empty($products))
                  <input type="text" class="form-control" name="portofolio_image" id="hf_portofolio_image" value="{{ $products->image }}">               
                  <div class="uploadform dropzone no-margin dz-clickable image-portofolio-uploader" id="image-portofolio-uploader" style="display:none;">
                    <div class="dz-default dz-message">
                      <span>Drop your cover picture here</span>
                    </div>                  
                  </div>  
                  @if(!empty($errors->first('portofolio_image')))
                  <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('portofolio_image') }}</p>
                  @endif                      
                  <div class="show-image-portofolio text-center">
                      <div class="img-div"><img src="{{ '/uploads/'.$products->image }}" class="user-image" alt="" style="width: 250px; height: 250px;" /></div><br>
                      <div class="btn-div"><button type="button" class="btn btn-danger remove-image-portofolio">Remove image</button></div>
                  </div>
              	@else
                <!-- kondisi create -->
                	<input type="text" class="form-control" name="portofolio_image" id="hf_portofolio_image" value="{{ old('portofolio_image') }}">              	
                  <div class="uploadform dropzone no-margin dz-clickable image-portofolio-uploader" id="image-portofolio-uploader">
                    <div class="dz-default dz-message">
                      <span>Drop your cover picture here</span>
                    </div>                  
                  </div>	
        					@if(!empty($errors->first('portofolio_image')))
        					<p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('portofolio_image') }}</p>
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
        <!-- attach gambar -->
        <div class="custom-input-group">
          <div class="custom-input-label"><label for="portofolio_image">Gallery</label></div>
            <div class="row">
              <div class="col-md-12"> 
                <!-- kondisi update -->
                @if(!empty($products))
                  <input type="text" class="form-control" name="portofolio_gallery" id="hf_portofolio_gallery" value="{{ $products->gallery }}">               
                  <div class="uploadform dropzone no-margin dz-clickable gallery-portofolio-uploader" id="gallery-portofolio-uploader" name="gallery_cover_uploader" style="display:none;">
                    <div class="dz-default dz-message">
                      <span>Drop your cover picture here</span>
                    </div>                  
                  </div>  
                  @if(!empty($errors->first('portofolio_gallery')))
                  <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('portofolio_gallery') }}</p>
                  @endif                     
                  <div class="show-gallery-portofolio text-center">
                      <div class="img-div"><img src="{{ '/uploads/'.$products->gallery }}" class="user-image" alt="" style="width: 250px; height: 250px;" /></div><br>
                      <div class="btn-div"><button type="button" class="btn btn-danger remove-gallery-portofolio">Remove image</button></div>
                  </div>
                @else
                <!-- kondisi create -->
                  <input type="text" class="form-control" name="portofolio_gallery" id="hf_portofolio_gallery" value="{{ old('portofolio_gallery') }}">               
                  <div class="uploadform dropzone no-margin dz-clickable gallery-portofolio-uploader" id="gallery-portofolio-uploader">
                    <div class="dz-default dz-message">
                      <span>Drop your cover picture here</span>
                    </div>                  
                  </div>  
                  @if(!empty($errors->first('portofolio_gallery')))
                  <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('portofolio_gallery') }}</p>
                  @endif                    
                  <div class="show-gallery-portofolio text-center" style="display:none;">
                      <div class="img-div"><img src="" class="user-image" alt="" style="width: 250px; height: 250px;" /></div><br>
                      <div class="btn-div"><button type="button" class="btn btn-danger remove-gallery-portofolio">Remove image</button></div>
                  </div>
                @endif
              </div>
            </div>
        </div>
        <!-- end -->
      </div>
      <div class="form-group">
        <label for="portofolio_client">Client</label>
        <input type="text" name="portofolio_client" class="form-control" @if(!empty($products)) value="{{ $products->client}}" @else value="{{ old('portofolio_client') }}" @endif>
        @if(!empty($errors->first('portofolio_client')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('portofolio_client') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="portofolio_project_date">Project Date</label>
        <input type="text" name="portofolio_project_date" class="form-control" @if(!empty($products)) value="{{ $products->project_date}}" @else value="{{ old('portofolio_project_date') }}" @endif>
        @if(!empty($errors->first('portofolio_project_date')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('portofolio_project_date') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="portofolio_project_url">Project URL</label>
        <input type="text" name="portofolio_project_url" class="form-control" @if(!empty($products)) value="{{ $products->project_url}}" @else value="{{ old('portofolio_project_url') }}" @endif>
        @if(!empty($errors->first('portofolio_project_url')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('portofolio_project_url') }}</p>
        @endif
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="{{ route('portofolio-list')}}" class="btn btn-secondary">Back</a>
    </div>
  </form>
</div>
@endsection