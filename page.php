<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Warriors_of_the_month
 */

get_header(); ?>

	<section id="about">
		<div class="about">
			<div class="content">
				<h2>About Us</h2>
				<p>Formed in 2013, Warriors of the Month crafted their initial take on Electric Indie Rock out of Tempe, Arizona. Vocalist, Brandon Johnson, and guitarist, Gilbert Ortega, had originally met as kids in their hometown of Phoenix, Arizona, yet it wouldn't be until their college years that they would collaborate together musically. Brian Chitwood later joined the two adding his own style of introspective baselines and booming rhythms. The WOTM's sound would not be complete without the latest addition, Luis Mendez, who would bring an array of percussive works. Together, they form the unmistakable sounds of none other than Warriors of the Month.</p>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/band-pic.jpg" height="427" width="640" alt="">
			</div>
		</div>
	</section>
	<section id="shows">
		<div class="shows">
			<div class="content">
				<h2>Upcoming Shows</h2>
				<div class="scroll-container">
				<div class="scroll-holder">
					<script type='text/javascript' src='http://widget.bandsintown.com/javascripts/bit_widget.js'></script><a href="http://www.bandsintown.com/Warriors%20of%20the%20Month" class="bit-widget-initializer" data-artist="Warriors of the Month">Warriors of the Month Tour Dates</a>
				</div>
			</div>
		</div>
	</section>
	<section id="contact-us">
		<div class="contact-us">
			<div class="content">
				<h2>Contact Us</h2>

				<div class="half-box">
					<!-- <form id="contact-form">
						<p>
							<label for="name">Name</label>
							<input type="text" id="name" name="name" />
						</p>
						<p>
							<label for="email">Email</label>
							<input type="text" id="email" name="email" />
						</p>
						<p>
							<label for="message">Message</label>
							<textarea id="message" name="message"></textarea>
						</p>
						<p>
							<div class="g-recaptcha" data-sitekey="6LcMsgQTAAAAAIIBdiAvsEtBerBVxu3PCwTKc0nd"></div>
						</p>
						<p>
							<input type="submit" value="Submit" />
						</p>
					</form> -->
					<dl>	
						<dt>Email</dt>
						<dd><a href="mailto:band@warriorsofthemonth.com">band@warriorsofthemonth.com</a></dd>
						<dt>Phone</dt>
						<dd>(480) 382-2089</dd>
						<dt>Social</dt>
						<dd><a href="https://www.facebook.com/warriorsofthemonth/">Facebook</a></dd>
						<dd><a href="https://www.instagram.com/warriorsofthemonth/">Instagram</a></dd>
						<dd><a href="https://www.youtube.com/channel/UC9HkfZjHSL_Con9msEUtyMQ">Youtube</a></dd>
					</dl>
				</div>
				<div class="half-box">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact-us.jpg" class="center-block img-responsive" alt="">
				</div>
			</div>
		</div>
	</section>
<?php
get_sidebar();
get_footer();
