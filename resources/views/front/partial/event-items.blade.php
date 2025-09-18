<div class="grid-gallery mt-3">
    		@foreach($images as $image)
				<div class="grid-item {{$image['category']}}">
					<a href="{{ asset($image['image']) }}" data-fancybox="gallery" data-caption="{{$image['category']}}">
						<img src="{{ asset($image['image']) }}" alt="">
					</a>
				</div>
            @endforeach
				<!-- <div class="grid-item fuuturebox-V1">
					<a href="{{ url('front/assets/images/new/event/event-2.jpg') }}" data-fancybox="gallery" data-caption="fuuturebox-V1 Image 1">
						<img src="{{ url('front/assets/images/new/event/event-2.jpg') }}" alt="">
					</a>
				</div>
				<div class="grid-item fuuturebox-V1">
					<a href="{{ url('front/assets/images/new/event/event-3.jpg') }}" data-fancybox="gallery" data-caption="fuuturebox-V1 Image 1">
						<img src="{{ url('front/assets/images/new/event/event-3.jpg') }}" alt="">
					</a>
				</div>
				<div class="grid-item activities">
					<a href="{{ url('front/assets/images/new/event/event-4.png') }}" data-fancybox="gallery" data-caption="Activities Image 2">
						<img src="{{ url('front/assets/images/new/event/event-4.png') }}" alt="">
					</a>
				</div>
				<div class="grid-item fuuturebox-V1">
					<a href="{{ url('front/assets/images/new/event/event-5.png') }}" data-fancybox="gallery" data-caption="fuuturebox-V1 Image 2">
						<img src="{{ url('front/assets/images/new/event/event-5.png') }}" alt="">
					</a>
				</div>
				<div class="grid-item fuuturebox-V1">
					<a href="{{ url('front/assets/images/new/event/event-6.png') }}" data-fancybox="gallery" data-caption="fuuturebox-V1 Image 2">
						<img src="{{ url('front/assets/images/new/event/event-6.png') }}" alt="">
					</a>
				</div>
				<div class="grid-item fuuturebox-V1">
					<a href="{{ url('front/assets/images/new/event/event-7.png') }}" data-fancybox="gallery" data-caption="fuuturebox-V1 Image 3">
						<img src="{{ url('front/assets/images/new/event/event-7.png') }}" alt="">
					</a>
				</div>
				<div class="grid-item fuuturebox-V1">
					<a href="{{ url('front/assets/images/new/event/event-4.png') }}" data-fancybox="gallery" data-caption="fuuturebox-V1 Image 3">
						<img src="{{ url('front/assets/images/new/event/event-4.png') }}" alt="">
					</a>
				</div> -->
			</div>