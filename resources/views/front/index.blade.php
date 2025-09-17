
@extends('front.layout.main')
@section('main-section')
	<!-- Hero Area Start -->
	<section class="overflow-hidden">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 px-0">
            <div class="swiper hero-slider">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="hero-main-section position-relative">
                    <picture class="w-100">
                      <!-- Large screens -->
                      <source
                        media="(min-width: 1024px)"
                        srcset="{{ $banner->image }}"
                      />
                      <!-- Tablets -->
                      <source
                        media="(min-width: 600px)"
                        srcset="{{ $banner->image }}"
                      />
                      <!-- Mobile -->
                      <img
                        src="{{ url('front/assets/images/new/mobile-ban.png') }}"
                        class="w-100"
                        alt=""
                      />
                    </picture>

                    <div class="position-absolute top-0 start-0 w-100 h-100">
                      <div class="joystick position-absolute d-none d-md-block">
                        <img src="{{ url('front/assets/images/new/joystick.png') }}" alt="" />
                      </div>
                      <div class="vr_2 position-absolute d-none d-md-block">
                        <img src="{{ url('front/assets/images/new/vr_2.png') }}" alt="" />
                      </div>
                      <div class="joykey position-absolute d-none d-md-block">
                        <img src="{{ url('front/assets/images/new/joykey.png') }}" alt="" />
                      </div>

                      <div class="container py-5">
                        <div class="row justify-content-center">
                          <div class="col-12 col-md-6 align-self-center">
                            <h1 class="text-white mb-3 text-uppercase">
                              <!-- The
                              <span class="primary-light-clr">Future</span> of
                              play is loading,
                              <span class="primary-light-clr">FB-V2</span> -->
							  {{ $banner->heading }}
                            </h1>
                            <p class="text-white mb-3 fs-2">
                              <!-- Introducing the World’s First VR Interactive Board
                              Game Pinball Machine. -->
							  {{ $banner->short_desc }}

                            </p>
                            <a href="/contact" class="mybtn1 mt-4"
                              >Know More</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	<!-- Hero Area End -->

	<!-- About Area Start -->
	<section class="about-section">
		<!-- Decorative images -->
		<img class="s1 wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s" src="{{ url('front/assets/images/about/s1.png') }}"
			alt="" />
		<img class="s2 wow animate__animated animate__fadeInRight" data-wow-delay="0.4s" src="{{ url('front/assets/images/about/s2.png') }}"
			alt="" />
	
		<div class="container position-relative">
			<div class="row align-items-center mobo-rev">
				<!-- Left content -->
				<div class="col-lg-6">
					<div class="left-content wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
						<div class="section-heading mb-0">
							<h2 class="title wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
								<!-- About <span class="primary-light-clr">FutureBox</span> Systems -->
								 {{$about->title}}
							</h2>
							<p class="wow animate__animated animate__fadeInUp" data-wow-delay="1s">
								<!-- At <strong>FutureBox Systems</strong>, we are redefining how
								people experience board games. Based in Cologne, Germany, we
								combine the physical playfield with the power of VR to create
								immersive mixed-reality tabletop gaming. -->
								{!! $about->content !!}
							</p>
	
							<!-- <p class="wow animate__animated animate__fadeInUp" data-wow-delay="1.2s">
								What began as our first prototype,
								<em>“an AR Pinball Machine”</em>, has grown into a funded
								venture supported by <strong>EXIST</strong> and the
								<strong>Gründungsstipendium NRW</strong>. Our product has
								already been showcased at major events throughout Germany,
								played by thousands, and proven to deliver a new kind of
								social, interactive entertainment.
							</p>
	
							<p class="wow animate__animated animate__fadeInUp" data-wow-delay="1.4s">
								We are now building <strong>FutureBox V2</strong>: a
								next-generation platform that is portable, customizable, and
								affordable. By blending VR with physical gameplay, V2 will
								transform traditional board games into living, interactive
								experiences. We are starting with
								<strong>a pinball playfield + VR glasses</strong>, but that’s
								only the beginning. Our vision is simple: to make the future
								of board games limitless, accessible, interactive, immersive,
								and unforgettable.
							</p> -->
	
							<a href="/about" class="mybtn1 mt-4 wow animate__animated animate__fadeInUp"
								data-wow-delay="1.6s">Know more</a>
						</div>
					</div>
				</div>
	
				<!-- Right image -->
				<div class="col-md-5 offset-md-1 wow animate__animated animate__fadeInRight" data-wow-delay="0.8s">
					<img class="img-fluid mb-5 mb-md-0" src="{{$about->image}}" alt="" />
				</div>
			</div>
		</div>
	</section>


	<!-- OurEvents Area Start -->
	<section class="section-padding OurEvents">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="section-heading text-start pe-5 py-5 wow animate__animated animate__fadeInLeft"
						data-wow-delay="0.2s">
						<h5 class="subtitle mb-4 lh-base">
							So where you guys were until now: Busy making our tech From Vision to Reality: FutureBox V1
						</h5>
						<h4 class="title mb-4">You learn, and you build. That’s been our approach since day one.</h4>
						<p class="text lh-base">Our Version 1 prototype isn’t just talk - it’s a working AR Digital Pinball Machine.
							It’s not traditional pinball. It was the beginning of a whole new kind of play. And it’s already turning
							heads:</p>
					</div>
				</div>
			
				<div class="col-md-6 ps-md-4">
					@foreach ($showcase as $item1)
					<div class="featureHighlight d-flex wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
						<div class="flex-shrink-0">
							<img class="img-fluid3" src="{{$item1->image}}" alt="">
						</div>
						<div class="flex-grow-1 ms-5">
							<h5 class="fw-bold">{{$item1->heading}}</h5>
							<p>{{$item1->short_desc}}</p>
						</div>
					</div>
					@endforeach
			
					<!-- <div class="featureHighlight d-flex wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
						<div class="flex-shrink-0">
							<img class="img-fluid" src="{{ url('front/assets/images/new/icons/rating-ico.png') }}" alt="">
						</div>
						<div class="flex-grow-1 ms-5">
							<h5 class="fw-bold">2000+ Players Rated 4.3 Stars</h5>
							<p>Winning trust and love from passionate players of all age groups.</p>
						</div>
					</div>
			
					<div class="featureHighlight d-flex wow animate__animated animate__fadeInUp" data-wow-delay="0.7s">
						<div class="flex-shrink-0">
							<img class="img-fluid" src="{{ url('front/assets/images/new/icons/rocket.png') }}" alt="">
						</div>
						<div class="flex-grow-1 ms-5">
							<h5 class="fw-bold">What’s Next? FB-V2</h5>
							<p>Sparking excitement and curiosity for our upcoming revolutionary release.</p>
						</div>
					</div> -->
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-lg-11 mx-auto wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
					<div class="section-heading">
						<h2 class="title">Our Events with Futurebox</h2>
					</div>
				</div>
			</div>

			<!-- Swiper Slider -->
			<div class="swiper eventSlider wow animate__animated animate__fadeInUp" data-wow-delay="0.9s">
				<div class="swiper-wrapper">

					@foreach ($service as $item2)
					<div class="swiper-slide">
						<img src="{{$item2->image}}" alt="img" />
						<div class="slide-content">
							<h4>{{$item2->name}}</h4>
							<div class="d-flex gap-3 justify-content-between">
								<p class="">{{$item2->location}}</p>
								<p class="badge bg-primary">2024</p>
							</div>
						</div>
					</div>
					@endforeach
					<!-- <div class="swiper-slide">
						<img src="{{ url('front/assets/images/new/event/event-2.jpg') }}" alt="img" />
						<div class="slide-content">
							<h4>Ideen Expo</h4>
							<div class="d-flex gap-3 justify-content-between">
								<p class="">Hannover, Germany</p>
								<p class="badge bg-primary">2024</p>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<img src="{{ url('front/assets/images/new/event/event-4.png') }}" alt="img" />
						<div class="slide-content">
							<h4>Ideen Expo</h4>
							<div class="d-flex gap-3 justify-content-between">
								<p class="">Hannover, Germany</p>
								<p class="badge bg-primary">2024</p>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<img src="{{ url('front/assets/images/new/event/event-5.png') }}" alt="img" />
						<div class="slide-content">
							<h4>Ideen Expo</h4>
							<div class="d-flex gap-3 justify-content-between">
								<p class="">Hannover, Germany</p>
								<p class="badge bg-primary">2024</p>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<img src="{{ url('front/assets/images/new/event/event-6.png') }}" alt="img" />
						<div class="slide-content">
							<h4>Ideen Expo</h4>
							<div class="d-flex gap-3 justify-content-between">
								<p class="">Hannover, Germany</p>
								<p class="badge bg-primary">2024</p>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<img src="{{ url('front/assets/images/new/event/event-7.png') }}" alt="img" />
						<div class="slide-content">
							<h4>Ideen Expo</h4>
							<div class="d-flex gap-3 justify-content-between">
								<p class="">Hannover, Germany</p>
								<p class="badge bg-primary">2024</p>
							</div>
						</div>
					</div> -->
				</div>
				<br/>
				 <!-- Navigation -->
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>

				<!-- Pagination -->
				<div class="swiper-pagination mt-5"></div>
			</div>
		</div>
	</section>

	<!-- WhyChooseUs Start -->
	<section class="section-padding WhyChooseUS">
		<div class="container position-relative z-2">
			<div class="row align-items-center">
				<div class="col-md-6 mb-4 mb-md-0 text-center">
					<div class="image-card rounded overflow-hidden p-5 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
						<img src="{{ url('front/assets/images/new/vr4.png') }}" class="img-fluid" alt="FutureBox Booth VR">
					</div>
				</div>
				<div class="col-md-6">
					<div class="section-heading text-start mb-4 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
						<h5 class="subtitle mb-4 lh-base">While We Build the Future, Here’s What We Offer Today</h5>
						<h2 class="title">Gamify Your Event. Engage. Excite. Win.</h2>
						<p class="text fw-semibold mb-4">What is the FutureBox Booth?</p>
						<p class="text">
							While our tech team is busy building the <strong class="fw-semibold">next generation of pinball</strong>,
							our marketing team is already bringing the fun to you.
						</p>
						<p class="text text-white">With the <strong class="fw-semibold">FutureBox Booth,</strong> you can:</p>
					</div>
					<ul class="list-unstyled text-white wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
						<li class="mb-2 d-flex align-items-center gap-4">
							<i class="fas fa-gamepad fs-2"></i>
							<p class="mb-0 text-white"><strong class="fw-semibold">Play Pinball on PlayStation 5</strong></p>
						</li>
						<li class="mb-2 d-flex align-items-center gap-4">
							<i class="fas fa-vr-cardboard fs-2"></i>
							<p class="mb-0 text-white"><strong class="fw-semibold">Try VR on Meta Quest 3</strong> - a sneak peek into where we’re headed
							</p>
						</li>
					</ul>
					<p class="text mt-2 mb-0 text-white wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
						Whether you’re a <strong class="fw-semibold">company hosting an event</strong> or an <strong class="fw-semibold">individual planning a party</strong>, we’ve got you covered.
					</p>
				</div>
			</div>
		</div>
		<div class="container WhyChooseUsList  my-5">
			<div class="row">
				
				@foreach ($event as $item3)
				<div class="col-md-4">
					<div class="feature-card wow animate__animated animate__fadeInUp" data-wow-delay="0.2s" num="1">
						<div class="text-center">
							<img src="{{ $item3->image }}" alt="Why Choose" class="feature-image">
						</div>
						<h4 class="feature-header d-md-none" data-bs-toggle="collapse" data-bs-target="#collapseOneMobile">
							{{ $item3->name }}
							<i class="fas fa-chevron-right rotate"></i>
						</h4>
						<h4 class="feature-header d-none d-md-block">{{ $item3->name }}</h4>
			
						<!-- Desktop content -->
						<div class="d-none d-md-block">
							<div class="feature-body">
								<div class="infoPara">
									<!-- <p>Our concept is built on <strong>proven gamification strategies</strong> designed to:</p> -->
									{!!$item3->short_desc!!}
								</div>
								<!-- <p><i class="fas fa-check icon"></i>Increase visibility at your event</p>
								<p><i class="fas fa-check icon"></i>Boost foot traffic to your booth</p>
								<p><i class="fas fa-check icon"></i>Keep guests engaged and excited</p> -->
								{!! str_replace(
									['<ul>', '</ul>', '<li>', '</li>'],
									['', '', '<p><i class="fas fa-check icon"></i>', '</p>'],
									$item3->description
								) !!}

								<p>&nbsp;</p>
							</div>
						</div>
			
						<!-- Mobile content -->
						<div id="collapseOneMobile" class="collapse show d-md-none">
							<div class="feature-body">
								<div class="infoPara">
									<!-- <p>Our concept is built on <strong>proven gamification strategies</strong> designed to:</p> -->
									 {!!$item3->short_desc!!}
								</div>
								<!-- <p><i class="fas fa-check icon"></i>Increase visibility at your event</p>
								<p><i class="fas fa-check icon"></i>Boost foot traffic to your booth</p>
								<p><i class="fas fa-check icon"></i>Keep guests engaged and excited</p> -->
								{!! str_replace(
									['<ul>', '</ul>', '<li>', '</li>'],
									['', '', '<p><i class="fas fa-check icon"></i>', '</p>'],
									$item3->description
								) !!}
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="text-center mt-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
				<a href="/event" class="mybtn1">Bring the Future to Your Event.</a>
			</div>
		</div>
	</section>

	<!-- Team  area start -->
	<section class="team-section pb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-heading wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
						<h5 class="subtitle">
							Meet the Minds Behind FutureBox
						</h5>
						<h2 class="title">
							Turning Vision Into Reality, One Game at a Time
						</h2>
						<h6 class="text w-lg-75 mx-auto">
							Our passionate team blends innovation and expertise to shape the future of gaming. From concept
							to creation, we bring bold ideas to life with precision and heart.
						</h6>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- Member 1 -->
				@foreach ($team as $item4)
				<div class="col-md-6 col-lg-4 mb-4 order-2 order-lg-1 wow animate__animated animate__fadeInUp"
					data-wow-delay="0.3s">
					<div class="single-team p-4 text-center h-100">
						<div class="image">
							<img class="shape" src="{{ url('front/assets/images/team/bg.png') }}" alt="">
							<img class="member" src="{{$item4->image}}" alt="Mahmoud Samy">
						</div>
						<div class="mt-4">
							<h4>{{$item4->name}}</h4>
							<h5>{{$item4->position}}</h5>
							<p>{{$item4->qualification}}</p>
							<p>{!! $item4->content !!}</p>
							<p class="mb-0">&nbsp;</p>
							<a href="mailto:{{$item4->email}}" class="link">
								{{$item4->email}}
							</a>
						</div>
					</div>
				</div>
				@endforeach
				<!-- Member 2 -->
				<!-- <div class="col-md-6 col-lg-4 mb-4 order-1 order-lg-2 wow animate__animated animate__fadeInUp"
					data-wow-delay="0.4s">
					<div class="single-team p-4 text-center h-100">
						<div class="image">
							<img class="shape" src="{{ url('front/assets/images/team/bg.png') }}" alt="">
							<img class="member" src="{{ url('front/assets/images/new/Arbaaz.png') }}" alt="Arbaz Attaulla Khan">
						</div>
						<div class="mt-4">
							<h4>Arbaz Attaulla Khan (The Blender)</h4>
							<h5>Founder, Managing Director & CEO</h5>
							<p>MBA, BMS, PGDM, DMD</p>
							<p>
								Arbaz ensures <span class="fw-semibold text-decoration-underline">FutureBox</span> reaches
								you.
								From marketing the product to shaping the company’s strategy, he’s the voice you hear on
								this website and the one making sure we never run out of resources or vision.
							</p>
							<a href="mailto:arbazkhan@futureboxsystems.com" class="link">
								arbazkhan@futureboxsystems.com
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 mb-4 order-3 wow animate__animated animate__fadeInUp"
					data-wow-delay="0.5s">
					<div class="single-team p-4 text-center h-100">
						<div class="image">
							<img class="shape" src="{{ url('front/assets/images/team/bg.png') }}" alt="">
							<img class="member" src="{{ url('front/assets/images/new/david.png') }}" alt="David Werhahn">
						</div>
						<div class="mt-4">
							<h4>David Werhahn</h4>
							<h5>Futurebox system’s Coach</h5>
							<p>&nbsp;&nbsp;</p>
							<p>David is providing guidance and mentorship, helping shape our approach, refine our processes,
								and guide our growth.</p>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</section>

	<!-- Blogs area -->
	<section class="Blogs">
		<div class="container">
			<div class="row">
				<div class="col-lg-11 mx-auto">
					<div class="section-heading wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
						<h5 class="subtitle">
							Insights, stories, and trends you’ll love
						</h5>
						<h2 class="title">
							Our Blogs
						</h2>
						<h6 class="text w-lg-75 mx-auto">
							Discover fresh perspectives and expert tips in every post.
						</h6>
					</div>
				</div>
			</div>
	
			<div class="row">
				<!-- Card 1 -->
				<div class="col-lg-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
					<div class="blog-card">
						<img src="https://xcloud.peacefulqode.co.in/wp-content/uploads/2023/03/8-1.jpg"
							alt="God of Space Wars">
						<div class="blog-content">
							<div class="blog-category">
								<a href="#">Collection</a>
							</div>
							<div class="blog-meta">
								<span>March 6, 2023</span> | <span>0 Comments</span>
							</div>
							<h5 class="blog-title">God of Space Wars Collector’s Edition</h5>
							<p>It is a long established fact that a reader will be distracted by the readable content of a
								page when looking at its layout.</p>
							<a href="blogs-details.html" class="secondary-clr">Read More</a>
						</div>
					</div>
				</div>
	
				<!-- Card 2 -->
				<div class="col-lg-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
					<div class="blog-card">
						<img src="https://xcloud.peacefulqode.co.in/wp-content/uploads/2023/03/9-1.jpg" alt="New Trailer">
						<div class="blog-content">
							<div class="blog-category">
								<a href="#">Gaming</a>
							</div>
							<div class="blog-meta">
								<span>March 6, 2023</span> | <span>0 Comments</span>
							</div>
							<h5 class="blog-title">New Trailer Is Released Cloud Gaming !</h5>
							<p>It is a long established fact that a reader will be distracted by the readable content of a
								page when looking at its layout.</p>
							<a href="blogs-details.html" class="secondary-clr">Read More</a>
						</div>
					</div>
				</div>
	
				<!-- Card 3 -->
				<div class="col-lg-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
					<div class="blog-card">
						<img src="https://xcloud.peacefulqode.co.in/wp-content/uploads/2023/03/10.jpg" alt="Cree Peth">
						<div class="blog-content">
							<div class="blog-category">
								<a href="#">Gaming</a>
							</div>
							<div class="blog-meta">
								<span>March 1, 2023</span> | <span>0 Comments</span>
							</div>
							<h5 class="blog-title">Cree Peth You’re A Behold Heaven</h5>
							<p>It is a long established fact that a reader will be distracted by the readable content of a
								page when looking at its layout.</p>
							<a href="blogs-details.html" class="secondary-clr">Read More</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 mt-5 text-center wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
					<a href="#" class="mybtn1">Browser All</a>
				</div>
			</div>
		</div>
	</section>
<!-- Partner start -->
<section class="how-to-play pt-5">
	<img class="left-img" src="{{ url('front/assets/images/h-play/left-img.html') }}" alt="">
	<img class="right-img" src="{{ url('front/assets/images/h-play/right-img.html') }}" alt="">
	<div class="join_us_new">
		<div class="container mt-5 ResourcesPartners">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-heading wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
						<h5 class="subtitle">Together we grow</h5>
						<h2 class="title">Resources & Partners</h2>
						<!-- <h6 class="text">We work with trusted partners and tools to deliver lasting impact.</h6> -->
					</div>
				</div>
			</div>

			<div class="row align-items-stretch justify-content-center text-center my-3">
				<div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-4 px-3 d-flex wow animate__animated animate__fadeInUp"
					data-wow-delay="0.3s">
					<div class="partner-box d-flex align-items-center justify-content-center w-100">
						<img src="{{ url('front/assets/images/new/partner/Partners1.svg') }}" alt="" class="img-fluid partner-logo">
					</div>
				</div>
				<div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-4 px-3 d-flex wow animate__animated animate__fadeInUp"
					data-wow-delay="0.4s">
					<div class="partner-box d-flex align-items-center justify-content-center w-100">
						<img src="{{ url('front/assets/images/new/partner/Partners2.jpg') }}" alt="" class="img-fluid partner-logo">
					</div>
				</div>
				<div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-4 px-3 d-flex wow animate__animated animate__fadeInUp"
					data-wow-delay="0.5s">
					<div class="partner-box d-flex align-items-center justify-content-center w-100">
						<img src="{{ url('front/assets/images/new/partner/Partners3.jpg') }}" alt="" class="img-fluid partner-logo">
					</div>
				</div>
				<div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-4 px-3 d-flex wow animate__animated animate__fadeInUp"
					data-wow-delay="0.6s">
					<div class="partner-box d-flex align-items-center justify-content-center w-100">
						<img src="{{ url('front/assets/images/new/partner/Partners4.png') }}" alt="" class="img-fluid partner-logo">
					</div>
				</div>
			</div>
		</div> <!--END Resources Partners -->
	</div>

</section>
@endsection

