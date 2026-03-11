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
					$tg =  get_post_meta($r_id, 'social_tg', true);
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

<section id="directions" class="s_directions bg_direction" data-parallax="scroll" data-parallax-image="<?php echo $parallax_img_url; ?>"> 
	
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

	$filter_all = $filter_cat1 = $filter_cat2 = $filter_cat_3 = '';

	if($portfolio_header) {
		$parallax_bg_url = get_the_post_thumbnail_url($portfolio_header->ID, 'fill');
		$header_subtitle = get_post_meta($portfolio_header->ID, 'subtitle', true);
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
							<li class="filter active" data-filter="all">Все работы</li>
							<li class="filter" data-filter=".category-1">Сайты</li>
							<li class="filter" data-filter=".category-2">Верстка</li>
							<li class="filter" data-filter=".category-3">Web-дизайн</li>
						</ul>

						<!-- Short Job Descriptions -->

						<div id="portfolio_grid">

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-1">
								<img src="img/portfolio/yummy_food.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>Yummy Food</h3>
									<p>Интернет магазин</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>Yummy Food</h3>
											<a href="https://trikita73.github.io/Show_Yummy_Food/">Перейти на сайт</a>
											<a href="https://github.com/Trikita73/J.S.__Jummy-Food/">Перейти в репозиторий</a>
											<p>Интернет магазин создан для реализации и доставики Корейской кухни. Разработан на базе Java Script.</p>
											<img src="img/portfolio/yummy_food.jpg" alt="Alt">
										</div>
									</div>
								</div>
							</div>

							<!-- Popup Window -->

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-2">
								<img src="img/portfolio/fairy_forest.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>Fairy Forest</h3>
									<p>Parallax Page</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>Fairy Forest</h3>
											<a href="https://trikita73.github.io/Parallax_scrolling/">Перейти к верстке</a>
											<a href="https://github.com/Trikita73/Parallax_scrolling/">Перейти в репозиторий</a>
											<p>Верстка "Landing_page" в котром используеться эффект Parallax при скроле.</p>
											<img src="img/portfolio/fairy_forest.jpg" alt="Alt">
										</div>
									</div>
								</div>
							</div>

							<!-- Popup Window -->

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-1">
								<img src="img/portfolio/empire.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>EMPIRE</h3>
									<p>Flash сайт</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>EMPIRE</h3>
											<a href="https://trikita73.github.io/Empire/">Перейти на сайт</a>
											<a href="https://github.com/Trikita73/Empire/">Перейти в репозиторий</a>
											<p>Сайт Empire – подходит для размещения своих дизайнерских работ. Хорошо адаптирован под мобильные устройства и при этом имеет приятный дизайн.</p>
											<img src="img/portfolio/empire.jpg" alt="Alt">
										</div>
									</div>
								</div>
							</div>

							<!-- Popup Window -->

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-2">
								<img src="img/portfolio/creative_scroll.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>Creative Scroll</h3>
									<p>Scroll page</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>Creative Scroll</h3>
											<a href="https://trikita73.github.io/scroll-website/">Перейти к верстке</a>
											<a href="https://github.com/Trikita73/scroll-website/">Перейти в репозиторий</a>
											<p>Верстка по типу "Landing_Page" c использованием анимации при скроле.</p>
											<img src="img/portfolio/creative_scroll.jpg" alt="Alt">
										</div>
									</div>
								</div>
							</div>

							<!-- Popup Window -->

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-1">
								<img src="img/portfolio/AFG.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>A.F.G.</h3>
									<p>Landing page</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>A.F.G.</h3>
											<a href="https://trikita73.github.io/Afg/">Перейти на сайт</a>
											<a href="https://github.com/Trikita73/Afg/">Перейти в репозиторий</a>
											<p>AFG –  landing page  сайт наглядно показывает всю важность компании. Также есть анимация и адаптация под мобильные устройства.</p>
											<img src="img/portfolio/AFG.jpg" alt="Alt">
										</div>
									</div>
								</div>
							</div>

							<!-- Popup Window -->

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-1">
								<img src="img/portfolio/yourdiss.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>YURDISS</h3>
									<p>Сайт услуг</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>YURDISS</h3>
											<a href="https://trikita73.github.io/Yurdiss">Перейти на сайт</a>
											<a href="https://github.com/Trikita73/Yurdiss/">Перейти в репозиторий</a>
											<p>Сайт созданный для оценочной компании Юрдис, предоставляющей услуги оценки недвижимости, земли, бизнеса и переоценки частных и государственых активов.</p>
											<img src="img/portfolio/yourdiss.jpg" alt="Alt">
										</div>
									</div>
								</div>
							</div>

							<!-- Popup Window -->

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-1">
								<img src="img/portfolio/smitler.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>SMITLER</h3>
									<p>Landing page</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>SMITLER</h3>
											<a href="https://trikita73.github.io/S-Mitler/">Перейти на сайт</a>
											<a href="https://github.com/Trikita73/S-Mitler/">Перейти в репозиторий</a>
											<p>Хороший пример для салона красоты бизнес-класса.</p>
											<img src="img/portfolio/smitler.jpg" alt="Alt">
										</div>
									</div>
								</div>
							</div>

							<!-- Popup Window -->

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-2">
								<img src="img/portfolio/horizontal_parallax.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>Horizontal_Parallax</h3>
									<p>Parallax Page</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>Horizontal_Parallax</h3>
											<a href="https://trikita73.github.io/Parallax_horizontal/">Перейти к верстке</a>
											<a href="https://github.com/Trikita73/Parallax_horizontal">Перейти в репозиторий</a>
											<p>Верстка "Landing_page" в котром используеться эффект горизонтального Parallax при скроле в бок.</p>
											<img src="img/portfolio/horizontal_parallax.jpg" alt="Alt">
											</a>
										</div>
									</div>
								</div>
							</div>

							<!-- Popup Window -->

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-1">
								<img src="img/portfolio/avto-holl.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>АВТО-ХОЛЛ</h3>
									<p>Сайт визитка</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>АВТО-ХОЛЛ</h3>
											<a href="https://trikita73.github.io/AvtoHoll/">Перейти на сайт</a>
											<a href="https://github.com/Trikita73/AvtoHoll/">Перейти в репозиторий</a>
											<p>Сайт визитка, созданный для автомастерской занимающейся обслуживанием автомобилей разного класса.</p>
											<img src="img/portfolio/avto-holl.jpg" alt="Alt">
										</div>
									</div>
								</div>								
							</div>

							<!-- Popup Window -->

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-3">
								<img src="img/portfolio/Web-job_2.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>T_PIZZA</h3>
									<p>Template</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>T_PIZZA</h3>
											<a class="temp" href="https://github.com/Trikita73/Template_Pizza-at-Home/">Перейти в репозиторий</a>
											<p>Дизайн-Макет Pizza-at-Home.</p>
											<img src="img/portfolio/Web-job_2.jpg" alt="Alt">
										</div>
									</div>
								</div>								
							</div>

							<!-- Popup Window -->

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-2">
								<img src="img/portfolio/grow.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>Grow</h3>
									<p>Landing page</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>Grow</h3> 
											<a href="https://trikita73.github.io/Parallax_Landing_Site/">Перейти к верстке</a>
											<a href="https://github.com/Trikita73/Parallax_Landing_Site/">Перейти в репозиторий</a>
											<p>Верстка по типу "Landing_Page" c использованием Parallax при скроле в низ.</p>
											<img src="img/portfolio/grow.jpg" alt="Alt">
										</div>
									</div>
								</div>								
							</div>

							<!-- Popup Window -->

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port category-3">
								<img src="img/portfolio/Web-job_1.jpg" alt="Alt">
								<div class="port_item_cont">
									<h3>T_LIGHTNING</h3>
									<p>Template</p>
									<button class="popup_content">Посмотреть</button>
								</div>
								<!-- Popup Hidden Window -->
								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button" title="Close (Esc)">×</button>
											<h3>T_LIGHTNING</h3>
											<a class="temp" href="https://github.com/Trikita73/Template_Lightning/">Перейти к репозиторию</a>
											<p>Дизайн-Макет Lighting.</p>
											<img src="img/portfolio/Web-job_1.jpg" alt="Alt">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- Section Contacts -->

	<section id="contacts" class="s_contacts bg_light">
		<div class="section_header">
			<h2>Контакты</h2>
			<div class="s_descr_wrap">
				<div class="s_descr">Личная информация</div>
			</div>
		</div>

		<!-- Submission Form -->

		<div class="section_content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<!--
						<div class="contact_box">
							<i class="contacts_icon icon-basic-geolocalize-05"></i>
							<h3>Адрес:</h3>
							<p>г. Киев</p>
						</div>
						-->
						<div class="contact_box">
							<i class="contacts_icon icon-basic-smartphone"></i>
							<h3>Телефон:</h3>
							<p>+3 8(093) 86 30 992</p>
						</div>
						<div class="contact_box">
							<i class="contacts_icon icon-basic-mail"></i>
							<h3>Mail:</h3>
							<p>diachenkonewwork@gmail.com</p>
						</div>
						<div class="contact_box">
							<i class="contacts_icon icon-basic-webpage-img-txt"></i>
							<h3>Social pages:</h3>
							<p><a href="https://t.me/Andrii_aka_Junior" target="_blank">Telegram.org</a></p>
							<p><a href="https://github.com/Trikita73/" target="_blank">Github.com</a></p>
							<p class="last_contact"><a href="https://www.linkedin.com/in/andrii-diachenko-204752273/" target="_blank">LinkedIn.com</a></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<form action="https://formspree.io/f/dyachenkoandrii@gmail.com" class="main_form" novalidate target="_blank" method="POST">
							<label class="form-group">
								<span class="color_element">*</span> Ваше имя:
								<input type="text" name="name" placeholder="Ваше имя" data-validation-required-message="Вы не ввели имя" required />
								<span class="help-block"></span>
							</label>
							<label class="form-group">
								<span class="color_element">*</span> Ваш E-mail:
								<input type="email" name="email" placeholder="Ваш E-mail" data-validation-required-message="Не корректно введен E-mail" required />
								<span class="help-block"></span>
							</label>
							<label class="form-group">
								<span class="color_element">*</span> Ваше сообщение:
								<textarea name="message" placeholder="Ваше сообщение" data-validation-required-message="Вы не ввели сообщение" required></textarea>
								<span class="help-block"></span>
							</label>
							<button>Отправить</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

    <?php get_footer(); ?>