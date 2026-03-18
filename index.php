<?php get_header(); ?>

<!-- Data for Section About -->

<?php 
	// add type_post
	$post_type  = 'landing_sections';

	// push four posts with they path
	$post_header = get_page_by_path('about-header', OBJECT, $post_type);
	$post_left   = get_page_by_path('about-left', OBJECT, $post_type);
	$post_center = get_page_by_path('about-center', OBJECT, $post_type);
	$post_right  = get_page_by_path('about-right', OBJECT, $post_type);
?>

<?php if($post_header):
	$subtitle = get_post_meta($post_header->ID, 'subtitle', true);
?>

<!-- Section About -->

<section id="about" class="s_about bg_light">

	<!-- Title Section About -->
	
	<div class="section_header">
		<h2><?php echo get_the_title($post_header->ID); ?></h2>
		<?php if($subtitle): ?>
		<div class="s_descr_wrap">
			<div class="s_descr">
				<?php echo $subtitle; ?>	
			</div>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<div class="section_content">
		<div class="container">
			<div class="row">
				
				<!-- Center Colum -->

				<?php if($post_center): ?>
				<div class="col-md-4 col-md-push-4 animation_1">
					<h3><?php echo get_the_title($post_center->ID); ?></h3>
					<div class="person">
						<?php $img_url = get_the_post_thumbnail_url($post_center->ID, 'full'); ?>
						<a><img src="<?php echo $img_url; ?>" alt=" Andrii Diachenko"></a>
					</div>
				</div>
				<?php endif; ?>

				<!-- Left Colum -->

				<?php if($post_left):
					// Custom field templates for skills
					$expert_skills       = get_post_meta($post_left->ID, 'expert_skills', true);
					$basic_skills        = get_post_meta($post_left->ID, 'basic_skills', true);
					$uses_skills         = get_post_meta($post_left->ID, 'uses_skills', true);
					$framework_skills    = get_post_meta($post_left->ID, 'framework_skills', true);
					$text_editors_skills = get_post_meta($post_left->ID, 'text_editors_skills', true);
					$github_skills       = get_post_meta($post_left->ID, 'github_skills', true);
					$wordpress_skills    = get_post_meta($post_left->ID, 'wordpress_skills', true);
					$english_skills      = get_post_meta($post_left->ID, 'english_skills', true);

					// Custom fielads templates for labels
					$expert_labels       = get_post_meta($post_left->ID, 'expert_label', true);
					$basic_labels        = get_post_meta($post_left->ID, 'basic_labels', true);
					$uses_labels         = get_post_meta($post_left->ID, 'uses_labels', true);
					$framework_labels    = get_post_meta($post_left->ID, 'framework_labels', true);
					$text_editors_labels = get_post_meta($post_left->ID, 'text_editors_labels', true);
					$web_service_labels  = get_post_meta($post_left->ID, 'web_service_labels', true);
					$experience_labels   = get_post_meta($post_left->ID, 'experience_labels', true);
					$cms_labels          = get_post_meta($post_left->ID, 'cms_labels', true);
					$english_labels      = get_post_meta($post_left->ID, 'english_labels', true);
				?>

				<div class="col-md-4 col-md-pull-4 animation_2">
					<h3><?php echo get_the_title($post_left->ID); ?></h3>

					<?php echo apply_filters('the_content', $post_left->post_content); ?>

					<ul class="skill_list">
						<?php if($expert_skills): ?>
							<li>
								<span class="text-dark"><?php echo $expert_labels; ?></span>
								<span class="text-blue"><?php echo $expert_skills; ?></span>
							</li>
							<li>
								<span class="text-dark"><?php echo $basic_labels; ?></span>
								<span class="text-blue"><?php echo $basic_skills; ?></span>
							</li>
							<li>
								<span class="text-dark"><?php echo $uses_labels; ?></span>
								<span class="text-blue"><?php echo $uses_skills; ?></span>
							</li>
							<li>
								<span class="text-dark"><?php echo $framework_labels; ?></span>
								<span class="text-blue"><?php echo $framework_skills; ?></span>
							</li>
							<li>
								<span class="text-dark"><?php echo $text_editors_labels; ?></span>
								<span class="text-blue"><?php echo $text_editors_skills; ?></span>
							</li>
							<li>
								<span><?php echo $web_service_labels; ?></span>
								<span class="text-dark"><?php echo $github_skills; ?></span>
							</li>
							<li>
								<span><?php echo $experience_labels; ?></span>
								<span class="text-dark"><?php echo $cms_labels; ?></span>
								<span class="text-blue"><?php echo $wordpress_skills; ?></span>
							</li>
						<?php endif; ?>
					</ul>
					
					<p>
						<?php if($expert_skills): ?>
							<span class="eng_dark"><?php echo $english_labels; ?></span> <?php echo $english_skills ?>.
						<?php endif; ?>
					</p>
				</div>
				<?php endif; ?>

				<!-- Right Colum -->
				
				<?php if($post_right): 
					$r_id = $post_right->ID;

					// Make Fields
					$h2_name  = get_post_meta($r_id, 'h2_name', true);
					$birth    = get_post_meta($r_id, 'birth', true);
					$phone    = get_post_meta($r_id, 'phone', true);
					$email    = get_post_meta($r_id, 'email', true);
					$git_link = get_post_meta($r_id, 'git_link', true);

					// Custom Fileds for labels
					$birth_labels    = get_post_meta($r_id, 'birth_labels', true);
					$phone_labels    = get_post_meta($r_id, 'phone_labels', true);
					$email_labels    = get_post_meta($r_id, 'email_labels', true);
					$git_link_labels = get_post_meta($r_id, 'git_link_labels', true);

					// Social Fields
					$tg  = get_post_meta($r_id, 'social_tg', true);
					$git = get_post_meta($r_id, 'social_git', true);
					$in  = get_post_meta($r_id, "social_in", true);
				?>
				<div class="col-md-4 animation_3 personal_last_block">
					<h3><?php echo get_the_title($r_id); ?></h3>

					<?php if($h2_name): ?>
						<h2><?php echo $h2_name; ?></h2>
					<?php endif; ?>
					
					<ul>
						<li><?php echo esc_html($post_right->post_content); ?></li>
						<?php if($birth): ?>
							<li><?php echo $birth_labels; ?> <?php echo $birth; ?></li>
						<?php endif; ?>

						<div class="personal_info">
							<?php if($phone): ?>
								<li><?php echo $phone_labels; ?> <span><?php echo $phone; ?></span></li>
							<?php endif; ?>
							<?php if($email): ?>
								<li><?php echo $email_labels; ?> <a href="mailto:<?php echo $email; ?>"><span><?php echo $email; ?></span></a></li>
							<?php endif; ?>
							<?php if($git_link): ?>
								<li><?php echo $git_link_labels; ?> <a href="<?php echo $git_link; ?>" target="_blank"><span><?php echo $git_link; ?></span></a></li>
							<?php endif; ?>
						</div>
					</ul>

					<div class="social_wrap">
						<ul>
							<?php if($tg): ?>
								<li title="telegram"><a href="<?php echo $tg; ?>" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
							<?php endif; ?>
							<?php if($git): ?>
								<li title="github"><a href="<?php echo $git; ?>" target="_blank"><i class="fa fa-github"></i></a></li>
							<?php endif; ?>
							<?php if($in): ?>
								<li title="linkedin"><a href="<?php echo $in; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<?php endif; ?>
				
			</div>
		</div>
	</div>
</section>

<!-- Data for Section Directions -->

<?php

	// Get data posts for header and background 
	$post_type = 'landing_sections';
	$tools_header = get_page_by_path('tools-header', OBJECT, $post_type);

	// Template under photo-link 
	$parallax_img_url = ''; 

	if($tools_header):

		// Take URL photo (Featured Image)
		$parallax_img_url = get_the_post_thumbnail_url($tools_header->ID, 'full');

		// Get subtitle
		$subtitle = get_post_meta($tools_header->ID, 'subtitle', true);
?>

<!-- Section Directions --> 

<section id="directions" class="s_directions bg_direction" data-parallax="scroll" data-parallax-src="<?php echo $parallax_img_url; ?>"> 
	
	<!-- Title Section Directions -->

	<div class="section_header">
		<h2><?php echo get_the_title($tools_header->ID); ?></h2>
		<?php if($subtitle): ?>
		<div class="s_descr_wrap">
			<div class="s_descr"><?php echo $subtitle; ?></div>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<div class="section_content">
		<div class="container">
			<div class="row">
				<div id="directions_grid">

					<!-- Section Item Directions -->

					<?php
					$tools_query = new WP_Query(array(
						'post_type'      => $post_type,
						'category_name'  => 'tools',
						'posts_per_page' => -1,
						'orderby'        => 'menu_order',
						'order'          => 'ASC',
						'post__not_in'   => array($tools_header->ID)
					));

					// Start The Cycle
					if ($tools_query->have_posts()) :
						while ($tools_query->have_posts()) : $tools_query->the_post();
					?>

					<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">

						<?php
						// Get The Photo
						$img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
						if($img_url): ?>
							<img src="<?php echo $img_url ?>" alt="<?php the_title(); ?>">
						<?php endif; ?>

						<div class="mask">
							<h2><?php the_title(); ?></h2>
							<p><?php echo strip_tags(get_the_content()); ?></p>
							<ul>
								<?php
								for ($i = 1; $i <= 5; $i++) {
									$list_item = get_post_meta(get_the_ID(), 'list_item_' . $i, true);
									// if field is filled - display <li>
									if($list_item) {
										echo '<li>- ' . esc_html($list_item). '<li>';
									}
								}
								?>
								
							</ul>	
						</div>
					</div>

					<?php
						endwhile;
						wp_reset_postdata();  // Reset the data after loop!
					endif;
					?>

				</div>	
			</div>
		</div>
	</div>			
</section>

<!-- Data for Section Resume -->

<?php

	$post_type = 'landing_sections';

	$resume_header      = get_page_by_path('resume-header', OBJECT, $post_type);
	$resume_work_title  = get_page_by_path('resume-work-title', OBJECT, $post_type);
	$resume_study_title = get_page_by_path('resume-study-title', OBJECT, $post_type);
?>

<?php if($resume_header):
	$subtitle = get_post_meta($resume_header->ID, 'subtitle', true);
?>

<!-- Section Resume -->

<section id="resume" class="s_resume">

	<!-- Title Section Directions -->

	<div class="section_header">
		<h2><?php echo get_the_title($resume_header->ID); ?></h2>
		<?php if($subtitle): ?>
		<div class="s_descr_wrap">
			<div class="s_descr"><?php echo $subtitle; ?></div>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<div class="section_content">
		<div class="container">
			<div class="row">

				<!-- Icon Left Size -->

				<div class="resume_container">
					<div class="col-md-6 col-sm-6 left">
						<?php if($resume_work_title): ?>
							<h3><?php echo get_the_title($resume_work_title->ID); ?></h3>
						<?php endif; ?>
						<div class="resume_icon"><i class="icon-basic-display"></i></div>

						<!-- Left Side Resume -->

						<?php
						
							$work_query = new WP_Query(array(
								'post_type'      => $post_type,
								'category_name'  => 'resume_work',
								'posts_per_page' => -1,
								'orderby'        => 'menu_order',
								'order'          => 'ASC'
							));

							if ($work_query->have_posts() ):
								while ($work_query->have_posts() ): $work_query->the_post();
									// get custom fields
									$resume_year    = get_post_meta(get_the_ID(), 'resume_year', true);
									$resume_company = get_post_meta(get_the_ID(), 'resume_company', true);							
						?>
								
						<div class="resume_item">
							<div class="year"><?php echo esc_html($resume_year); ?></div>
							<div class="resume_description">
								<?php echo esc_html($resume_company); ?><strong><?php the_title(); ?></strong>
								<?php the_content(); ?>
							</div>
						</div>
						<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>						
					</div>

					<!-- Icon Right Size -->

					<div class="col-md-6 col-sm-6 right">
						<?php if($resume_study_title): ?>
							<h3><?php echo get_the_title($resume_study_title->ID); ?></h3>
						<?php endif; ?>
						<div class="resume_icon"><i class="icon-basic-spread-text"></i></div>

						<!-- Right Side Resume -->

						<?php
						
							$study_query = new WP_Query(array(
								'post_type'       => $post_type,
								'category_name'   => 'resume_study',
								'posts_per_page'  => -1,
								'orderby'         => 'menu_order',
								'order'            => 'ASC'
							));

							if($study_query->have_posts() ):
								while($study_query->have_posts() ): $study_query->the_post();
									// get custom fields
									$resume_year    = get_post_meta(get_the_ID(), 'resume_year', true);
									$resume_study = get_post_meta(get_the_ID(), 'resume_study', true);
						?>

						<div class="resume_item">
							<div class="year"><?php echo esc_html($resume_year); ?></div>
							<div class="resume_description">
								<strong><?php the_title(); ?></strong><?php echo esc_html($resume_study); ?>
								<?php the_content(); ?>
							</div>
						</div>
						<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Data for Section Portfolio -->

<?php
	$post_type = 'landing_sections';

	// get data for header and background
	$portfolio_header = get_page_by_path('portfolio-header', OBJECT, $post_type);
	
	$parallax_bg_url = '';
	$header_subtitle = '';

	// variables for filters and buttons in portfolio section
	$filter_all = $filter_cat1 = $filter_cat2 = $filter_cat_3 = '';
	$btn_view = $btn_site = $btn_custom = $btn_git = '';

	if($portfolio_header) {
		$parallax_bg_url = get_the_post_thumbnail_url($portfolio_header->ID, 'fill');
		$header_subtitle = get_post_meta($portfolio_header->ID, 'subtitle', true);

		// get custom fields for filters and buttons in portfolio section
		$filter_all  = get_post_meta($portfolio_header->ID, 'filter_all', true);
		$filter_cat1 = get_post_meta($portfolio_header->ID, 'filter_cat1', true);
		$filter_cat2 = get_post_meta($portfolio_header->ID, 'filter_cat2', true);
		$filter_cat3 = get_post_meta($portfolio_header->ID, 'filter_cat3', true);

		$btn_view   = get_post_meta($portfolio_header->ID, 'btn_view', true);
		$btn_site   = get_post_meta($portfolio_header->ID, 'btn_site', true);
		$btn_custom = get_post_meta($portfolio_header->ID, 'btn_custom', true);
		$btn_git    = get_post_meta($portfolio_header->ID, 'btn_git', true);
	}
?>
				
<!-- Section Portfolio -->

<section id="portfolio" class="s_portfolio bg_dark" data-parallax-image="<?php echo $parallax_bg_url; ?>">

	<!-- Title Section Portfolio -->	
		
	<?php if($portfolio_header): ?>
	<div class="section_header">
		<h2><?php echo get_the_title($portfolio_header->ID); ?></h2>
		<?php if($header_subtitle): ?>
		<div class="s_descr_wrap">
			<div class="s_descr"><?php echo esc_html($header_subtitle); ?></div>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<!-- Types of Jobs -->

	<div class="section_content">
		<div class="container">
			<div class="row">
				<div class="filter_div controls">
					<ul>
						<?php if($filter_all): ?>
							<li class="filter active" data-filter="all"><?php echo esc_html($filter_all); ?></li>
						<?php endif; ?>

						<?php if($filter_cat1): ?>
							<li class="filter" data-filter=".category-1"><?php echo esc_html($filter_cat1); ?></li>
						<?php endif; ?>

						<?php if($filter_cat2): ?>
							<li class="filter" data-filter=".category-2"><?php echo esc_html($filter_cat2); ?></li>
						<?php endif; ?>

						<?php if($filter_cat3): ?>
							<li class="filter" data-filter=".category-3"><?php echo esc_html($filter_cat3); ?></li>
						<?php endif; ?>
					</ul>

					<!-- Short Job Descriptions -->

					<div id="portfolio_grid">

						<?php 
							$portfolio_query = new WP_Query(array(
								'post_type'      => $post_type,
								'category_name'  => 'portfolio',
								'posts_per_page' => -1,
								'orderby'        => 'menu_order',
								'order'          => 'ASC',
								'post__not_in'   => $portfolio_header ? array($portfolio_header->ID) : array()
							));

							if ($portfolio_query->have_posts()) :
								while ($portfolio_query->have_posts()) : $portfolio_query->the_post();

								$filter_class  = get_post_meta(get_the_ID(), 'filter_class', true);
								$item_subtitle = get_post_meta(get_the_ID(), 'item_subtitle', true);
								$link_git      = get_post_meta(get_the_ID(), 'link_git', true);
								$link_site     = get_post_meta(get_the_ID(), 'link_site', true);
								$link_custom   = get_post_meta(get_the_ID(), 'link_custom', true);
								$item_img_url  = get_the_post_thumbnail_url(get_the_ID(), 'full');

						?>

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port <?php echo esc_attr($filter_class); ?>">
							<img src="<?php echo  esc_url($item_img_url); ?>" alt="<?php the_title(); ?>">

							<div class="port_item_cont">
								<h3><?php the_title(); ?></h3>
								<p><?php echo esc_html($item_subtitle); ?></p>
								<button class="popup_content"><?php echo esc_html($btn_view); ?></button>
							</div>

							<!-- Popup Hidden Window -->
							 
							<div class="hidden">
								<div class="podrt_descr">
									<div class="modal-box-content">
										<button class="mfp-close" type="button" title="Close (Esc)">×</button>
										<h3><?php the_title(); ?></h3>

								<?php if($link_site && $btn_site): ?>
									<a href="<?php echo esc_url($link_site); ?>" target="_blank"><?php echo esc_html($btn_site); ?></a>
								<?php endif; ?>

								<?php if($link_custom && $btn_custom): ?>
									<a href="<?php echo esc_url($link_custom); ?>" target="_blank"><?php echo esc_html($btn_custom); ?></a>
								<?php endif; ?>
								
								<?php if($link_git && $btn_git): ?>
									<a href="<?php echo esc_url($link_git); ?>" target="_blank"><?php echo esc_html($btn_git); ?></a>
								<?php endif; ?>

										<div class="portfolio_description">
											<?php the_content(); ?>
										</div>

										<img src="<?php echo esc_url($item_img_url); ?>" alt="<?php the_title(); ?>">
									</div>
								</div>
							</div>
						</div>
						<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

	<!-- Data for Section Resume -->
	<?php
		$post_type = 'landing_sections';
		$contacts_header     = get_page_by_path('contacts-header', OBJECT, $post_type);
		$contacts_left_size  = get_page_by_path('contacts-left-size', OBJECT, $post_type);
		$contacts_right_size = get_page_by_path('contacts-right-size', OBJECT, $post_type);
	
		if($contacts_header):
			$subtitle = get_post_meta($contacts_header->ID, 'subtitle', true);

			// Contacts Custom Fields
			$phone_title = get_post_meta($contacts_left_size->ID, 'phone_title', true);
			$phone_val   = get_post_meta($contacts_left_size->ID, 'phone_val', true);
			$email_title = get_post_meta($contacts_left_size->ID, 'email_title', true);
			$email_val   = get_post_meta($contacts_left_size->ID, 'email_val', true);

			// Social Links
			$social_title = get_post_meta($contacts_left_size->ID, 'social_title', true);
			$tg_text 	  = get_post_meta($contacts_left_size->ID, 'tg_text', true);
			$tg_url       = get_post_meta($contacts_left_size->ID, 'tg_url', true);
			$gh_text      = get_post_meta($contacts_left_size->ID, 'gh_text', true);
			$gh_url       = get_post_meta($contacts_left_size->ID, 'gh_url', true);
			$li_text      = get_post_meta($contacts_left_size->ID, 'li_text', true);
			$li_url       = get_post_meta($contacts_left_size->ID, 'li_url', true);

			// Form Custom Fields
			$form_action      = get_post_meta($contacts_right_size->ID, 'form_action', true);
			$label_name   	  = get_post_meta($contacts_right_size->ID, 'label_name', true);
			$placeholder_name = get_post_meta($contacts_right_size->ID, 'placeholder_name', true);
			$error_name       = get_post_meta($contacts_right_size->ID, 'error_name', true);

			$label_email       = get_post_meta($contacts_right_size->ID, 'label_email', true);
			$placeholder_email = get_post_meta($contacts_right_size->ID, 'placeholder_email', true);
			$error_email       = get_post_meta($contacts_right_size->ID, 'error_email', true);

			$label_message       = get_post_meta($contacts_right_size->ID, 'label_message', true);
			$placeholder_message = get_post_meta($contacts_right_size->ID, 'placeholder_message', true);
			$error_message       = get_post_meta($contacts_right_size->ID, 'error_message', true);
			$btn_submit 		 = get_post_meta($contacts_right_size->ID, 'btn_submit', true);
	?>	

    <!-- Section Contacts -->

	<section id="contacts" class="s_contacts bg_light">
		<div class="section_header">
			<h2><?php echo get_the_title($contacts_header->ID); ?></h2>
			<?php if($subtitle): ?>
			<div class="s_descr_wrap">
				<div class="s_descr"><?php echo esc_html($subtitle); ?></div>
			</div>
			<?php endif; ?>
		</div>

		<!-- Submission Form -->

		<div class="section_content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6">

						<?php if($phone_val): ?>
						<div class="contact_box">
							<i class="contacts_icon icon-basic-smartphone"></i>
							<h3><?php echo esc_html($phone_title); ?></h3>
							<p><?php echo esc_html($phone_val); ?></p>
						</div>
						<?php endif; ?>

						<?php if($email_val): ?>
						<div class="contact_box">
							<i class="contacts_icon icon-basic-mail"></i>
							<h3><?php echo esc_html($email_title); ?></h3>
							<p><?php echo esc_html($email_val); ?></p>
						</div>
						<?php endif; ?>

						<div class="contact_box">
							<i class="contacts_icon icon-basic-webpage-img-txt"></i>
							<h3><?php echo esc_html($social_title); ?></h3>
							<?php if($tg_url): ?>
								<p><a href="<?php echo esc_url($tg_url); ?>" target="_blank"><?php echo esc_html($tg_text); ?></a></p>
							<?php endif; ?>
							<?php if($gh_url): ?>
								<p><a href="<?php echo esc_url($gh_url); ?>" target="_blank"><?php echo esc_html($gh_text); ?></a></p>
							<?php endif; ?>
							<?php if($li_url): ?>
								<p class="last_contact"><a href="<?php echo esc_url($li_url); ?>" target="_blank"><?php echo esc_html($li_text); ?></a></p>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<form action="<?php echo esc_url($form_action); ?>" class="main_form" novalidate target="_blank" method="POST">
							<label class="form-group">
								<span class="color_element">*</span> <?php echo esc_html($label_name); ?>:
								<input type="text" name="name" placeholder="<?php echo esc_attr($placeholder_name); ?>" data-validation-required-message="<?php echo esc_attr($error_name); ?>" required />
								<span class="help-block"></span>
							</label>
							<label class="form-group">
								<span class="color_element">*</span> <?php echo esc_html($label_email); ?>:
								<input type="email" name="email" placeholder="<?php echo esc_attr($placeholder_email); ?>" data-validation-required-message="<?php echo esc_attr($error_email); ?>" required />
								<span class="help-block"></span>
							</label>
							<label class="form-group">
								<span class="color_element">*</span> <?php echo esc_html($label_message); ?>:
								<textarea name="message" placeholder="<?php echo esc_attr($placeholder_message); ?>" data-validation-required-message="<?php echo esc_attr($error_message); ?>" required></textarea>
								<span class="help-block"></span>
							</label>
							<button><?php echo esc_html($btn_submit); ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

    <?php get_footer(); ?>