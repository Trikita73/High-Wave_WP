	<!-- Data for Section Resume -->

	<?php
		$post_type = 'landing_sections';
		$footer_section = get_page_by_path('footer_section', OBJECT, $post_type);

		if($footer_section): 

			// Footer Custom Fields
			$copyright_name = get_post_meta($footer_section->ID, 'copyright_name', true);
			$copyright_year = get_post_meta($footer_section->ID, 'copyright_year', true);

			// Social Links
			$tg_link  = get_post_meta($footer_section->ID, 'tg_link', true);
			$git_link = get_post_meta($footer_section->ID, 'git_link', true);
			$in_link  = get_post_meta($footer_section->ID, 'in_link', true);
	?>
	
	<!-- Footer + copyrignt -->

	<footer class="main_footer bg_dark">
		<div class="container">
			<div class="col-md-12">
				<div class="footer_copyright">

					<!-- Years -->

					<?php if($footer_section): ?>
					<div class="copyright">
						<?php echo esc_html($copyright_year); ?>
						<script type="text/javascript">
							document.write(new Date().getFullYear());
						</script>  

						<!--ANDRII DIACHENKO-->
						<?php echo esc_html($copyright_name); ?>
					</div>
					<?php endif; ?>
					
					<!-- Social -->

					<?php if($footer_section): ?>
					<div class="social_wrap footer_social">
						<ul>
							<li title="telegram"><a href="<?php echo esc_url($tg_link); ?>" target="_blank"><i class="fa fa-telegram"></i></a></li>
							<li title="github"><a href="<? echo esc_url($git_link); ?>" target="_blank"><i class="fa fa-github"></i></a></li>
							<li title="linkedin"><a href="<?php echo esc_url($in_link); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>	
		</div>
	</footer>
	<?php endif; ?>




    <?php wp_footer(); ?>
	
	<!-- Internal Cache -->

	<div class="hidden"></div>

	<!-- Scroll Top -->

	<aside id="s_top">
		<button class="top_button">
			<i class="fa fa-chevron-up"></i>
		</button>
	</aside>	

</body>
</html>