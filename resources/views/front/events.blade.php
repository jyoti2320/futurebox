	
@extends('front.layout.main')
@section('main-section')

	<!-- Breadcrumb Area Start -->
	<section class="breadcrumb-area about">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2>Events </h2>
					<ul class="breadcrumb-list">
						<li><a href="#">Home</a></li>
						<li><a href="#">Events</a></li>
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
			<!-- Filter buttons -->
			<div class="filter-buttons">
				<button class="filter-btn active" data-filter="all">All</button>
                @foreach($events as $event)
				    <button class="filter-btn" data-filter="{{$event->name}}">{{$event->name}}</button>
                @endforeach
				<!-- <button data-filter="fuuturebox-V1">Futurebox V1</button> -->
			</div>
			<div class="gallery">
                <div class="grid-gallery mt-3"></div>
            </div>

			<div class="text-center mt-4">
				<button id="loadMoreBtn" class="mybtn1 border-0">
					Load More
				</button>
			</div>
		</div>
	</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let currentCategory = 'all';
let currentPage = 1;
$(document).ready(function () {
    // Initial load
    loadImages(true);
    // Filter buttons
    $('.filter-btn').on('click', function () {
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        currentCategory = $(this).data('filter');
        currentPage = 1;
        loadImages(true);
    });
    // Load more
    $('#loadMoreBtn').on('click', function () {
        currentPage++;
        loadImages();
    });
});
function loadImages(reset = false) {
    $.ajax({
        url: "{{ route('event.load') }}",
        data: { category: currentCategory, page: currentPage },
        success: function (data) {
            if (reset) {
                $('.grid-gallery').html(data.html);
                $('#loadMoreBtn').hide();
            } else {
                $('.grid-gallery').append(data.html);
            }
            // Show/Hide load more
            if (!data.hasMore) {
                $('#loadMoreBtn').hide();
            } else {
                $('#loadMoreBtn').show();
            }
            // Re-init lightbox if needed
            // if (typeof GLightbox !== 'undefined') {
            //     GLightbox({ selector: '.glightbox' });
            // }
            // fancybox/lightbox reinit
            if ($.fancybox) {
                $('[data-fancybox="gallery"]').fancybox();
            }

        }
    });
}
</script>
@endsection

