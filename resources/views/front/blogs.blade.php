
@extends('front.layout.main')
@section('main-section')
	<!-- Breadcrumb Area Start -->
	<section class="breadcrumb-area about">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2>Blogs </h2>
					<ul class="breadcrumb-list">
						<li><a href="#">Home</a></li>
						<li><a href="#">Blogs</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumb Area End -->

	<section class="about-section events-section position-relative overflow-hidden pb-0">
		<img class="s1" src="{{ url('front/assets/images/about/s1.png') }}" alt="">
		<img class="s2" src="{{ url('front/assets/images/about/s2.png') }}" alt="">

		<div class="container">
			<div class="row">
				<div class="col-lg-4 mb-4">
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
							<a href="blogs-details.html" class="mybtn1">Read More</a>
						</div>
					</div>
				</div>
	
				<!-- Card 2 -->
				<div class="col-lg-4 mb-4">
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
							<a href="blogs-details.html" class="mybtn1">Read More</a>
						</div>
					</div>
				</div>
	
				<!-- Card 3 -->
				<div class="col-lg-4 mb-4">
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
								<a href="blogs-details.html" class="mybtn1">Read More</a>
						</div>
					</div>
				</div>
	
			</div>
		</div>
	</section>

@endsection
