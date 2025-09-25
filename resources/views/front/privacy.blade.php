@extends('front.layout.main')
@section('main-section')
<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area about" style="background: url({{ $headerbanner->image }});">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Privacy Policy </h2>
				<ul class="breadcrumb-list">
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">Privacy Policy</a>
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
			<div class="col-lg-12">
				<div class="left-content">
					<div class="section-heading">
						<h5 class="subtitle">Data protection at a glance</h5>
						<h2 class="title">General information</h2>
                            The following information provides a simple overview of what happens to your personal data when
                             you visit this website. Personal data is all data that can be used to identify you personally.
                              Detailed information on data protection can be found in our privacy policy listed below this text.

						<h2 class="title mt-5">Data collection on this website</h2>
                        Who is responsible for data collection on this website?<br>
                        Data processing on this website is carried out by the website operator. You can find their contact details in the "Information on the Responsible Party" section of this privacy policy.<br><br>
                        How do we collect your data?<br>
                        Your data is collected, on the one hand, when you provide it to us. This may, for example, be data you enter into a contact form. Other data is collected automatically or with your consent when you visit the website by our IT systems. This primarily includes technical data (e.g., internet browser, operating system, or time of page access). This data is collected automatically as soon as you enter this website.<br><br>
                        What do we use your data for?<br>
                        Some of the data is collected to ensure the error-free delivery of the website. Other data may be used to analyze your user behavior.<br><br>
                        What rights do you have regarding your data?<br>
                        You have the right to obtain information about the origin, recipient, and purpose of your stored personal data free of charge at any time. You also have the right to request the correction or deletion of this data. If you have given your consent 
                        to data processing, you can revoke this consent at any time with effect for the future. You also have the right, under certain circumstances, to request the restriction of the processing of your personal data. Furthermore, you have the right to lodge a complaint with the competent supervisory authority.<br>
                        You can contact us at any time with any questions about this or other issues relating to data protection.<br>


					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- About Area End -->


@endsection