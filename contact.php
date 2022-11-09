<?php 
include("header.php"); 
?>
<div id="container" class="contact">
	<div class="banner">
		<img src="img/bg01.png" alt="bg01">
	</div>
	<div id="wrapper">
		<h1 class="title01" data-aos="zoom-out" data-aos-duration="500">Contact</h1>
		<div class="officeBlog">
			<h2 class="title02" data-aos="zoom-in-up" data-aos-duration="500">Our Office</h2>
			<p data-aos="zoom-in" data-aos-duration="500">Call us crazy, but we believe being a product of our environment can be a good thing. At our headquarters in Springfield, MO, our collaborative spaces flow one into the next. The open, airy feel keeps our heads in the game. The natural light gives us our much needed daily dose of Vitamin D. And we’re so obsessed with writing on whiteboards that a few of them have gone mobile.</p>
			<img src="img/contact01.png" alt="contact01" data-aos="flip-right" data-aos-duration="500">
		</div>
		<div class="reachBlog">
			<h2 class="title02" data-aos="fade-down" data-aos-duration="500">Reach us by phone</h2>
			<p data-aos="fade-right" data-aos-duration="500">Give us a call. We're here for you 24/7.</p>
			<p data-aos="fade-right" data-aos-duration="500">Booking flights? Flights booked by phone are subject to a $25 fee. Skip the fee by booking at Peacook Food Delivery.</p>
			<p data-aos="fade-right" data-aos-duration="500">Please note that some international numbers may not work from mobile phones.</p>
		</div>
		<div class="contactLocation">
			<h1 class="title01">Our location</h1>
			<p>No. 233-B, Second Floor, Insein Road.</p>
			<p>Hlaing Township. Yangon</p>
			<p>Phone: <a href="tel:09694380024">09694380024</a>, <a href="tel:09438557155"> 09438557155</a></p>
			<p>email: <a href="mailto:peacook2020@gmail.com">peacook2020@gmail.com</a></p>
		</div>

		<div id="mail" class="contactForm">
			<h2 class="title01" data-aos="zoom-out" data-aos-duration="500">Contact As</h2>
			<form action="mail.php" method="post" data-aos="flip-down" data-aos-duration="500">
				<div class="contactRow">
					<label>Name*</label>
					<input type="text" name="name" required>
				</div>
				<div class="contactRow">
					<label>E-mail*</label>
					<input type="text" name="mail" required>
				</div>
				<div class="contactRow">
					<label>Message</label>
					<textarea name="message"></textarea>
				</div>
				<div class="mailBtn">
					<input type="submit" name="send" value="Send" class="btn01">
				</div>
			</form>
		</div>
		
	</div><!-- wrapper -->
</div><!-- content -->
<?php 
include("top_footer.php");
?>