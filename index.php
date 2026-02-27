<?php get_header(); ?>

<!-- Section About -->

<section id="about" class="s_about bg_light">

	<?php 
	// add type_post
	$post_type  = 'landing_sections';

	// push four posts with they path
	$post_header = get_page_by_path('about-header', OBJECT, $post_type);
	$post_left   = get_page_by_path('about-left', OBJECT, $post_type);
	$post_center = get_page_by_path('about-center', OBJECT, $post_type);
	$post_right  = get_page_by_path('about-right', OBJECT, $post_type);
	?>

	<!-- Title Section About -->

	<?php if($post_header):
		$subtitle = get_post_meta($post_header->ID, 'subtitle', true);
	?>
	
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

					$english_labels      = get_post_meta($post_left->ID, 'english_labels', true);
				?>

				<div class="col-md-4 col-md-pull-4 animation_2">
					<h3><?php echo get_the_title($post_left->ID); ?></h3>

					<?php echo apply_filters('the_content', $post_left->post_content); ?>
					<p>
						<?php if($expert_skills): ?>
							<span style="color: #222;"><?php echo $expert_labels; ?></span> <span style="color: #4f88b4;"><?php echo $expert_skills; ?></span>;
							<br><span style="color: #222;"><?php echo $basic_labels; ?></span> <span style="color: #4f88b4;"><?php echo $basic_skills; ?></span>;
							<br><span style="color: #222;"><?php echo $uses_labels; ?></span> <span style="color: #4f88b4;"><?php echo $uses_skills; ?></span>;
							<br><span style="color: #222;"><?php echo $framework_labels; ?></span> <span style="color: #4f88b4;"><?php echo $framework_skills; ?></span>;
							<br><span style="color: #222;"><?php echo $text_editors_labels; ?></span> <span style="color: #4f88b4;"><?php echo $text_editors_skills; ?></span>;
							<br><?php echo $web_service_labels; ?> <span style="color: #222;"><?php echo $github_skills; ?></span>;
							<br><?php echo $experience_labels; ?> <span style="color: #222;">CMS:</span> <span style="color: #4f88b4;"><?php echo $wordpress_skills; ?></span>;
						<?php endif; ?>
					</p>
					<p>
						<?php if($expert_skills): ?>
							<span style="color: #222;"><?php echo $english_labels; ?></span> <?php echo $english_skills ?>.
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
							<li>Дата рождения: <?php echo $birth; ?></li>
						<?php endif; ?>

						<div class="personal_info">
							<?php if($phone): ?>
								<li>Номер телефона: <span><?php echo $phone; ?></span></li>
							<?php endif; ?>
							<?php if($email): ?>
								<li>E-mail: <a href="mailto:<?php echo $email; ?>"><span><?php echo $email; ?></span></a></li>
							<?php endif; ?>
							<?php if($git_link): ?>
								<li>Git-page: <a href="<?php echo $git_link; ?>" target="_blank"><span><?php echo $git_link; ?></span></a></li>
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

	<!-- Section Directions -->

	<section id="directions" class="s_directions bg_direction" data-parallax="scroll" data-image-src="img/parallax/bg_parallax2.jpg">
		<div class="section_header">
			<h2>ИНСТРУМЕНТЫ</h2>
			<div class="s_descr_wrap">
				<div class="s_descr">ИСПОЛЬЗУЕТСЯ В РАБОТЕ</div>
			</div>
		</div>

		<!-- Container Section Directions -->

		<div class="section_content">
			<div class="container">
				<div class="row">
					<div id="directions_grid">

						<!-- Section Item Directions -->

                        <?php 
                            // Call function for category "direction"
                            $directions = get_landing_items('directions');

                            if ( $directions->have_posts() ) :
                                while( $directions->have_posts() ) : $directions->the_post();
                                // add picture
                                $img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                        ?>
                                <div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
                                    <img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
                                    <div class = "mask">
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php the_content(); ?></p>
                                    </div>
                                </div>

                        <?php 
                            endwhile;
                            wp_reset_postdata(); // Обязательный сброс после цикла!
                        endif;
                        ?>



                    

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_ps.jpg" alt="Alt">
							<div class="mask">
								<h2>Web-Дизайн</h2>
								<p>Работа с шаблонами которые разработаны в:</p>
								<ul>
									<li>- Figma</li>
									<li>- PhotoShop</li>
								</ul>	
							</div>
						</div>

						<!-- Section Item Directions -->

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_git.jpg" alt="Alt">
							<div class="mask">
								<h2>Git</h2>
								<p>Работа с репозиториями, используя команды:</p>	
								<ul>
									<li>- Push</li>
									<li>- Branch</li>
									<li>- Merge</li>
									<li>- Rebase</li>
									<li>- Cherry-pick</li>
								</ul>
							</div>
						</div>	
 
						<!-- Section Item Directions -->

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_html.jpg" alt="Alt">
							<div class="mask">
								<h2>HTML</h2>
								<p>Верстка и применение инструментов web-разработки:</p>	
								<ul>
									<li>- Emmet</li>
									<li>- HTML</li>
								</ul>
							</div>
						</div>

						<!-- Section Item Directions -->

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_wp.jpg" alt="Alt">
							<div class="mask">
								<h2>WordPress</h2>
								<p>СMS с открытым исходным кодом. Основные шаги:</p>
								<ul>
									<li>- Разбивка HTML шаблона</li>
									<li>- Конвертация (HTML -> PHP)</li>
									<li>- Интеграция: кода в темы</li>
									<li>- Настройка: стилей и функций</li>
									<li>- Тестирование: шаблона</li>
								</ul>	
							</div>
						</div>

						<!-- Section Item Directions -->

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_vue.jpg" alt="Alt">
							<div class="mask">
								<h2>Vue.js</h2>
								<p>JS-фреймворк для создания пользовательских интерфейсов включает в себя:</p>	
								<ul>
									<li>- Однофайловые компоненты (SFC)</li>
									<li>- Жизненный цикл компонентов</li>
									<li>- Работа с данными</li>
									<li>- Асинхронные запросы</li>
								</ul>
							</div>
						</div>

						<!-- Section Item Directions -->

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_docker.jpg" alt="Alt">
							<div class="mask">
								<h2>Docker</h2>
								<p>Docker — платформа для контейнеризации приложений, основные функции:</p>	
								<ul>
									<li>- Docker Engine</li>
									<li>- DockerFile</li>
									<li>- Docker Image</li>
									<li>- Docker Container</li>
								</ul>
							</div>
						</div>

						<!--

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth">
							<img src="img/direction/d_react.jpg" alt="Alt">
							<div class="mask">
								<h2>React.js</h2>
								<p>JavaScript-библиотека с открытым исходным кодом для разработки пользовательских интерфейсов.</p>	
							</div>
						</div>

						-->

						<!-- Section Item Directions -->

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_css.jpg" alt="Alt">
							<div class="mask">
								<h2>Css</h2>
								<p>Cascading Style Sheets - отвечает за описание внешнего вида HTML, содержит:</p>	
								<ul>
									<li>- Flexbox</li>
									<li>- Grid</li>
									<li>- Sass/Less</li>
									<li>- Селекторы</li>
								</ul>
							</div>
						</div>

						<!-- Section Item Directions -->

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_js.jpg" alt="Alt">
							<div class="mask">
								<h2>Java Script</h2>
								<p>Язык программирования, для создания web-страниц обладает:</p>	
								<ul>
									<li>- for()...While()</li>
									<li>- Function</li>
									<li>- Array</li>
									<li>- DOM</li>
								</ul>
							</div>
						</div>

						<!-- Section Item Directions -->

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_ts.jpg" alt="Alt">
							<div class="mask">
								<h2>Type Script</h2>
								<p>Язык программирования добавляет дополнительную функциональность в JS, используя:</p>	
								<ul>
									<li>- Data types</li>
									<li>- Interfaces</li>
									<li>- Generics</li>
								</ul>
							</div>
						</div>

						<!-- Section Item Directions -->

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_jquery.jpg" alt="Alt">
							<div class="mask">
								<h2>Jquery</h2>
								<p>Библиотека JS разработанная для упрощения работы с DOM и обработкой CSS, включает:</p>	
								<ul>
									<li>- Селекторы jQuery</li>
									<li>- Обработчики событий</li>
									<li>- Эффекты и анимации</li>
								</ul>
							</div>
						</div>

						<!-- Section Item Directions -->

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_mysql.jpg" alt="Alt">
							<div class="mask">
								<h2>SQL</h2> 
								<p>Предназначен для управления базами данных, обладает функциями:</p>	
								<ul>
									<li>- Create</li>
									<li>- Read</li>
									<li>- Update</li>
									<li>- Delete</li>
								</ul>
							</div>
						</div>

						<!-- Section Item Directions -->

						<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item direction_item view view-fifth opacity_dir">
							<img src="img/direction/d_node.jpg" alt="Alt">
							<div class="mask">
								<h2>Node.js</h2>
								<p>Платформа для использования JS на стороне сервера, компоненты:</p>	
								<ul>
									<li>- Менеджер пакетов npm</li>
									<li>- Фреймворки и библиотеки</li>
									<li>- Базы данных</li>
									<li>- Инструменты для разработки</li>
								</ul>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>			
	</section>

	<!-- Section Resume -->

	<section id="resume" class="s_resume">
		<div class="section_header">
			<h2>Резюме</h2>
			<div class="s_descr_wrap">
				<div class="s_descr">Мои знания и достижения</div>
			</div>
		</div>

		<!-- /// -->

		<div class="section_content">
			<div class="container">
				<div class="row">

					<!-- Icon -->

					<div class="resume_container">
						<div class="col-md-6 col-sm-6 left">
							<h3>Работа</h3>
							<div class="resume_icon"><i class="icon-basic-display"></i></div>

							<?php
								$work_items = get_landing_items('resume_work'); 
								if($work_items->have_posts()): while($work_items->have_posts()): $work_items->the_post();
								// add fields
								$year = get_post_meta(get_the_ID(), 'year', true);
								$position = get_post_meta( get_the_ID(), 'position', true);
							?>
								<!-- Left Side Resume -->
								<div class="resume_item">
									<div class="year"><?php echo $year; ?></div>
									<div class="resume_description">
										<?php the_title(); ?><strong><?php echo $position; ?></strong>
										<p><?php the_content(); ?></p>
									</div>
								</div>
							<?php endwhile; wp_reset_postdata(); endif; ?>



							<!-- Left Side Resume -->
							<div class="resume_item">
								<div class="year">2021-2022</div>
								<div class="resume_description">"TGI Solution"<strong>Front-End</strong>
									<p>В компании <a href="https://tgi-it.com/">TGI Intelligent Solution</a> - cоздавал новые сайты с нуля на основе макетов, а так же вносил правки в сущевствующие проекты, работал над оптимизацией скорости загрузки сайтов и создание плагинов для автоматизации и удобства работ с контентом.</p>
								</div>
							</div>
							<div class="resume_item">
								<div class="year">2020-2021</div>
								<div class="resume_description">"Sanjes"<strong>Chat Operator</strong>
									<p>Занимался раскруткой аккаунтов и продвижением, в мои обязанности входил контроль и сортировка чатов, наполнение новым контентом, SFS реклама.</p>
								</div>
							</div>
							<div class="resume_item">
								<div class="year">2018-2020</div>
								<div class="resume_description">"Happy People Agency"<strong>TRANSLATOR</strong>
									<p>Работал переводчиком в агентстве знакомств. Повысил свои навыки в области английского языка и освоил навыки правильной организации  взаимодействия  в коллективе.</p>
								</div>
							</div>
							<div class="resume_item">
								<div class="year">2016-2018</div>
								<div class="resume_description">"Free Lance"<strong>FRONT-END</strong>
									<p>Занимался разработкой сайтов на заказ, делал сайты визитки, промо сайты, интернет магазин.</p>
								</div>
							</div>
							<div class="resume_item">
								<div class="year">2016-2017</div>
								<div class="resume_description">"MonsterLids.pro"<strong>SUPPORT</strong>
									<p>Работал в отделе поддержки веб-мастеров в CPA-сети. Получил хороший опыт работы с партнерской программой и навыки общения с веб-мастерами, а также приобрел навыки взаимодействия работы в коллективе.</p>
								</div>
							</div>
						</div>

						<!-- Icon -->

						<div class="col-md-6 col-sm-6 right">
							<h3>Учеба</h3>
							<div class="resume_icon"><i class="icon-basic-spread-text"></i></div>

							<?php
								$study_items = get_landing_items('resume_study');
								if($study_items->have_posts()): while($study_items->have_posts()): $study_items->the_post();
									$year = get_post_meta(get_the_ID(), 'year', true);
									$position = get_post_meta(get_the_ID(), 'position', true);
							?>

								<div class="resume_item">
									<div class="year"><?php echo $year; ?></div>
									<div class="resume_description">
										<strong><?php echo $position; ?></strong><?php the_title(); ?>
										<?php the_content(); ?>
									</div>
								</div>
							<?php endwhile; wp_reset_postdata(); endif; ?>

							<!-- Right Side Resume -->
							<div class="resume_item">
								<div class="year">2022-2024</div>
								<div class="resume_description"><strong>Skills Boots</strong>"Google Cloud"
									<p>Закончил серию курсов <a href="https://www.cloudskillsboost.google/profile/badges/">Google Cloud Skills Boost</a>, получил опыт в таких направлениях как: Machine Learning, Artificial Intelligence, Data Cloud, работал с Cloud SQL, разрабатывал Web-caйты и приложения на основе Google Cloud.</p>
								</div>
							</div>
							<div class="resume_item">
								<div class="year">2020-2021</div>
								<div class="resume_description"><strong>IT</strong>"Learn.Javascript"
									<p>Прошел базовый курс <a href="https://github.com/Trikita73/jsbasic-20210225_dyachenkoandrii/">JavaScript</a>, изучал: основы DOM-модель, основы ООП, объекты, функции и массивы, основы обмена данными с сервером в формате JSON.</p>
								</div>
							</div>
							<div class="resume_item">
								<div class="year">2018-2020</div>
								<div class="resume_description"><strong>ENGLISH</strong>"Duoliongo"
									<p>Изучаю английский язык на образовательной платформе, Duoliongo. Прошел полный курс и продолжаю совершенствовать свои знания в области изучения английского языка.</p>
								</div>
							</div>
							<div class="resume_item">
								<div class="year">2013-2016</div>
								<div class="resume_description"><strong>ІПСА</strong>НТТУ "КПИ"
									<p>Получил базовое высшее образование “бакалавр” в области компьютерные науки на заочной форме обучения.</p>
								</div>
							</div>
							<div class="resume_item">
								<div class="year">2009-2015</div>
								<div class="resume_description"><strong>ТЕФ</strong>НТТУ "КПИ"
									<p>Получил высшее образование в области Тепловых и Атомных станций. Имею диплом бакалавра и специалиста, за шесть лет учебы в Киевском Политехническом Институте получил хорошую базу инженерных знаний и практических умений.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
				
	<!-- Section Portfolio -->

	<section id="portfolio" class="s_portfolio bg_dark" data-parallax-image="img/parallax/bg_parallax.jpg">
		<div class="section_header">
			<h2>Портфолио</h2>
			<div class="s_descr_wrap">
				<div class="s_descr">Мои работы</div>
			</div>
		</div>

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

							<?php
								$portfolio = get_landing_items('portfolio');
								if($portfolio->have_posts()): while($portfolio->have_posts()): $portfolio->the_post();
								// переменные
									$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
									$subtitle = get_post_meta(get_the_ID(), 'subtitle', true);
									$filter_class = get_post_meta(get_the_ID(), 'filter_class', true); // category-1, category-2
									$link_site = get_post_meta(get_the_ID(), 'link_site', true);
									$link_git = get_post_meta(get_the_ID(), 'link_git', true);
							?>

							<div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item opacity_port <?php echo $filter_class; ?>">
								<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
								<div class ="port_item_cont">
									<h3><?php the_title(); ?></h3>
									<p><?php echo $subtitle; ?></p>
									<button class="popup_content">Open</button>
								</div>

								<div class="hidden">
									<div class="podrt_descr">
										<div class="modal-box-content">
											<button class="mfp-close" type="button">×</button>
											<h3><?php the_title(); ?></h3>

											<?php if($link_site): ?><a href="<?php echo $link_site; ?>" target="_blank">Перейти на сайт</a><?php endif; ?>
											<?php if($link_git): ?><a href="<?php echo $link_git; ?>" target="_blank">Перейти в репозиторий</a><?php endif; ?>

											<div class="content_text"><?php the_content();  ?></div>
											<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
										</div>
									</div>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); endif; ?>





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