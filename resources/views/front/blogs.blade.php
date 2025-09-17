
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
				@foreach($blogs as $blog)
				<div class="col-lg-4 mb-4">
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
							<a href="blog-detail/{{ $blog->id }}" class="secondary-clr">Read More</a>
						</div>
					</div>
				</div>
				@endforeach
	
	
			</div>
		</div>
	</section>

@endsection
