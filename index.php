<?php
/**
 * See .htaccess rewrite rules.
 * This index.php receives all requests to any subdirectory or file that doesn't exist (all 404's)
 *
 * For example:
 *
 * Take all subdirectory requests, such as:
 *    walkanc.org/2
 *    walkanc.org/foobar
 *
 * and rewrite them to:
 *    walkanc.org/index.php?url=2
 *    walkanc.org/index.php?url=foobar
 *
 */

// $url will either be '/' or '2'
if ( isset( $_GET['url'] ) ) {
	$url = trim( $_GET['url'], '/ ' );
}else {
	$url = '/';
}

?>
<!DOCTYPE HTML>
<!--[if IE 6]>
<html id="ie6" lang="en-US" class="ie ie6 lt-ie9">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" lang="en-US" class="ie ie7 lt-ie9">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" lang="en-US" class="ie ie8 lt-ie9">
<![endif]-->
<!--[if gte IE 9]>
<html lang="en-US" class="ie ie9">
<![endif]-->
<!--[if !(IE)]><!-->
<html lang="en-US" class="">
<!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0; minimal-ui">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="author" content="United Way of Anchorage">

	<meta property="og:title" content="Walk in My Shoes  — United Way Anchorage">
	<meta property="og:type" content="website">
	<meta property="og:url" content="http://walkanc.org">
	<meta property="og:image" content="http://walkanc.org/img/share-image.jpg">
	<meta property="og:site_name" content="Walk in My Shoes  — United Way Anchorage">
	<meta property="fb:admins" content="">

	<meta name="twitter:card" content="summary">
	<meta name="twitter:url" content="http://walkanc.org">
	<meta name="twitter:title" content="Walk in My Shoes — United Way Anchorage">
	<meta name="twitter:description" content="Experience real life examples of the difficult budget decisions some of us have to make each month. Even when you are working hard, the world can throw you some curveballs that can change your life in an instant.">
	<meta name="twitter:image" content="http://walkanc.org/img/share-image.jpg">
	<meta name="twitter:creator" content="@UnitedWay">

	<title>Walk in My Shoes — United Way</title>
	<meta name="description" content="Experience real life examples of the difficult budget decisions some of us have to make each month. Even when you are working hard, the world can throw you some curveballs that can change your life in an instant.">

	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/flowtime.css">
	<link rel="stylesheet" href="/css/custom.css">

	<link rel="shortcut icon" type="image/png"                      href="/img/favicon.png" />
	<link rel="apple-touch-icon-precomposed" 						href="/img/touch-icon-iphone.png">
	<link rel="apple-touch-icon-precomposed" 	sizes="72x72" 		href="/img/touch-icon-ipad.png">
	<link rel="apple-touch-icon-precomposed" 	sizes="114x114" 	href="/img/touch-icon-iphone-retina.png">
	<link rel="apple-touch-icon-precomposed" 	sizes="144x144" 	href="/img/touch-icon-ipad-retina.png">

	<link rel="apple-touch-startup-image" href="/img/startup-640x920.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)">
	<link rel="apple-touch-startup-image" href="/img/startup-640x1096.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)">

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

</head>
<body class="hide-header hide-footer intro loading">

	<header>
		<div class="inner">
			<p>
				<img class="logo" src="/img/logo.svg" />
				walk in my shoes
			</p>

			<button class="js-menu menu" type="button">
				<span class="hamburger"></span>
			</button>
		</div>
	</header>

	<nav>
		<ul>
			<li><a href=".">back to start</a></li>
			<li><a href="http://www.liveunitedanc.org/driving-change/what-we-care-about/" target="_blank">learn more</a></li>
			<li><a href="http://igfn.us/f/kr3/n" target="_blank" class="button donate">donate</a></li>
			<li>
				<a href="http://www.liveunitedanc.org/" target="_blank" class="logo-united-way">
					<img src="/img/logo-united-way.svg" />
				</a>
			</li>
		</ul>
	</nav>
	
	<div id="choose-path-tablet">
		<div class="cp-inner">
			<img class="choose-path-img" src="/img/choose-your-path.svg" alt="Choose Your Path" />
		</div>
	</div>

	<div id="feet">


		<div class="amanda">
			<img class="foot-left" src="/img/amanda/foot-left.svg" />
			<img class="foot-right" src="/img/amanda/foot-right.svg" />
			<img class="dress" src="/img/amanda/dress.svg" />
			<p><a class="button" href="#/amanda/1">Amanda</a></p>
		</div>
		<div class="dave">
			<img class="foot-left" src="/img/dave/foot-left.svg" />
			<img class="foot-right" src="/img/dave/foot-right.svg" />
			<p><a class="button" href="#/dave/1">Dave</a></p>
		</div>
		<div class="james">
			<img class="foot-left" src="/img/james/foot-left.svg" />
			<img class="foot-right" src="/img/james/foot-right.svg" />
			<p><a class="button" href="#/james/1">James</a></p>
		</div>
	</div>

	<div id="footer-logo">
		<div class="inner">
			<a href="http://www.liveunitedanc.org/" target="_blank">
				<img src="/img/logo-united-way.svg" />
			</a>
		</div>
	</div>

	<div id="footer">
		<div class="inner">
			<div class="name">
				<span class="var-name">
					James
				</span>
			</div>
			
			<div class="budget-toggle">

				<div class="left">
					<button class="js-menu menu" type="button">
						<span class="hamburger"></span>
					</button>
				</div>

				<div class="right">
					<div class="balance-label">Balance <span>&#9660;</span></div>

					<div class="var-balance">
						0
					</div>
				</div>

			</div>

		</div>
	</div>

	<div id="budget-table">
		<table>
			<thead>
				<tr>
					<th>Date</th>
					<th>Description</th>
					<th>Change</th>
					<th>Balance</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>

<div class="flowtime">

	<!-- Intro -->
	
	<div class="ft-section intro" data-id="intro">
		
		<div id="/intro/1" class="ft-page hide-header hide-footer show-footer-logo first" data-id="1">
			<div class="inner">
				<div class="innerer">
					
					<div class="intro-banner">
						<img src="/img/walk-in-my-shoes.svg" />
					</div>

					<p>
						<a href="#/intro/2" class="button">take a walk</a>
					</p>

				</div>
			</div>

		</div>

		<div id="/intro/2" class="ft-page intro-page hide-footer" data-id="2">
			<div class="inner">
				<div class="innerer">

					<p>
						Take a Walk In My Shoes to experience real life examples of the difficult budget decisions some of us have to make each month. Even when you are working hard, the world can throw you some curveballs that can change your life in an instant.
					</p>

					<a href="#/intro/3" class="button">continue</a>
						
				</div>
			</div>
		</div>

		<div id="/intro/3" class="ft-page intro-page hide-footer" data-id="3">
			<div class="inner">
				<div class="innerer">

					<p>
						You will select one of three people, each facing a different set of challenges, and follow their path. You will be asked to make tough choices or take a risk because just as in real life, random events happen.
					</p>

					<a href="#/intro/4" class="button">continue</a>
						
				</div>
			</div>
		</div>

		<div id="/intro/4" class="ft-page intro-page choose-path choose-path-page hide-feet hide-footer" data-id="4">
			<div class="inner">
				<div class="innerer">

					<img class="choose-path-img" src="/img/choose-your-path.svg" alt="Choose Your Path" />

					<ul>
						<li><a class="james" href="#/james/1"><img src="/img/james/shoe.svg" />James</a></li>
						<li><a class="amanda" href="#/amanda/1"><img src="/img/amanda/shoe.svg" />Amanda</a></li>
						<li><a class="dave" href="#/dave/1"><img src="/img/dave/shoe.svg" />Dave</a></li>
					</ul>

				</div>
			</div>
		</div>

	</div>

	<div class="ft-section james" data-id="james" data-name="James">

		<div id="/james/1" class="ft-page" data-id="1" data-budget-entry='{ "date": "Feb 1", "description":"Social Security Check", "amount":1800}'>
			<div class="inner">
				<div class="innerer">

					<h2>James</h2>

					<p>You are 75 years old.  As a retired widower without any family left in Alaska, your support system is meager at best. Living on a fixed income in an apartment forces you to rely on public transportation.</p>

					<p class="balance">Monthly Income: $1,800</p>

					<a href="#/james/2" class="button">Start</a>

				</div>
			</div>
		</div>

		<div id="/james/2" class="ft-page" data-id="2" data-budget-entry='{ "date": "Feb 1", "description":"Rent &amp; phone", "amount":-1100 }'>
			<div class="inner">
				<div class="innerer">
					<h2>February 1</h2>

					<p>It&#8217;s the first of the month and your fixed expenses are due: rent and phone.</p>

					<p>Subtract $1100 from your budget.<p>

					<a href="#/james/3" class="button">continue</a>
				</div>
			</div>
		</div>

		<div id="/james/3" class="ft-page" data-id="3">
			<div class="inner">
				<div class="innerer">
					<h2>February 4</h2>

					<p>It is increasingly difficult for you to navigate stairs. Unfortunately, you live in a second story apartment. You can:<p>

					<p>
						<ul class="choices">
							<li>Stay at home, hire a home health aide.</li>
							<li>Pay extra for a ground-floor apartment.</li>
						</ul>
					</p>

					<a href="#/james/4a" class="button">Stay</a>
					<a href="#/james/4b" class="button">Move</a>

				</div>
			</div>
		</div>

		<div id="/james/4a" class="ft-page" data-id="4a" data-budget-entry='{ "date": "Feb 4", "description":"Home health aide", "amount":-300 }'>
			<div class="inner">
				<div class="innerer">
					<h2>Stay at home, hire a home health aide.</h2>

					<p>The health aide costs $300 per month.</p>

					<p>Subtract $300 from your budget.</p>

					<a href="#/james/5" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/james/4b" class="ft-page" data-id="4b" data-budget-entry='{ "date": "Feb 4", "description":"New apartment", "amount":-150 }'>
			<div class="inner">
				<div class="innerer">
					<h2>Pay extra for a ground-floor apartment.</h2>

					<p>The new apartment costs $150 more than your previous apartment.</p>

					<p>Subtract $150 from your budget.</p>

					<a href="#/james/5" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/james/5" class="ft-page" data-id="5" data-budget-entry='{ "date": "Feb 8", "description":"Annual bus pass", "amount":-200 }'>
			<div class="inner">
				<div class="innerer">
					<h2>February 8</h2>

					<p>It&#8217;s time to renew your annual bus pass. The cost for seniors is $200.</p>

					<p>Subtract $200 from your budget.</p>

					<a href="#/james/6" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/james/6" class="ft-page" data-id="6">
			<div class="inner">
				<div class="innerer">
					<h2>February 15</h2>

					<p>Your health center moves to a new location with no bus service.</p>

					<p>You can: </p>

					<p>
						<ul class="choices">
							<li>See a more expensive doctor whose office is accessible via bus.</li>
							<li>Risk relying on a friend for regular transportation to your health center.</li>
						</ul>
					</p>

					<a href="#/james/7a" class="button">Doctor</a>
					<a href="#/james/7b" class="button button-risk">Risk</a>

				</div>
			</div>
		</div>

		<div id="/james/7a" class="ft-page" data-id="7a" data-budget-entry='{ "date": "Feb 15", "description":"Doctor", "amount":-150 }'>
			<div class="inner">
				<div class="innerer">
					<h2>See a more expensive doctor whose office is accessible via bus.</h2>

					 <p>Subtract $150 from your budget.</p>
 
					 <a href="#/james/8" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/james/7b" class="ft-page risk-card" data-id="7b">
			<div class="inner">
				<div class="innerer flip-container">
					
					<h2>Risk relying on a friend</h2>

					<ul class="risk flipper">
						<li class="front"><div class="cssload-main"><div class="cssload-heart"><span class="cssload-heartL"></span><span class="cssload-heartR"></span><span class="cssload-square"></span></div><div class="cssload-shadow"></div></div></li>
						<li>
							<p>Your friend reliably drives you to your doctor appointments.  Your budget stays the same.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Taxi &amp; Doctor", "amount":-200 }'>
							<p>Your friend fails to drive you to the doctor, so you spend $50 for a taxi ride.  You then decide to try a new doctor who is on the bus route, but charges $150 more than Medicaid will cover.  Subtract $200 from your budget.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Taxi", "amount":-50 }'>
							<p>Your friend drives you to one appointment, but cancels for the second. You must pay for round trip taxi to make that appointment.  Subtract $50 from your budget.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Taxi &amp; Doctor", "amount":-200 }'>
							<p>Your friend fails to drive you to the doctor, so you spend $50 for a taxi ride.</p>

							<p>You then decide to try a new doctor who is on the bus route, but charges $150 more than Medicaid will cover.  Subtract $200 from your budget.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Taxi", "amount":-50 }'>
							<p>Your friend drives you to one appointment, but cancels for the second. You must pay for round trip taxi to make that appointment.  Subtract $50 from your budget.</p>
						</li>
						<li>
							<p>Your friend reliably drives you to your doctor appointments.  Your budget stays the same.</p>
						</li>
					</ul>

					<a href="#/james/8" class="button">Continue</a>

				</div>
			</div>
		</div>

		<div id="/james/8" class="ft-page" data-id="8" data-budget-entry='{ "date": "Feb 19", "description":"Social Benefit", "amount":100}'>
			<div class="inner">
				<div class="innerer">
					<h2>February 19</h2>

					<p>You call Alaska 2-1-1, United Way&#8217;s free information and referral service, and find out you qualify for a senior benefit program.</p>

					<p>Add $100 to your budget.</p>

					<a href="#/james/9" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/james/9" class="ft-page" data-id="9">
			<div class="inner">
				<div class="innerer">
					<h2>February 22</h2>

					<p>Medicare will only cover half the cost of a new prescription you need. You can:</p>

					<p>
						<ul class="choices">
							<li>Pay the other half out-of-pocket.</li>
							<li>Risk becoming sick by only taking half the dosage.</li>
						</ul>
					</p>

					<a href="#/james/10a" class="button">Pay</a>
					<a href="#/james/10b" class="button button-risk">Risk</a>
				</div>
			</div>
		</div>

		<div id="/james/10a" class="ft-page" data-id="10a" data-budget-entry='{ "date": "Feb 22", "description":"Prescription", "amount":-200 }'>
			<div class="inner">
				<div class="innerer">
					<h2>Cover the other half out of pocket</h2>

					<p>Subtract $200 from your budget.</p>

					<a href="#/james/11" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/james/10b" class="ft-page risk-card" data-id="10b">
			<div class="inner">
				<div class="innerer flip-container">
					<h2>Risk becoming sick by only taking half the dosage</h2>

					<ul class="risk flipper">
						<li class="front"><div class="cssload-main"><div class="cssload-heart"><span class="cssload-heartL"></span><span class="cssload-heartR"></span><span class="cssload-square"></span></div><div class="cssload-shadow"></div></div></li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Prescription", "amount":-200 }'>
							<p>Taking half your dosage does nothing and you have to visit your doctor again, who convinces you to purchase the full dosage.  </p>

							<p>Subtract $200 from your budget.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Hospital stay", "amount":-500 }'>
							<p>Taking half your dosage worsens, rather than helps, your condition and you have to spend the night in the hospital. </p>

							<p>Subtract $500 for your hospital stay.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Hospital stay", "amount":-500 }'>
							<p>Taking half your dosage worsens, rather than helps, your condition and you have to spend the night in the hospital. </p>

							<p>Subtract $500 for your hospital stay.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Prescription", "amount":-200 }'>
							<p>Taking half your dosage does nothing and you have to visit your doctor again, who convinces you to purchase the full dosage.  </p>

							<p>Subtract $200 from your budget.</p>
						</li>
						<li>
							<p>Your condition is alleviated with just the half dosage of the prescription. Your budget stays the same.</p>
						</li>
						<li>
							<p>Your condition is alleviated with just the half dosage of the prescription. Your budget stays the same.</p>
						</li>
					</ul>

					<a href="#/james/11" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/james/11" class="ft-page" data-id="11" data-budget-entry='{ "date": "Feb 28", "description":"Heating bill", "amount":-200 }'>
			<div class="inner">
				<div class="innerer">

					<h2>February 28</h2>

					<p>Unusually cold temperatures in February mean your utility bill is much higher than expected.</p>

					<p>Subtract $200 from your budget.</p>

					<a href="#/james/12" class="button">Continue</a>

				</div>
			</div>
		</div>

		<div id="/james/12" class="ft-page" data-id="12">
			<div class="inner">
				<div class="innerer">
					
					<h2 class="balance">James&#8217;s Balance: <span class="var-balance">$0</span></h2>

					<p>Could you imagine living on the edge of a financial cliff each month as James is doing? Thousands of our neighbors are struggling to make ends meet as the cost of living rises. You can help keep them warm, housed and fed with your generous donation.</p>

					<a href="#/james/outro" class="button">Finish</a>

				</div>
			</div>
		</div>

		<div id="/james/outro" class="outro ft-page hide-footer hide-feet show-footer-logo" data-id="outro">
			<!-- Filled by /outro/outro -->
		</div>

	</div>

	<div class="ft-section amanda" data-id="amanda" data-name="Amanda">
		
		<div id="/amanda/1" class="ft-page" data-id="1" data-budget-entry='{ "date": "Feb 1", "description":"Paycheck &amp; Tips", "amount":2000}'>

			<div class="inner">
				<div class="innerer">

					<h2>Amanda</h2>

					<p class="smaller">You are 23 years old. Without family support, dropping out of high school was your only option when you became pregnant with your son. He is now six and your sole responsibility, leaving limited options to schedule shifts and child care with your part-time waitressing job.</p>

					<p class="balance">Monthly income: $2,000</p>

					<a href="#/amanda/2" class="button">Start</a>

				</div>
			</div>
		</div>

		<div id="/amanda/2" class="ft-page" data-id="2" data-budget-entry='{ "date": "Feb 1", "description":"Rent, phone, &amp; car", "amount":-1500 }'>
			<div class="inner">
				<div class="innerer">
					
					<h2>February 1</h2>

					<p>It&#8217;s the first of the month and your fixed expenses are due: rent, phone and car payment.</p>

					<p>Subtract $1500 from your budget.</p>

					<a href="#/amanda/3" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/amanda/3" class="ft-page" data-id="3">
			<div class="inner">
				<div class="innerer">

					<h2>February 4</h2>

					<p>You are offered full-time hours at the restaurant where you work. Which shift do you request?</p>

					<a href="#/amanda/4a" class="button">Lunch</a>
					<a href="#/amanda/4b" class="button">Dinner</a>

				</div>
			</div>
		</div>

		<div id="/amanda/4a" class="ft-page" data-id="4a" data-budget-entry='{ "date": "Feb 4", "description":"Lunch shift", "amount":800}'>
			<div class="inner">
				<div class="innerer">
					
					<h2>Lunch Shift</h2>

					<p>You work the Lunch shift.  You will earn less in tips, but your son will be in school during most of your work hours. You make an extra $1000, but now you need 2 daily hours of childcare for your son, costing $200 per month.</p>

					<p>Add $800 to your budget.</p>

					<a href="#/amanda/5" class="button">Continue</a>

				</div>
			</div>
		</div>

		<div id="/amanda/4b" class="ft-page" data-id="4b" data-budget-entry='{ "date": "Feb 4", "description":"Dinner shift", "amount":700}'>
			<div class="inner">
				<div class="innerer">
			
					<h2>Dinner</h2>

					<p>You work the dinner shift. You will earn more in tips, but will have to pay for evening childcare. </p>

					<p>You make an extra $1500, but now you need 8 daily hours of childcare for your son, costing $800 per month.</p>

					<p>Add $700 to your budget.</p>

					<a href="#/amanda/5" class="button">Continue</a>

				</div>
			</div>
		</div>

		<div id="/amanda/5" class="ft-page" data-id="5" data-budget-entry='{ "date": "Feb 8", "description":"Rent increase", "amount":-200 }'>
			<div class="inner">
				<div class="innerer">

					<h2>February 8</h2>
					
					<p>Your housing voucher to help pay rent is based on income. With the extra income from working full time, your rent increases by $200.</p>

					<p>Subtract $200 from your budget.</p>

					<a href="#/amanda/6" class="button">Continue</a>

				</div>
			</div>
		</div>

		<div id="/amanda/6" class="ft-page" data-id="6">
			<div class="inner">
				<div class="innerer">

					<h2>February 15</h2>

					<p>Your car is having trouble, especialy in this very cold weather.</p>

					<p>You can:</p>

					<p>
						<ul class="choices">
							<li>Have a mechanic fix your car.</li>
							<li>Risk not fixing your car.</li>
						</ul>
					</p>

					<a href="#/amanda/7a" class="button">Fix</a>
					<a href="#/amanda/7b" class="button button-risk">Risk</a>
				</div>
			</div>
		</div>

		<div id="/amanda/7a" class="ft-page" data-id="7a" data-budget-entry='{ "date": "Feb 15", "description":"Mechanic", "amount":-500 }'>
			<div class="inner">
				<div class="innerer">
					
					<h2>Have a mechanic fix your car.</h2>

					<p>Subtract $500 from your budget.</p>

					<a href="#/amanda/8" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/amanda/7b" class="ft-page risk-card" data-id="7b">
			<div class="inner">
				<div class="innerer flip-container">
					
					<h2>Risk not fixing your car</h2>

					<ul class="risk flipper">
						<li class="front"><div class="cssload-main"><div class="cssload-heart"><span class="cssload-heartL"></span><span class="cssload-heartR"></span><span class="cssload-square"></span></div><div class="cssload-shadow"></div></div></li>
						<li>
							<p>Your car makes it through the month without breaking down.</p>

							<p>Your budget stays the same.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Car parts", "amount":-300 }'>
							<p>You find a friend who will fix your car for the cost of parts.</p>

							<p>Subtract $300 from your budget.</p>
						</li>
						<li>
							<p>Your car makes it through the month without breaking down.</p>

							<p>Your budget stays the same.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Mechanic &amp; tow", "amount":-600 }'>
							<p>Your car breaks down on the road. You have to pay to have it fixed plus the extra for the tow. </p>
 
							<p>Subtract $600 from your budget.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Car parts", "amount":-300 }'>
							<p>You find a friend who will fix your car for the cost of parts.</p>

							<p>Subtract $300 from your budget.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Mechanic &amp; tow", "amount":-600 }'>
							<p>Your car breaks down on the road.  You have to pay to have it fixed plus the extra for the tow.</p>

							<p>Subtract $600 from your budget.</p>
						</li>
					</ul>
					
					<a href="#/amanda/8" class="button">Continue</a>

				</div>
			</div>
		</div>

		<div id="/amanda/8" class="ft-page" data-id="8" data-budget-entry='{ "date": "Feb 19", "description":"GED Prep Class", "amount":-25 }'>
			<div class="inner">
				<div class="innerer">

					<h2>February 19</h2>

					<p>You decide to take the GED prep classes.</p>

					<p>Subtract $25 from your budget.</p>

					<a href="#/amanda/9" class="button">Continue</a>

				</div>
			</div>
		</div>

		<div id="/amanda/9" class="ft-page" data-id="9">
			<div class="inner">
				<div class="innerer">
					
					<h2>February 22</h2>

					<p>You are eligible for health benefits as a full-time employee, but you have to pay part of the insurance premium.</p>

					<p>You can:</p>

					<p>
						<ul class="choices">
							<li>Give up your car and use the money for health insurance.</li>
							<li>Risk not having health insurance.</li>
						</ul>
					</p>

					<a href="#/amanda/10a" class="button">Give up Car</a>
					<a href="#/amanda/10b" class="button button-risk">Risk</a>


				</div>
			</div>
		</div>

		<div id="/amanda/10a" class="ft-page" data-id="10a">
			<div class="inner">
				<div class="innerer">
					
					<h2>Give up your car and use the money for health insurance.</h2>

					<p>Your budget stays the same.</p>

					<a href="#/amanda/11" class="button">Continue</a>

				</div>
			</div>
		</div>

		<div id="/amanda/10b" class="ft-page risk-card" data-id="10b">
			<div class="inner">
				<div class="innerer flip-container">
					
					<h2>Risk not having health insurance</h2>

					<ul class="risk flipper">
						<li class="front"><div class="cssload-main"><div class="cssload-heart"><span class="cssload-heartL"></span><span class="cssload-heartR"></span><span class="cssload-square"></span></div><div class="cssload-shadow"></div></div></li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Throat medicine", "amount":-250 }'>
							<p>You get strep throat and have to miss work to go to the doctor for medicine.</p>

							<p>Subtract $250 from your budget.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Cracked tooth", "amount":-450 }'>
							<p>You crack a tooth this month.</p>

							<p>Subtract $450 from your budget.</p>
						</li>
						<li>
							<p>You stay healthy this month.</p>

							<p>Your budget stays the same.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Cracked tooth", "amount":-450 }'>
							<p>You crack a tooth this month.</p>

							<p>Subtract $450 from your budget.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Throat medicine", "amount":-250 }'>
							<p>You get strep throat and have to miss work to go to the doctor for medicine.</p>

							<p>Subtract $250 from your budget.</p>
						</li>
						<li>
							<p>You stay healthy this month.</p>

							<p>Your budget stays the same.</p>
						</li>
					</ul>

					<a href="#/amanda/11" class="button">Continue</a>

				</div>
			</div>
		</div>

		<div id="/amanda/11" class="ft-page" data-id="11" data-budget-entry='{ "date": "Feb 28", "description":"Heating bill", "amount":-300 }'>
			<div class="inner">
				<div class="innerer">
					
					<h2>February 28</h2>

					<p>Unusually cold temperatures in February mean your utility bill is much higher than expected.</p>

					<p>Subtract $300 from your budget.</p>

					<a href="#/amanda/12" class="button">Continue</a>

				</div>
			</div>
		</div>

		<div id="/amanda/12" class="ft-page" data-id="12">
			<div class="inner">
				<div class="innerer">
					
					<h2 class="balance">Amanda&#8217;s Balance: <span class="var-balance">$0</span></h2>

					<p>Could you imagine living on the edge of a financial cliff each month as Amanda is doing? Thousands of our neighbors are struggling to make ends meet as the cost of living rises. You can help keep them warm, housed and fed with your generous donation.</p>

					<a href="#/amanda/outro" class="button">Finish</a>

				</div>
			</div>
		</div>

		<div id="/amanda/outro" class="outro ft-page hide-footer hide-feet show-footer-logo" data-id="outro">
			<!-- Filled by /outro/outro -->
		</div>

	</div>

	<div class="ft-section dave" data-id="dave" data-name="Dave">
		
		<div id="/dave/1" class="ft-page" data-id="1" data-budget-entry='{ "date": "Feb 1", "description":"Retirement &amp; wife&rsquo;s income", "amount":3000 }'>
			<div class="inner">
				<div class="innerer">
					
					<h2>Dave</h2>

					<p>You are 42 years old. When a disability forced you into early retirement, your wife picked up a part-time job. Still, your mortgage, medical bills and the needs of your three kids make it difficult to make ends meet.</p>

					<p class="balance">Monthly income: $3,000</p>

					<a href="#/dave/2" class="button">Start</a>
				</div>
			</div>
		</div>

		<div id="/dave/2" class="ft-page" data-id="2" data-budget-entry='{ "date": "Feb 1", "description":"Mortgage, phone, &amp; car", "amount":-2000 }'>
			<div class="inner">
				<div class="innerer">
					
					<h2>February 1</h2>

					<p>It&#8217;s the first of the month and your fixed expenses are due: mortgage, phone and car payment.</p>

					<p>Subtract $2,000 from your budget.</p>

					<a href="#/dave/3" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/dave/3" class="ft-page" data-id="3">
			<div class="inner">
				<div class="innerer">
					
					<h2>February 4</h2>

					<p>Your physical therapy sessions are before your wife can return from work to watch your youngest child.</p>

					<p>You can:</p>

					<p>
						<ul class="choices">
							<li>Ask your wife to leave work early</li>
							<li>Pay extra for in-home physical therapy sessions</li>
						</ul>
					</p>

					<a href="#/dave/4a" class="button">Ask</a>
					<a href="#/dave/4b" class="button">Pay</a>
				</div>
			</div>
		</div>

		<div id="/dave/4a" class="ft-page" data-id="4a" data-budget-entry='{ "date": "Feb 4", "description":"Unpaid time off", "amount":-300 }'>
			<div class="inner">
				<div class="innerer">
					
					<h2>Ask your wife to leave work early</h2>

					<p>You ask your wife to watch the kids while you’re at physical therapy. Your wife takes unpaid time off of work and her pay is reduced by $300 per month.</p>

					<p>Subtract $300 from your budget.</p>

					<a href="#/dave/5" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/dave/4b" class="ft-page" data-id="4b" data-budget-entry='{ "date": "Feb 4", "description":"Physical therapy", "amount":-400 }'>
			<div class="inner">
				<div class="innerer">
					
					<h2>Pay extra for in-home physical therapy sessions.</h2>

					<p>In-home therapy sessions cost an extra $400 per month.</p>

					<p>Subtract $400 from your budget.</p>

					<a href="#/dave/5" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/dave/5" class="ft-page" data-id="5" data-budget-entry='{ "date": "Feb 8", "description":"Grocery savings", "amount":50}'>
			<div class="inner">
				<div class="innerer">
					
					<h2>February 8</h2>

					<p>You save on your monthly grocery bill by going to a local food pantry.</p>

					<p>Add $50 to your budget.</p>

					<a href="#/dave/6" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/dave/6" class="ft-page" data-id="6">
			<div class="inner">
				<div class="innerer">
					
					<h2>February 15</h2>

					<p class="smaller">You qualify for an Earned Income Tax Credit and will get a tax refund, so you debate delaying a vet visit for your beloved dog, Jake, who has developed a mysterious growth.</p>

					<p class="smaller">You can: </p>

					<p>
						<ul class="choices smaller">
							<li>Take Jake to the vet.</li>
							<li>Risk delaying a vet visit until you receive your tax refund.</li>
						</ul>
					</p>

					<a href="#/dave/7a" class="button">Vet</a>

					<a href="#/dave/7b" class="button button-risk">Risk</a>
				</div>
			</div>
		</div>

		<div id="/dave/7a" class="ft-page" data-id="7a" data-budget-entry='{ "date": "Feb 15", "description":"Veterinarian", "amount":-200 }'>
			<div class="inner">
				<div class="innerer">
					
					<h2>Take Jake to the vet</h2>

					<p>Subtract $200 from your budget.</p>

					<a href="#/dave/8" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/dave/7b" class="ft-page risk-card" data-id="7b">
			<div class="inner">
				<div class="innerer flip-container">

					<h2>Risk delaying a vet visit</h2>

					<ul class="risk flipper">
						<li class="front"><div class="cssload-main"><div class="cssload-heart"><span class="cssload-heartL"></span><span class="cssload-heartR"></span><span class="cssload-square"></span></div><div class="cssload-shadow"></div></div></li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Veternarian", "amount":-300 }'>
							<p>Jake’s condition worsens and you are compelled to take him to the vet anyway. The delay in taking Jake to the vet allowed the growth to develop into a more expensive problem.</p>

							<p>Subtract $300 from your budget.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Veternarian", "amount":-200 }'>
							<p>Jake’s condition worsens and you are compelled to take him to the vet anyway. At the vet Jake receives treatment for $200.  </p>

							<p>Subtract $200 from your budget.</p>
						</li>
						<li>
							<p>While waiting for your tax refund to afford taking Jake to the vet, the mysterious growth disappears. You no longer need to take him to the vet.</p>

							<p>Your budget stays the same.</p>
						</li>
						<li>
							 <p>While waiting for your tax refund to afford taking Jake to the vet, the mysterious growth disappears. You no longer need to take him to the vet. </p>

							 <p>Your budget stays the same.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Veternarian", "amount":-300 }'>
							 <p>Jake’s condition worsens and you are compelled to take him to the vet anyway. The delay in taking Jake to the vet allowed the growth to develop into a more expensive problem.</p>

							 <p>Subtract $300 from your budget.</p>
						</li>
						<li data-budget-entry='{ "date": "Feb 15", "description":"Veternarian", "amount":-200 }'>
							<p>Jake’s condition worsens and you are compelled to take him to the vet anyway. At the vet Jake receives treatment for $200.</p>

							<p>Subtract $200 from your budget.</p>
						</li>
					</ul>

					<a href="#/dave/8" class="button">Continue</a>

				</div>
			</div>
		</div>

		<div id="/dave/8" class="ft-page" data-id="8" data-budget-entry='{ "date": "Feb 19", "description":"Broken ankle", "amount":-400 }'>
			<div class="inner">
				<div class="innerer">
					
					<h2>February 19</h2>

					<p>Your middle child breaks their ankle during a school basketball game.</p>

					<p>Subtract $400 from your budget.</p>

					<a href="#/dave/9" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/dave/9" class="ft-page" data-id="9">
			<div class="inner">
				<div class="innerer">

					<h2>February 22</h2>

					<p>As the temperature drops during a cold snap, you become concerned that your pipes will freeze.</p>

					<p>You can:</p>

					<p>
						<ul class="choices">
							<li>Pay to have your pipes insulated.</li>
							<li>Risk no action and hope your pipes don't freeze!</li>
						</ul>
					</p>

					<a href="#/dave/10a" class="button">Pay</a>
					<a href="#/dave/10b" class="button button-risk">Risk</a>
				</div>
			</div>
		</div>

		<div id="/dave/10a" class="ft-page" data-id="10a" data-budget-entry='{ "date": "Feb 22", "description":"Pipe insulation", "amount":-200 }'>
			<div class="inner">
				<div class="innerer">
					
					<h2>Pay to have your pipes insulated.</h2>

					<p>Subtract $200 from your budget.</p>

					<a href="#/dave/11" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/dave/10b" class="ft-page risk-card" data-id="10b">
			<div class="inner">
				<div class="innerer flip-container">

					<h2>Risk no action and hope your pipes don't freeze!</h2>

					<ul class="risk flipper">
						<li class="front"><div class="cssload-main"><div class="cssload-heart"><span class="cssload-heartL"></span><span class="cssload-heartR"></span><span class="cssload-square"></span></div><div class="cssload-shadow"></div></div></li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Frozen pipes", "amount":-400 }'>
							 <p>Your pipes freeze and it costs you $400 to have them fixed.</p>

							 <p>Subtract $400 from your budget.</p>

							 <p><a href="#/dave/11" class="button">Continue</a></p>
						</li>
						<li>
							 <p>Your pipes are fine.</p>

							 <p>Your budget stays the same.</p>

							 <p><a href="#/dave/11" class="button">Continue</a></p>
						</li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Frozen pipes", "amount":-400 }'>
							<p>Your pipes freeze and it costs you $400 to have them fixed.</p>

							<p>Subtract $400 from your budget.</p>

							<p><a href="#/dave/11" class="button">Continue</a></p>
						</li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Busted pipes", "amount":-700 }'>
							<p>Your pipes freeze and burst which costs $700 to have fixed.</p>

							<p>Subtract $700 from your budget.</p>

							<p><a href="#/dave/11" class="button">Continue</a></p>
						</li>
						<li data-budget-entry='{ "date": "Feb 22", "description":"Busted pipes", "amount":-700 }'>
							<p>Your pipes freeze and burst which costs $700 to have fixed.</p>

							<p>Subtract $700 from your budget.</p>

							<p><a href="#/dave/11" class="button">Continue</a></p>
						</li>
						<li>
							<p>Your pipes are fine.</p>

							<p>Your budget stays the same.</p>

							<p><a href="#/dave/11" class="button">Continue</a></p>
						</li>
					</ul>

				</div>
			</div>
		</div>

		<div id="/dave/11" class="ft-page" data-id="11" data-budget-entry='{ "date": "Feb 28", "description":"Heating bill", "amount":-450 }'>
			<div class="inner">
				<div class="innerer">

					<h2>February 28</h2>

					<p>Unusually cold temperatures in February mean your utility bill is much higher than expected.</p>

					<p>Subtract $450 from your budget.</p>

					<a href="#/dave/12" class="button">Continue</a>
				</div>
			</div>
		</div>

		<div id="/dave/12" class="ft-page" data-id="12">
			<div class="inner">
				<div class="innerer">

					<h2 class="balance">Dave&#8217;s Balance: <span class="var-balance">$0</span></h2>

					<p>Could you imagine living on the edge of a financial cliff each month as Dave is doing? Thousands of our neighbors are struggling to make ends meet as the cost of living rises. You can help keep them warm, housed and fed with your generous donation.</p>

					<a href="#/dave/outro" class="button">Finish</a>

				</div>
			</div>
		</div>

		<div id="/dave/outro" class="outro ft-page hide-footer hide-feet show-footer-logo" data-id="outro">
			<!-- Filled by /outro/outro -->
		</div>

	</div>

	<div class="ft-section outro" data-id="outro" data-name="outro">

		<script>
			jQuery(document).ready(function($){
				/* Copy HTML from outro below to each character's section to avoid big scroll */
				var $outro = $('.ft-section.outro > .outro'),
					$copyTo = $('.ft-section > .outro').not( $outro );

				$copyTo.each( function(){
					$(this).html( $outro.html() );
				});
			});
		</script>

		<div id="/outro/outro" class="outro ft-page hide-footer hide-feet show-footer-logo" data-id="outro">
			<div class="inner">
				<div class="innerer">
					<img class="logo-large" src="/img/logo.svg" />

					<?php if ( '2' == $url ) : ?>
						<h3 class="donate-cta">
							Please give generously today via <br/>
							your Workplace Campaign.
						</h3>
					<?php endif; ?>

					<div class="ctas">
						<?php if ( '/' == $url ) : ?>
							<a href="http://igfn.us/f/kr3/n" target="_blank" class="button donate">donate</a>
						<?php endif; ?>

						<div class="left half">
							<a href="#" class="button share">share</a>

							<a class="icon twitter" href="http://twitter.com/share?text=I%20just%20experienced%20what%20it%E2%80%99s%20like%20for%20neighbors%20trying%20to%20make%20ends%20meet.%20You%20won%E2%80%99t%20believe%20your%20eyes!%20Check%20it%20out:" target="_blank">
								<img src="/img/icon-twitter.svg" />
							</a>

							<a class="icon facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwalkanc.org%2F" target="_blank">
								<img src="/img/icon-facebook.svg" />
							</a>

							<a class="icon linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fwalkanc.org%2F&title=Walk%20in%20My%20Shoes%20%E2%80%94%C2%A0United%20Way%20Anchorage&summary=Experience%20real%20life%20examples%20of%20the%20difficult%20budget%20decisions%20some%20of%20us%20have%20to%20make%20each%20month.%20Even%20when%20you%20are%20working%20hard%2C%20the%20world%20can%20throw%20you%20some%20curveballs%20that%20can%20change%20your%20life%20in%20an%20instant.&source=walkanc.org" target="_blank">
								<img src="/img/icon-linkedin.svg" />
							</a>

						</div>
						<div class="right half">
							<a href="." class="button">start over</a>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

</div>

<script src="/js/brav1toolbox.js"></script>
<script src="/js/flowtime.js"></script>
<script src="/js/prefixfree.min.js"></script>
<script src="/js/custom.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69263227-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
