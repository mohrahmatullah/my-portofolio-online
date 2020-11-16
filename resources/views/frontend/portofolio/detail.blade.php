@extends('frontend.includes.default')
@section('title', 'Resume')
@section('content')
<main id="main">

	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
	  <div class="container">

	    <div class="d-flex justify-content-between align-items-center">
	      <h2>Portfoio Details</h2>
	      <ol>
	        <li><a href="index.html">Home</a></li>
	        <li>Portfoio Details</li>
	      </ol>
	    </div>

	  </div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Portfolio Details Section ======= -->
	<section id="portfolio-details" class="portfolio-details">
	  <div class="container">

	    <div class="portfolio-details-container">

	      <div class="owl-carousel portfolio-details-carousel">
	        <img src="{{url('frontend/assets/img/portfolio-details-1.jpg')}}" class="img-fluid" alt="">
	        <img src="{{url('frontend/assets/img/portfolio-details-2.jpg')}}" class="img-fluid" alt="">
	        <img src="{{url('frontend/assets/img/portfolio-details-3.jpg')}}" class="img-fluid" alt="">
	      </div>

	      <div class="portfolio-info">
	        <h3>Project information</h3>
	        <ul>
	          <li><strong>Category</strong>: {{ $portofolio->nama_category }}</li>
	          <li><strong>Client</strong>: {{ $portofolio->client }}</li>
	          <li><strong>Project date</strong>: <!-- 01 March, 2020 --> {{ $portofolio->project_date }}</li>
	          <li><strong>Project URL</strong>: <a href="#">{{ $portofolio->project_url }}</a></li>
	        </ul>
	      </div>

	    </div>

	    <div class="portfolio-description">
	      <h2>This is an example of portfolio detail</h2>
	      <p>
	        {!! string_decode($portofolio->content) !!}
	      </p>
	    </div>

	  </div>
	</section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
@endsection