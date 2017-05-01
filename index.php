<!DOCTYPE html>
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

		<meta charset="UTF-8" />
		<title>Eric Waight</title>
		<meta name="description" content="Welcome to my website">
		<meta name="viewport" content="width=device-width">

		<link rel="icon" type="image/png" href="/favicon.png" />

		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<link rel="stylesheet" href="/css/normalize.css" />
		<link rel="stylesheet" href="/css/main.css" />
		<link rel="stylesheet" href="/css/responsive.css" />

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script src="/js/site.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>

	<body>
		<header class="group">
    <div class="wrap">
	    <h1><a href="#home">Eric Waight</a></h1>
	    <div id="header-right">
	       	<div id="nav-icon"></div>
		    <nav>
			    <a href="#about">About Me</a>
			    <a href="#experience">Experience</a>
			    <a href="#contact">Contact</a>
					<a href="https://github.com/ewaight12" target="_blank">GitHub</a>
		    </nav>
	    </div>
    </div>
</header>

<div id="home">

    <div id="banner-content" class="wrap">
        <h2><span>string welcomemessage = "Hello There";</span></h2>
        <a class="button" href="#contact">Contact Me</a>
<!--         <a href="#who" class="arrow"><img src="/img/down-arrow.png" alt="" width="57" height="57"></a> -->
    </div>

</div>

<section id="about" class="group">
    <div class="wrap">
	    <h3>Who am<span> ['I']?</span></h3>
	    <p class="first-p">My pets, my girlfriend, friends, and traveling.  These are just a few things I am passionate about.  After 5 years running my own startup company I have chosen to start a new path as a web and software developer.  I especially like learning C#, Ruby, HTML, and CSS.  I look forward to expanding my knowledge and building interesting things! </p>
		<img src="/img/who.jpg" alt="" width="960" height="259"/>
    </div>
</section>

<section id="experience" class="group">
    <div class="wrap">
	    <h3>Experience</h3>
	    <p class="firstp">Below is some information about my relevant experience.</p>

<div id="experience-info">
	
<img src="/img/cintacslogo.png" alt="" width="240" height="59"/>

<h2>CINTACS Corporation</h2>

<p>My friend and business partner started our company CINTACS in 2011 with the principle that we would provide custom software and websites based on the needs of our clients.  My first role in the company was to start building out a sales and marketing structure as well as cultivate relationships with potential clients.</p>

<p>As our company grew, my role was morphed into that of Director of Operations, not only did I run the day to day operations of the company but was also responsible for organizing and managing the lifecycle of our projects, which ranged from graphics to websites and enterprise level software applications.</p>

<p>As CINTACS reached it's peak with 8 employees and .5 million in revenue, I realized that I was extremely interested in learning to code.  Which led me to my next step in life.</p>

<img src="/img/academylogo.png" alt="" width="110" height="105"/>

<h2>Academy Pittsburgh</h2>

<p><a href="https://twitter.com/academypgh" target="_blank">@AcademyPGH</a> provides condensed and practical technology skill building that fills gaps in our region’s freelance, business, startup, and nonprofit talent pools. Sessions are created to service the objectives of partner organizations including, but not limited to, creating a more impactful and inclusive technology ecosystem.</p>

<p>As an APGH graduate I have learned and gained real world experience in Ruby, C#, Javascript, and HTML/CSS through project-based learning and a rigorous curriculum.</p>

</div><!--end experience-info-->
</section>

<section id="contact" class="group">
    <div class="wrap">
	    <h3>Have a question?<span> Contact Me</span></h3>
	    <ul class="group">
	       	<li id="phone-no">412-853-8509</li>
	       	<li><a href="mailto:ewaight12@gmail.com" id="email">Email</a></li>
	       	<li><a href="https://www.facebook.com/ericwaight" target="_blank" id="fb">Facebook</a></li>
	       	<li><a href="https://www.linkedin.com/in/ericwaight/" target="_blank" id="linkedin"></a></li>
	    </ul>

<form action="/contact_form.php" onsubmit="send_email(); return false;" id="contact-form" method="post" name="contact-form" target="frame_hidden">
	<div id="form-left">
	       		<p class="req">* Required fields</p>
		       	<label for="name">Your Name <span>*</span></label>
                <input id="name" name="name" type="text" value="" required />

		       	<label for="phone">Your Phone Number</label>
                <input id="phone" name="phone" type="text" value="" />

                <label for="c-email">Your Email <span>*</span></label>
                <input id="c-email" name="c-email" type="email" value="" required/>
	</div>

	       	<div id="form-right">
	       		<label for="msg">Your Message <span>*</span></label>
                <textarea id="msg" name="msg" required />
</textarea>
				<div class="g-recaptcha" data-sitekey="6LfbWh8UAAAAAJIDIYoQ9yZ3_ZDTWxC00-A5-wwZ"></div>

                <input type="submit" id="contact-btn" value="Send Message" class="button" />
	       	</div>
</form>
        <!-- div for contact form success message -->
		<div class="result_success"></div>
		<div class="result_error"></div>

    </div>
</section>

        <footer class="group">
            <div class="wrap">
                <div id="footer-left">
                    <p>Copyright &copy; <?php echo date("Y"); ?>  Eric Waight All Rights Reserved.</p>
                </div>
            </div>
        </footer>

        <!-- hidden iframe for contact form submission -->
	<iframe name="frame_hidden" style="display: none;"></iframe>

<script>
function send_email() {
	$.post('/contact_form.php', $('#contact-form').serialize(), function(data) {
		console.log(data);
		if (data === '1') {
			// Mail sent
			$('#contact-form').fadeOut();
			$('.result_error').html('');
			$('.result_success').html('Thank you for contacting me!');
		} else if (data === '2') {
			// Something wrong with mail server, error 'failed to send'
			$('.result_error').html('Error sending the mail, please email us at <a href="mailto:ewaight12@gmail.com">ewaight12@gmail.com</a>');
			$('.result_success').html('');
		} else if (data === '3') {
			// Form did not validate
			$('.result_error').html('Please complete all fields correctly!');
			$('.result_success').html('');
		} else {
			console.log(data);
		}
	});

	return false;
}
</script>


	</body>
</html>
