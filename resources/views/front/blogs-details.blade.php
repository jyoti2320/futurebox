
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
						<li><a href="#">{{$blogsDetails->category->name}}</a></li>
						<li><a href="#">{!! $blogsDetails->title !!}</a></li>

					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumb Area End -->
	
	<!-- Blog Content Section -->
	<section class="about-section events-section position-relative overflow-hidden pb-0">
		<img class="s1" src="{{ url('front/assets/images/about/s1.png') }}" alt="">
		<img class="s2" src="{{ url('front/assets/images/about/s2.png') }}" alt="">
		<div class="container">
		<div class="row">
	
			<!-- Blog Content -->
			<div class="col-md-8 blog-content">
				<img src="../{{ $blogsDetails->image }}" alt="Blog Image">
				<p>
					<!-- {!! $blogsDetails->title !!} -->
				<span class="float-right">{{ date('F j, Y', strtotime($blogsDetails->publish_date)) }}</span>
				</p>
				<p>
					{!! $blogsDetails->content !!}
				</p>
				<!-- <p class="lead">This is an example lead paragraph for the blog details page. It should be engaging and give
					readers a quick summary of the post.</p>
	
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ut dui quis libero tempor varius.
					Vivamus laoreet ipsum et ex dignissim, at tincidunt lorem eleifend. Cras bibendum nulla nec ligula
					pharetra, at malesuada lorem volutpat.</p>
	
				<h3>Subheading Example</h3>
				<p>Aliquam erat volutpat. Integer at nibh sed nunc sagittis gravida. Nulla facilisi. Fusce facilisis vel
					erat quis luctus.</p>
	
				<blockquote class="blockquote">
					<p class="mb-0">"This is a highlighted quote from the article to draw attention."</p>
					<footer class="blockquote-footer">Someone Famous</footer>
				</blockquote>
	
				<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed fermentum
					nisl at dui scelerisque bibendum.</p> -->
	
				<!-- Author Box -->
				<!-- <div class="author-box">
					<img src="{{ url('front/assets/images/new/f4.png') }}" alt="Author">
					<div>
						<h5>Ankur </h5>
						<p>Ankur is a content writer who loves to share insights on technology, design, and business growth.
						</p>
					</div>
				</div> -->
	
				<!-- Comments -->
				<!-- <div class="comment-box">
					<h4>Comments (2)</h4>
					<div class="media mb-4">
						<img src="https://cdn.pixabay.com/photo/2023/02/18/11/00/icon-7797704_640.png" class="mr-3 rounded-circle" alt="User">
						<div class="media-body">
							<h5>Aarav Sharma<small class="text-muted">- Aug 26, 2025</small></h5>
							<p>Great article! Very informative and well-written.</p>
						</div>
					</div>
					<div class="media">
						<img src="https://cdn.pixabay.com/photo/2023/02/18/11/00/icon-7797704_640.png" class="mr-3 rounded-circle" alt="User">
						<div class="media-body">
							<h5>Ishita Patel <small class="text-muted">- Aug 27, 2025</small></h5>
							<p>I learned a lot from this post. Thanks for sharing!</p>
						</div>
					</div>
				</div> -->
			</div>
	
			<!-- Sidebar -->
			<div class="col-md-4 sidebar">
				<!-- <div class="card">
					<div class="card-body">
						<h4 class="card-title">Search</h4>
						<input type="text" class="form-control" placeholder="Search blog...">
					</div>
				</div> -->
	
				<div class="card">
					<div class="card-body">
						<h4 class="card-title text-white fw-bold">Categories</h4>
						<ul class="list-unstyled mb-0">
							@foreach($blogCategory as $blogCategories1)
							<li><a href="#">{{$blogCategories1->name}}</a></li>
							@endforeach
							<!-- <li><a href="#">Development</a></li>
							<li><a href="#">Technology</a></li>
							<li><a href="#">Tips & Tricks</a></li> -->
						</ul>
					</div>
				</div>
	
				<!-- <div class="card">
					<div class="card-body">
						<h4 class="card-title">Recent Posts</h4>
						<ul class="list-unstyled mb-0">
							<li><a href="#">How to Improve Your Website</a></li>
							<li><a href="#">Top 10 Design Trends</a></li>
							<li><a href="#">The Future of Development</a></li>
						</ul>
					</div>
				</div> -->
	
			</div>
	
		</div>
		</div>
	</section>

	
@endsection
