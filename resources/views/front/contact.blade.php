@extends('front.layout.main')
@section('main-section')

<style>
    form.newsletter-form input {
        padding: 10px 35px;
        border-radius: 50px;
        margin-top: 20px;
    }

    button.btn.nl-btn {
        background: #a830ee;
        border-radius: 50px;
        font-size: 14px;
        padding: 8px 25px;
        color: #fff;
        text-transform: uppercase;
        position: absolute;
        top: 7%;
        right: 0.5%;
        height: 84%;
    } 

    .fs-14{
        font-size: 14px
    }

    form.newsletter-form input[type=""]{}
               
  
</style>
<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area about" style="background: url({{ $headerbanner->image }});">
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
                <div class="contactFormBox" id="contact">
                    @if(session('contact_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('contact_success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('contact_error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('contact_error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <h2 class="fs-2 fw-bold mb-4 text-light text-uppercase wow animate__fadeInDown">Get in touch today!</h2>
                    <!-- <p class="mb-4 wow animate__fadeInUp">Fill out the form below to connect with our team. We’re committed to providing you with the support and guidance you need.</p> -->
                    <p class="mb-4 wow animate__fadeInUp">Do you have questions about our projects, want to collabrate, or would like to invite us to an event?</p>
                    <p class="mb-4 wow animate__fadeInUp">Send us an email to at {{$setting->email}} or simply use the contact form. we prefer to handle all inquiries for Collabrations, events, or other requests through our contact form.</p>
                    <form action="{{ route('contact-form') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3 wow animate__fadeInUp" data-wow-delay="0.3s">
                            <label class="form-label" for="fullname">Your Full Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Your Full Name" required>
                            <div class="invalid-feedback" id="fullnameError">
                                Please enter a Fullname.
                            </div>
                        </div>
                        <div class="mb-3 wow animate__fadeInUp" data-wow-delay="0.4s">
                            <label class="form-label">Your Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required>
                            <div class="invalid-feedback" id="emailError">
                                Please enter a valid Email.
                            </div>
                        </div>
                        <div class="mb-3 wow animate__fadeInUp" data-wow-delay="0.4s">
                            <label class="form-label">Furnishings</label>
                            <input type="text" class="form-control" name="furnishing" id="furnishing" placeholder="Enter Furnishings" required>
                            <div class="invalid-feedback" id="furnishingError">
                                Please enter data.
                            </div>
                        </div>
                        <div class="mb-3 wow animate__fadeInUp" data-wow-delay="0.4s">
                            <label class="form-label">Reason for inquiry</label>
                            <!-- <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required> -->
                            <select name="reason" id="reason" class="form-select" required>
                                <option value="">Select</option>
                                <option value="General Inquiries">General Inquiries</option>
                                <option value="Collabration & Partnerships">Collabration & Partnerships</option>
                                <option value="Events & pricing information">Events & pricing information</option>
                                <option value="Press & Media">Press & Media</option>
                                <option value="Other Requests">Other Requests</option>

                            </select>
                            <div class="invalid-feedback" id="reasonError">
                                Please enter Reason.
                            </div>
                        </div>
                        <div class="mb-3 wow animate__fadeInUp" data-wow-delay="0.5s">
                            <label class="form-label">News</label>
                            <textarea class="form-control" rows="4" name="message" id="message" placeholder="News" required></textarea>
                             <div class="invalid-feedback" id="messageError">
                                Please enter a News.
                            </div>
                        </div>
                        <div class="form-check mb-3 wow animate__fadeInUp" data-wow-delay="0.6s">
                            <input class="form-check-input" type="checkbox" id="consentCheck" name="consent">
                            <label class="form-check-label text-light" for="consentCheck">
                                I agree to receive emails, newsletters and promotional messages
                            </label>
                            <div class="invalid-feedback" id="consentError">
                                You must agree before submitting.
                            </div>

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


<section class="newletter-section" id="newsletter" style="background: #400861; padding-block: 60px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                @if(session('newsletter_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('newsletter_success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('newsletter_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('newsletter_error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <div class="newsletter-det">
                    <h2 class="fw-bold">Subscribe to our Newsletter</h2>
                    <p>Want to stay up to date and learn more about what’s new at Futurebox Systems? Subscribe to our newsletter and receive regular updates on our progress, exciting new projects, and insights into the world of immersive board games and VR experiences.</p>
                </div>

                <form class="newsletter-form" action="{{ route('newsletter') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10 justify-content-center">
                            <div class="position-relative">
                            <input type="email" name="email" class="w-100 form-control" placeholder="Enter your Email Address">
                            <button type="submit" class="btn nl-btn">Subscribe</button>
                        </div> 
                            <div class="d-flex">
                                <input type="checkbox" class="form-check-input  mt-4 me-3 p-0" name="agreecheck" id="agreecheck" required>
                                <label for="agreecheck"><p class="mt-3 fs-14 text-start">Yes, I would like to receive the newsletter with updates and information from Futurebox Systems. Information on revoking your consent and how your data is processed can be found in our <a href="/privacy" class="underline">privacy policy</a>. You can unsubscribe at any time by clicking the link in the footer of our emails.</p></label>
                            </div>                        
                        </div>
                    </div>                    
                </form> 
            </div>
        </div>
       
        <div class="col-md-6"> 
            
        </div>
    </div>
</section>
<script>
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>


@endsection