@extends('front.layout.main')
@section('main-section')
<!-- Breadcrumb Area Start -->
 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<section class="breadcrumb-area about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Contact </h2>
				<ul class="breadcrumb-list">
					<li><a href="#">Home</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Area End -->

<section class="contactSection">
    <img class="s1 position-absolute top-0 start-0 z-1 opacity-25" src="{{ url('front/assets/images/about/s1.png') }}" alt="">
    <img class="s2 position-absolute top-0 end-0 z-1 opacity-25" src="{{ url('front/assets/images/about/s2.png') }}" alt=""> 
    <div class="container position-relative z-99">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 mb-4 wow animate__fadeInUp" data-wow-delay="0.2s">
                <div class="contactFormBox">
                    <h2 class="fs-2 fw-bold mb-4 text-light text-uppercase wow animate__fadeInDown">Get in touch today!</h2>
                    <p class="mb-4 wow animate__fadeInUp">Fill out the form below to connect with our team. We’re committed to providing you with the support and guidance you need.</p>
                    <form action="{{ route('contact-form') }}" method="post">
                        @csrf
                        <div class="mb-3 wow animate__fadeInUp" data-wow-delay="0.3s">
                            <label class="form-label">Your Full Name</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Enter Your Full Name">
                        </div>
                        <div class="mb-3 wow animate__fadeInUp" data-wow-delay="0.4s">
                            <label class="form-label">Your Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
                        </div>
                        <div class="mb-3 wow animate__fadeInUp" data-wow-delay="0.5s">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="4" name="message" placeholder="Enter Your Message"></textarea>
                        </div>
                        <div class="form-check mb-3 wow animate__fadeInUp" data-wow-delay="0.6s">
                            <input class="form-check-input" type="checkbox" id="consentCheck">
                            <label class="form-check-label text-light" for="consentCheck">
                                I agree to receive emails, newsletters and promotional messages
                            </label>
                        </div>
                        <button type="submit" class="mybtn1 border-0 mt-4 wow animate__pulse" data-wow-delay="0.7s">SEND MESSAGE</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 wow animate__fadeInRight" data-wow-delay="0.3s">
                <div class="px-4">
                    <div class="mb-5 wow animate__fadeInUp" data-wow-delay="0.4s">
                        <h5 class="fs-2 text-uppercase fw-bold">Call Us</h5>
                        <p class="my-3">Call us today for personalized coaching and transformative growth!</p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width:40px; height:40px;">
                                <i class="fas fa-phone"></i>
                            </div>
                            <span class="fw-bold primary-clr">
                                <a href="tel:+4917677208995" class="text-decoration-none text-light">+{{$setting->phone1}}</a>
                            </span>
                        </div>
                    </div>

                    <div class="border-bottom border-top border-light border-opacity-25 py-5 mb-5 wow animate__fadeInUp" data-wow-delay="0.5s">
                        <h5 class="fs-2 text-uppercase fw-bold">Email Us</h5>
                        <p class="my-3">Email us now for expert coaching and tailored growth solutions!</p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width:40px; height:40px;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <a href="mailto:{{$setting->email}}" class="text-decoration-none primary-clr text-light fw-bold">{{$setting->email}}</a>
                        </div>
                    </div>

                    <div class="wow animate__fadeInUp" data-wow-delay="0.6s">
                        <h5 class="fs-2 text-uppercase fw-bold">Visit Us</h5>
                        <p class="my-3">Visit us for personalized coaching and guidance toward lasting success!</p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width:40px; height:40px;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span class="fw-bold">{{$setting->address}}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection