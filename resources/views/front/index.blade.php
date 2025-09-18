

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

                            <h1 id="bannerText" class="text-white mb-3 text-uppercase fw-bold">

                              <!-- The
                              <span class="primary-light-clr">Future</span> of
                              play is loading,
                              <span class="primary-light-clr">FB-V2</span> -->

							  @php
								$heading = $banner->heading;
								$heading = str_replace('Future', '<span class="primary-light-clr">Future</span>', $heading);
								$heading = str_replace('FB-V2', '<span class="primary-light-clr">FB-V2</span>', $heading);
							   @endphp
							   	{!! $heading !!}


                            </h1>

                            <p class="text-white mb-3 fs-2">{{ $banner->short_desc }}</p>
                            <a href="/contact" class="mybtn1 mt-4">Discover More</a>

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

								 {{$about->title}}

							</h2>

							<p class="wow animate__animated animate__fadeInUp" data-wow-delay="1s">
								{!! $about->content !!}
							</p>

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

				</div>
			</div>

			<div class="row mt-5">
				<div class="col-lg-11 mx-auto wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
					<div class="section-heading">
						<h2 class="title">Our Events with Futurebox - V1</h2>
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

								<p class="badge bg-primary">{{$item2->year}}</p>

							</div>

						</div>

					</div>

					@endforeach


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

						<h5 class="subtitle mb-4 lh-base">
							While We Build the Future, Here’s What We Offer Today?
						</h5>

						<h2 class="title fs-4 lh-base">
							Gamify Your Event With FutureBox Booth<br/>
							Engage. Excite. Win.
						</h2>

						<p class="text fw-semibold mb-3 mt-4">What is the FutureBox Booth?</p>
						<p class="text">
							While our tech team is busy building the <strong class="fw-semibold">next generation of pinball</strong>,
							our marketing team is already bringing the fun to you.
						</p>

						<p class="text text-white">With the <strong class="fw-semibold">FutureBox Gaming Booth,</strong> you can:</p>

					</div>

					<ul class="list-unstyled text-white wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">

						<li class="mb-2 d-flex align-items-center gap-4">
							<i class="fas fa-gamepad fs-2"></i>
							<p class="mb-0 text-white"><strong class="fw-semibold">Play Pinball on PlayStation 5</strong></p>
						</li>

						<li class="mb-2 d-flex align-items-center gap-4">
							<i class="fas fa-vr-cardboard fs-2"></i>
							<p class="mb-0 text-white">
								<strong class="fw-semibold">Try VR on Meta Quest 3</strong> - a sneak peek into where we’re headed
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

					<div class="feature-card wow animate__animated animate__fadeInUp" data-wow-delay="{{ number_format(0.2 * $loop->iteration, 2) }}s" num="1">

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
									{!!$item3->short_desc!!}
								</div>
								<ul class="checklist text-start">
									{!! str_replace(
										['<ul>', '</ul>'],
										['', ''],
										str_replace(
											['<li>', '</li>'],
											['<li>', '</li>'],
											$item3->description
										)
									) !!}
								</ul>
							</div>
						</div>

			

						<!-- Mobile content -->

						<div id="collapseOneMobile" class="collapse show d-md-none">

							<div class="feature-body">

								<div class="infoPara">

									<!-- <p>Our concept is built on <strong>proven gamification strategies</strong> designed to:</p> -->

									 {!!$item3->short_desc!!}

								</div>
								<ul class="checklist text-start">
									{!! str_replace(
										['<ul>', '</ul>'],
										['', ''],
										str_replace(
											['<li>', '</li>'],
											['<li>', '</li>'],
											$item3->description
										)
									) !!}
								</ul>

							</div>

						</div>

					</div>

				</div>

				@endforeach

			</div>

			<div class="text-center mt-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
				<a href="/event" class="mybtn1">Gamify My Event</a>
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
				<div class="col-md-6 col-lg-4 mb-4 order-2 order-lg-1 wow animate__animated animate__fadeInUp" data-wow-delay="{{ number_format(0.3 * $loop->iteration, 2) }}s">
					<div class="single-team p-4 text-center h-100">
						<div class="image">
							<img class="shape" src="{{ url('front/assets/images/team/bg.png') }}" alt="">
							<img class="member" src="{{$item4->image}}" alt="{{$item4->name}}">
						</div>
						<div class="mt-4">
							<h4>{{$item4->name}}</h4>
							<h5>{{$item4->position}}</h5>
							<p>{{$item4->qualification}}</p>
							<div class="teamDesc">
								<p>{!! $item4->content !!}</p>
							</div>
							<a href="mailto:{{$item4->email}}" class="link">
								{{$item4->email}}
							</a>
						</div>
					</div>
				</div>
				@endforeach

				<!-- Member 2 -->


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

				@foreach($blogs as $blog)
				<div class="col-lg-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="{{ number_format(0.3 * $loop->iteration, 2) }}s">
					<div class="blog-card">
						<img src="{{ $blog->image }}"
							alt="God of Space Wars">
						<div class="blog-content">
							<div class="blog-category">
								<a href="#">{{ $blog->category->name ?? 'No Category' }}</a>
							</div>
							<div class="blog-meta">
								<span>{{ date('F j, Y', strtotime($blog->publish_date)) }}</span> | <span>0 Comments</span>
							</div>
							<h5 class="blog-title">{{ $blog->title }}</h5>
							<p>{{ Str::words(strip_tags($blog->content), 20, '...') }}</p>
							<a href="{{ route('blog-detail', $blog->slug) }}" class="secondary-clr">Read More</a>
						</div>
					</div>
				</div>
				@endforeach

			</div>

			<div class="row">

				<div class="col-lg-12 mt-5 text-center wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">

					<a href="/blog" class="mybtn1">Browser All</a>

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



