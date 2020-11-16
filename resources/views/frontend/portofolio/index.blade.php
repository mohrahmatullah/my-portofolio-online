@extends('frontend.includes.default')
@section('title', 'Resume')
@section('content')

<main id="main">

	<!-- ======= Portfolio Section ======= -->
	<section id="portfolio" class="portfolio section-bg">
	  <div class="container">

	    <div class="section-title">
	      <h2>Portfolio</h2>
	      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
	    </div>

	    <div class="row" data-aos="fade-up">
	      <div class="col-lg-12 d-flex justify-content-center">
	        <ul id="portfolio-flters">
	          <li data-filter="*" class="filter-active">All</li>
	          <li data-filter=".filter-app">App</li>
	          <li data-filter=".filter-card">Card</li>
	          <li data-filter=".filter-web">Web</li>
	        </ul>
	      </div>
	    </div>

	    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

	    	@foreach($portofolio as $p )
			<div class="col-lg-4 col-md-6 portfolio-item filter-app">
				<div class="portfolio-wrap">
				  <img src="{{ '/uploads/'.$p->image }}" class="img-fluid" alt="">
				  <div class="portfolio-links">
				    <a href="{{ '/uploads/'.$p->image }}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
				    <a href="{{ route('detail-portofolio', $p->slug)}}" title="More Details"><i class="bx bx-link"></i></a>
				  </div>
				</div>
			</div>
			@endforeach

	      <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
	        <div class="portfolio-wrap">
	          <img src="{{url('frontend/assets/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
	          <div class="portfolio-links">
	            <a href="{{url('frontend/assets/img/portfolio/portfolio-1.jpg')}}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
	            <a href="" title="More Details"><i class="bx bx-link"></i></a>
	          </div>
	        </div>
	      </div>

	      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
	        <div class="portfolio-wrap">
	          <img src="{{url('frontend/assets/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
	          <div class="portfolio-links">
	            <a href="{{url('frontend/assets/img/portfolio/portfolio-2.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
	            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
	          </div>
	        </div>
	      </div>

	      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
	        <div class="portfolio-wrap">
	          <img src="{{url('frontend/assets/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
	          <div class="portfolio-links">
	            <a href="{{url('frontend/assets/img/portfolio/portfolio-3.jpg')}}" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="bx bx-plus"></i></a>
	            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
	          </div>
	        </div>
	      </div>

	      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
	        <div class="portfolio-wrap">
	          <img src="{{url('frontend/assets/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
	          <div class="portfolio-links">
	            <a href="{{url('frontend/assets/img/portfolio/portfolio-4.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="bx bx-plus"></i></a>
	            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
	          </div>
	        </div>
	      </div>

	      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
	        <div class="portfolio-wrap">
	          <img src="{{url('frontend/assets/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
	          <div class="portfolio-links">
	            <a href="{{url('frontend/assets/img/portfolio/portfolio-5.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="bx bx-plus"></i></a>
	            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
	          </div>
	        </div>
	      </div>

	      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
	        <div class="portfolio-wrap">
	          <img src="{{url('frontend/assets/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
	          <div class="portfolio-links">
	            <a href="{{url('frontend/assets/img/portfolio/portfolio-6.jpg')}}" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="bx bx-plus"></i></a>
	            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
	          </div>
	        </div>
	      </div>

	      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
	        <div class="portfolio-wrap">
	          <img src="{{url('frontend/assets/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
	          <div class="portfolio-links">
	            <a href="{{url('frontend/assets/img/portfolio/portfolio-7.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="bx bx-plus"></i></a>
	            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
	          </div>
	        </div>
	      </div>

	      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
	        <div class="portfolio-wrap">
	          <img src="{{url('frontend/assets/img/portfolio/portfolio-8.jpg')}}" class="img-fluid" alt="">
	          <div class="portfolio-links">
	            <a href="{{url('frontend/assets/img/portfolio/portfolio-8.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="bx bx-plus"></i></a>
	            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
	          </div>
	        </div>
	      </div>

	      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
	        <div class="portfolio-wrap">
	          <img src="{{url('frontend/assets/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
	          <div class="portfolio-links">
	            <a href="{{url('frontend/assets/img/portfolio/portfolio-9.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
	            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
	          </div>
	        </div>
	      </div> -->

	    </div>

	  </div>
	</section><!-- End Portfolio Section -->

	<!-- ======= Services Section ======= -->
	<section id="services" class="services">
	  <div class="container">

	    <div class="section-title">
	      <h2>Services</h2>
	      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
	    </div>

	    <div class="row">
	      <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
	        <div class="icon"><i class="icofont-computer"></i></div>
	        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
	        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
	      </div>
	      <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
	        <div class="icon"><i class="icofont-chart-bar-graph"></i></div>
	        <h4 class="title"><a href="">Dolor Sitema</a></h4>
	        <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
	      </div>
	      <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
	        <div class="icon"><i class="icofont-earth"></i></div>
	        <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
	        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
	      </div>
	      <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
	        <div class="icon"><i class="icofont-image"></i></div>
	        <h4 class="title"><a href="">Magni Dolores</a></h4>
	        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
	      </div>
	      <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
	        <div class="icon"><i class="icofont-settings"></i></div>
	        <h4 class="title"><a href="">Nemo Enim</a></h4>
	        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
	      </div>
	      <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
	        <div class="icon"><i class="icofont-tasks-alt"></i></div>
	        <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
	        <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
	      </div>
	    </div>

	  </div>
	</section><!-- End Services Section -->

	<!-- ======= Testimonials Section ======= -->
	<section id="testimonials" class="testimonials section-bg">
	  <div class="container">

	    <div class="section-title">
	      <h2>Testimonials</h2>
	      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
	    </div>

	    <div class="owl-carousel testimonials-carousel">

	      <div class="testimonial-item" data-aos="fade-up">
	        <p>
	          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
	          Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
	          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
	        </p>
	        <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
	        <h3>Saul Goodman</h3>
	        <h4>Ceo &amp; Founder</h4>
	      </div>

	      <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
	        <p>
	          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
	          Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
	          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
	        </p>
	        <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
	        <h3>Sara Wilsson</h3>
	        <h4>Designer</h4>
	      </div>

	      <div class="testimonial-item" data-aos="fade-up" data-aos-delay="200">
	        <p>
	          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
	          Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
	          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
	        </p>
	        <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
	        <h3>Jena Karlis</h3>
	        <h4>Store Owner</h4>
	      </div>

	      <div class="testimonial-item" data-aos="fade-up" data-aos-delay="300">
	        <p>
	          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
	          Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
	          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
	        </p>
	        <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
	        <h3>Matt Brandon</h3>
	        <h4>Freelancer</h4>
	      </div>

	      <div class="testimonial-item" data-aos="fade-up" data-aos-delay="400">
	        <p>
	          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
	          Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
	          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
	        </p>
	        <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
	        <h3>John Larson</h3>
	        <h4>Entrepreneur</h4>
	      </div>

	    </div>

	  </div>
	</section><!-- End Testimonials Section -->

</main><!-- End #main -->
@endsection