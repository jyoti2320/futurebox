@extends('front.layout.main')
@section('main-section')

<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>About US </h2>
				<ul class="breadcrumb-list">
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">About Us</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Area End -->

<!-- About Area Start -->
<section class="about-section">
	<img class="s1" src="{{ url('front/assets/images/about/s1.png') }}" alt="">
	<img class="s2" src="{{ url('front/assets/images/about/s2.png') }}" alt="">
	<div class="container position-relative z-5">
		<div class="row align-items-center">
			<div class="col-lg-7">
				<div class="left-content">
					<div class="section-heading">
						<h5 class="subtitle">Our Story</h5>
						<h2 class="title">From Idea to Innovation</h2>
						{!!$about->our_story!!}
					

						<h2 class="title mt-5">About Us</h2>
						{!!$about->content!!}

					</div>
					<div class="content-list">
						<div class="s-list">
							<img src="{{ url('front/assets/images/about/i1.png') }}" alt="">
							<div class="content">
								<p>
									Interactive<br>Experiences
								</p>
							</div>
						</div>
						<div class="s-list">
							<img src="{{ url('front/assets/images/about/i2.png') }}" alt="">
							<div class="content">
								<p>
									Portable<br>Platform
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<img class="img-fluid" src="{{ $about->image }}" alt="">
			</div>
		</div>
	</div>
</section>
<!-- About Area End -->

<!-- Features Area Start -->
<section class="features-section">
	<!-- <img class="s1" src="{{ url('front/assets/images/feature/s1.png') }}" alt="">
		<img class="s2" src="{{ url('front/assets/images/feature/s2.png') }}" alt=""> -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-heading">
					<h5 class="subtitle">
						An Exhaustive List of
					</h5>
					<h2 class="title ">
						Amazing Features
					</h2>
					<h6 class="text">
						Where skill is rewarded.Join millions of players worldwide!
					</h6>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach ($features as $item1)
			<div class="col-xl-3 col-lg-4 col-md-6">
				<div class="single-feature shadow-none">
					<div class="img">
						<img class="shape" src="{{ url('front/assets/images/feature/circle.png') }}" alt="">
						<!-- <img class="icon" src="{{ url('front/assets/images/feature/icon1.png') }}" alt=""> -->
						<i class="{{$item1->icon_class}}"></i>
					</div>
					<div class="content">
						<h4>{{$item1->heading}}</h4>
						<p>{{$item1->short_desc}}</p>
					</div>
				</div>
			</div>
			@endforeach

		</div>
	</div>
</section>
<!-- Features Area End -->

<!-- Team  area start -->
<section class="team-section pb-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-heading">
					<h5 class="subtitle">
						Meet the Minds Behind FutureBox
					</h5>
					<h2 class="title ">
						Turning Vision Into Reality, One Game at a Time
					</h2>
					<h6 class="text w-lg-75 mx-auto">
						Our passionate team blends innovation and expertise to shape the future of gaming. From concept to creation, we bring bold ideas to life with precision and heart.
					</h6>
				</div>
			</div>
		</div>
		<div class="row">
			
			@foreach ($team as $item4)
				<div class="col-md-6 col-lg-4 mb-4 order-2 order-lg-1">
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
		</div>
	</div>
	<div class="container mt-5">
		<div class="row">
			<div class="col-lg-12 mt-5">
				<div class="section-heading mb-5">
					<h2 class="title ">
						Shoutout to Our Former Team
					</h2>
					<h6 class="text w-lg-75 mx-auto">
						We stand on the shoulders of:
					</h6>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul class="list-unstyled text-center mb-0">
					<li class="mb-2">
						<strong class="">Prof. Odile Limpach</strong> — Former Coach, TH Köln
						Incubator
					</li>
					<li class="mb-2">
						<strong class="">Dr. Arnulph Furmann</strong> — Former Coach
					</li>
					<li>
						<strong class="">Arthur Kehrwald</strong> — The original founder behind <strong>FutureBox Arcade V1</strong>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- Team area End -->



@endsection