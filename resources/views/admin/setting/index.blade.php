@extends('admin.includes.default')
@section('title', 'Setting')
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
        <label for="setting_nama_lengkap">Nama Lengkap</label>
        <input type="text" name="setting_nama_lengkap" class="form-control" @if(!empty($products)) value="{{ $products['nama_lengkap']}}" @else value="{{ old('setting_nama_lengkap') }}" @endif>
        @if(!empty($errors->first('setting_nama_lengkap')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('setting_nama_lengkap') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="setting_profesi">Profesi</label>
        <input type="text" name="setting_profesi" class="form-control" @if(!empty($products)) value="{{ $products['profesi']}}" @else value="{{ old('setting_profesi') }}" @endif>
        @if(!empty($errors->first('setting_profesi')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('setting_profesi') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="setting_twitter">Account Twitter</label>
        <input type="text" name="setting_twitter" class="form-control" @if(!empty($products)) value="{{ $products['account_twitter']}}" @else value="{{ old('setting_twitter') }}" @endif>
        @if(!empty($errors->first('setting_twitter')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('setting_twitter') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="setting_facebook">Account Facebook</label>
        <input type="text" name="setting_facebook" class="form-control" @if(!empty($products)) value="{{ $products['account_facebook']}}" @else value="{{ old('setting_facebook') }}" @endif>
        @if(!empty($errors->first('setting_facebook')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('setting_facebook') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="setting_instagram">Account Instagram</label>
        <input type="text" name="setting_instagram" class="form-control" @if(!empty($products)) value="{{ $products['account_instagram']}}" @else value="{{ old('setting_instagram') }}" @endif>
        @if(!empty($errors->first('setting_instagram')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('setting_instagram') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="setting_skype">Account Skype</label>
        <input type="text" name="setting_skype" class="form-control" @if(!empty($products)) value="{{ $products['account_skype']}}" @else value="{{ old('setting_skype') }}" @endif>
        @if(!empty($errors->first('setting_skype')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('setting_skype') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="setting_linkedin">Account Linkedin</label>
        <input type="text" name="setting_linkedin" class="form-control" @if(!empty($products)) value="{{ $products['account_linkedin']}}" @else value="{{ old('setting_linkedin') }}" @endif>
        @if(!empty($errors->first('setting_linkedin')))
        <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('setting_linkedin') }}</p>
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