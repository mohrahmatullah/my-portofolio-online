@extends('frontend.includes.default')
@section('title', 'Portofolio')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
	<div class="hero-container" data-aos="fade-in">
	  <h1>Alex Smith</h1>
	  <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
	</div>
</section><!-- End Hero -->

<main id="main">

	<!-- ======= About Section ======= -->
	<section id="about" class="about">
	  <div class="container">

	    <div class="section-title">
	      <h2>About</h2>
	      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
	    </div>

	    <div class="row">
	      <div class="col-lg-4" data-aos="fade-right">
	        <img src="{{url('frontend/assets/img/profile-img.jpg')}}" class="img-fluid" alt="">
	      </div>
	      <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
	        <h3>{{ $abouts->title }}</h3>
	        {!! string_decode($abouts->description) !!}
	      </div>
	    </div>

	  </div>
	</section><!-- End About Section -->

	<!-- ======= Facts Section ======= -->
	<section id="facts" class="facts">
	  <div class="container">

	    <div class="section-title">
	      <h2>Facts</h2>
	      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
	    </div>

	    <div class="row no-gutters">

	      <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
	        <div class="count-box">
	          <i class="icofont-simple-smile"></i>
	          <span data-toggle="counter-up">232</span>
	          <p><strong>Happy Clients</strong> consequuntur quae</p>
	        </div>
	      </div>

	      <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
	        <div class="count-box">
	          <i class="icofont-document-folder"></i>
	          <span data-toggle="counter-up">521</span>
	          <p><strong>Projects</strong> adipisci atque cum quia aut</p>
	        </div>
	      </div>

	      <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
	        <div class="count-box">
	          <i class="icofont-live-support"></i>
	          <span data-toggle="counter-up">1,463</span>
	          <p><strong>Hours Of Support</strong> aut commodi quaerat</p>
	        </div>
	      </div>

	      <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="300">
	        <div class="count-box">
	          <i class="icofont-users-alt-5"></i>
	          <span data-toggle="counter-up">15</span>
	          <p><strong>Hard Workers</strong> rerum asperiores dolor</p>
	        </div>
	      </div>

	    </div>

	  </div>
	</section><!-- End Facts Section -->

	<!-- ======= Skills Section ======= -->
	<section id="skills" class="skills section-bg">
	  <div class="container">

	    <div class="section-title">
	      <h2>Skills</h2>
	      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
	    </div>

	    <div class="row skills-content">

	      <div class="col-lg-6" data-aos="fade-up">

	        <div class="progress">
	          <span class="skill">HTML <i class="val">100%</i></span>
	          <div class="progress-bar-wrap">
	            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	          </div>
	        </div>

	        <div class="progress">
	          <span class="skill">CSS <i class="val">90%</i></span>
	          <div class="progress-bar-wrap">
	            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
	          </div>
	        </div>

	        <div class="progress">
	          <span class="skill">JavaScript <i class="val">75%</i></span>
	          <div class="progress-bar-wrap">
	            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
	          </div>
	        </div>

	      </div>

	      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

	        <div class="progress">
	          <span class="skill">PHP <i class="val">80%</i></span>
	          <div class="progress-bar-wrap">
	            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
	          </div>
	        </div>

	        <div class="progress">
	          <span class="skill">WordPress/CMS <i class="val">90%</i></span>
	          <div class="progress-bar-wrap">
	            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
	          </div>
	        </div>

	        <div class="progress">
	          <span class="skill">Photoshop <i class="val">55%</i></span>
	          <div class="progress-bar-wrap">
	            <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
	          </div>
	        </div>

	      </div>

	    </div>

	  </div>
	</section><!-- End Skills Section -->

</main><!-- End #main -->
@endsection