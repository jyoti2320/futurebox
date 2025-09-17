
	
	<!-- How play area start -->
	<section class="how-to-play pt-5">
		<img class="left-img" src="{{ url('front/assets/images/h-play/left-img.html') }}" alt="">
		<img class="right-img" src="{{ url('front/assets/images/h-play/right-img.html') }}" alt="">
		<div class="subscribe-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="subscribe-box">
							<!-- <img class="left" src="{{ url('front/assets/images/vr.png') }}" alt="">
							<img class="right" src="{{ url('front/assets/images/game%20controler_.png') }}" alt=""> -->
							<div class="row justify-content-center">
								<div class="col-lg-12">
									<div class="heading-area">
										<h5 class="sub-title text-white">
											Have Questions:
										</h5>
										<h4 class="title mb-4">
											Reach out to us
										</h4>
										<a href="/contact" class="mybtn1 mt-0">Get in touch</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- How play area  end -->	
<!-- Footer Area Start -->
<footer class="footer">
  <div class="container">
    <div class="d-flex justify-content-between flex-wrap">
      
      <!-- Logo + Social -->
      <div class="wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
        <img class="img-fluid footerLogo" src="{{ $setting->logo }}" alt="">
        <div class="social-links mt-4">
          <ul class="text-start">
            @if(!empty($setting->fb_link))<li><a href="{{ $setting->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>@endif
            @if(!empty($setting->twitter_link))<li><a href="{{ $setting->twitter_link }}"><i class="fab fa-twitter"></i></a></li>@endif
            @if(!empty($setting->yb_link))<li><a href="{{ $setting->yb_link }}"><i class="fab fa-youtube"></i></a></li>@endif
            @if(!empty($setting->linkedin_link))<li><a href="{{ $setting->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a></li>@endif
            @if(!empty($setting->insta_link))<li><a href="{{ $setting->insta_link }}"><i class="fab fa-instagram"></i></a></li>@endif
          </ul>
        </div>
      </div>

      <!-- Useful Links -->
      <div class="wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
        <h4>Useful Links</h4>
        <ul class="list-unstyled">
          <li><a href="/about">About Us</a></li>
          <li><a href="/event">Events</a></li>
          <li><a href="/blog">Blogs</a></li>
          <li><a href="/contact">Contact Us</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
        <h4>Contact Us</h4>
        <p><i class="fas fa-phone me-2 secondary-clr"></i> <strong>+{{ $setting->phone1 }}</strong></p>
        <p><i class="fas fa-envelope me-2 secondary-clr"></i> {{ $setting->email }}</p>
        <p class="d-flex gap-3">
          <i class="fas fa-map-marked-alt secondary-clr"></i>
          <span>{{ $setting->website_name }}<br>{{ $setting->address }}</span>
        </p>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
      <p>Futurebox Systems © 2025. All Rights Reserved</p>
    </div>
  </div>
</footer>

<!-- Back to Top Start -->
<div class="bottomtotop">
	<i class="fas fa-chevron-right"></i>
</div>
<!-- Back to Top End -->
