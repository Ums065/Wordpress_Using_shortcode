<?php
/**
 * Twenty Twenty-Five functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

// Adds theme support for post formats.
if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'twentytwentyfive_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_editor_style() {
		add_editor_style( get_parent_theme_file_uri( 'assets/css/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'twentytwentyfive_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_enqueue_styles() {
		wp_enqueue_style(
			'twentytwentyfive-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'twentytwentyfive_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfive' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'twentytwentyfive_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label'       => __( 'Pages', 'twentytwentyfive' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfive' ),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label'       => __( 'Post formats', 'twentytwentyfive' ),
				'description' => __( 'A collection of post format patterns.', 'twentytwentyfive' ),
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'twentytwentyfive_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_register_block_bindings() {
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive' ),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'twentytwentyfive_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function twentytwentyfive_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;


// links of the block and bootsrap
function custom_theme_enqueue_styles() {
    // Tailwind CSS
    wp_enqueue_style('tailwind-css', 'https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css', array(), null);

    // Google Fonts (Roboto)
    wp_enqueue_style('google-fonts-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', array(), null);

    // Google Fonts (Space Grotesk)
    wp_enqueue_style('google-fonts-space-grotesk', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap', array(), null);

    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');

    // Swiper JS (Only needed if you use Swiper.js)
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), '10.0', true);

    // Custom Style.css (Make sure 'style.css' is inside your theme directory)
    wp_enqueue_style('custom-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));
}
add_action('wp_enqueue_scripts', 'custom_theme_enqueue_styles');


// hero section
// hero section
function custom_hero_section_acf_shortcode($atts) {
    global $post;

    $title = get_field('hero_title', $post->ID) ?: 'Navigating the digital landscape for success';
	$description = get_field('hero_discription', $post->ID) ?: 'Our digital marketing agency helps businesses grow and succeed online through SEO, PPC, social media marketing, and content creation.';

    $button_text = get_field('hero_button_text', $post->ID) ?: 'Book a consultation';
    $image = get_field('hero_image', $post->ID);

    $image_url = is_array($image) && isset($image['url']) ? esc_url($image['url']) : esc_url($image);
    if (empty($image_url)) {
        $image_url = get_template_directory_uri() . '/images/Hero.png';
    }

    ob_start();
    ?>
<section class="hero-section py-5 px-4">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text Column -->
            <div class="col-12 col-md-6 text-center text-md-start">
                <div class="hero-title">
                    <?php 
                    $title_words = explode(" ", $title);
                    $title_chunks = array_chunk($title_words, ceil(count($title_words) / 3));
                    foreach ($title_chunks as $chunk) {
                        echo '<h1 class="fw-bold">' . esc_html(implode(" ", $chunk)) . '</h1>';
                    }
                    ?>
                </div>

                <div class="hero-description mt-3">
                    <?php 
   					 $word_count = str_word_count($description);
   					 $num_of_lines = 4;
   					 $words_per_line = max(ceil($word_count / $num_of_lines), 6);

   					 $description_words = explode(" ", $description);
   					 $description_chunks = array_chunk($description_words, $words_per_line);

    foreach ($description_chunks as $chunk) {
        echo '<p class="description-line">' . esc_html(implode(" ", $chunk)) . '</p>';
    }
    ?>
                </div>

                <a href="#" class="btn btn-dark mt-3" id="hero_button">
                    <?php echo esc_html($button_text); ?>
                </a>
            </div>

            <!-- Image Column -->
            <div class="col-12 col-md-6 text-center mt-4 mt-md-0">
                <img src="<?php echo esc_url($image_url); ?>" alt="Hero Image" class="img-fluid hero-image">
            </div>
        </div>
    </div>
</section>
<?php return ob_get_clean();
}

add_shortcode('hero_section_acf', 'custom_hero_section_acf_shortcode');



// servies sectionfunction dynamic_acf_cards() {
    function dynamic_acf_cards() {
        $output = '<section class="py-5 mt-16" style="max-width:100%">
            <div class="container text-center px-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-md-2 d-flex justify-content-center">
                        <h1 class="fw-bold mb-0" style="background-color: #b9ff66; text-align: center; padding: 5px; border-radius: 10px; font-size: calc(1.5rem + 1vw); font-weight: 500; line-height: 51px;">Services:</h1>
                    </div>
                    <div class="col-12 col-md-7 text-center d-flex align-items-center justify-content-center">
                        <p class="mt-0 ml-5" style="font-family: Space Grotesk, sans-serif; font-size: 18px; font-weight: 400; line-height: 26px; margin-bottom: 0px;">
                            At our digital marketing agency, we offer a range of services to help businesses grow and succeed online. These services include:
                        </p>
                    </div>
                </div>
            </div>
        </section>';
    
        $output .= '<section class="py-2"style="max-width:100%">
        <div class="container-fluid d-flex justify-content-center" style="max-width: 1400px;">
            <div class="row g-4 justify-content-center">';
     
    
        $styles = [
            1 => ['background' => '', 'text_bg' => '#b9ff66', 'arrow_bg' => '', 'arrow_img' => get_template_directory_uri() . '/images/Arrow 1.svg'],
            2 => ['background' => '#b9ff66', 'text_bg' => 'white', 'arrow_bg' => '', 'arrow_img' => get_template_directory_uri() . '/images/Arrow 1.svg'],
            3 => ['background' => '#191a23', 'text_bg' => 'white', 'arrow_bg' => 'white', 'arrow_img' => get_template_directory_uri() . '/images/black arrow.png'],
            4 => ['background' => '', 'text_bg' => '#b9ff66', 'arrow_bg' => '', 'arrow_img' => get_template_directory_uri() . '/images/Arrow 1.svg'],
            5 => ['background' => '#b9ff66', 'text_bg' => 'white', 'arrow_bg' => '', 'arrow_img' => get_template_directory_uri() . '/images/Arrow 1.svg'],
            6 => ['background' => '#191a23', 'text_bg' => '#b9ff66', 'arrow_bg' => 'white', 'arrow_img' => get_template_directory_uri() . '/images/black arrow.png']
        ];
    
        $default_cards = [
            ['title' => 'Search Engine', 'subtitle' => 'Optimization', 'image' => get_template_directory_uri() . '/images/searchengine.png', 'link' => '#'],
            ['title' => 'Pay-per-click', 'subtitle' => 'Advertising', 'image' => get_template_directory_uri() . '/images/card2.png', 'link' => '#'],
            ['title' => 'Social Media', 'subtitle' => 'Marketing', 'image' => get_template_directory_uri() . '/images/card 3.png', 'link' => '#'],
            ['title' => 'Email', 'subtitle' => 'Marketing', 'image' => get_template_directory_uri() . '/images/card 4.png', 'link' => '#'],
            ['title' => 'Content', 'subtitle' => 'Creation', 'image' => get_template_directory_uri() . '/images/card 5.png', 'link' => '#'],
            ['title' => 'Analytics and', 'subtitle' => 'Tracking', 'image' => get_template_directory_uri() . '/images/card 6.png', 'link' => '#']
        ];
    
        $acf_cards = [];
        if (function_exists('have_rows') && have_rows('cards')) {
            while (have_rows('cards')) {
                the_row();
                $acf_cards[] = [
                    'title' => get_sub_field('title') ?: '',
                    'subtitle' => get_sub_field('subtitle') ?: '',
                    'image' => get_sub_field('image') ?: '',
                    'link' => get_sub_field('link') ?: '#'
                ];
            }
        } 
        
        $cards = array_merge($acf_cards, array_slice($default_cards, count($acf_cards), 6));
        
        foreach ($cards as $index => $card) {
            $count = $index + 1;
            $style = $styles[$count];
            
            $title = esc_html($card['title']);
            $subtitle = esc_html($card['subtitle']);
            $image = esc_url($card['image']);
            $link = esc_url($card['link']);
    
            $output .= '<div class="col-12 col-sm-6 col-md-6 d-flex justify-content-center" >
                <div class="custom-card" style="background-color: ' . $style['background'] . ';margin-left:0px; margin-right:0px">
                    <div>
                        <h3 class="card-title">
                            <span style="background-color: ' . $style['text_bg'] . '; padding: 5px; border-radius: 10px; font-size: 30px; font-weight: 500;">' . $title . '</span><br />
                            <span style="background-color: ' . $style['text_bg'] . '; padding: 5px; border-radius: 10px; font-size: 30px; font-weight: 500;">' . $subtitle . '</span>
                        </h3>
                        <a href="' . $link . '" class="learn-more">
                            <div class="arrow-button" style="background-color: ' . $style['arrow_bg'] . ';"><img src="' . $style['arrow_img'] . '" alt="Arrow"></div>
                            <span style="line-height: 28px; font-size: 20px; font-weight: 400;">Learn more</span>
                        </a>
                    </div>
                    <img src="' . $image . '" alt="Card Image" class="card-image">
                </div>
            </div>';
        }
    
        $output .= '</div>
            </div>
        </section>';
    
        return $output;
    }
    add_shortcode('dynamic_acf_cards', 'dynamic_acf_cards');


   function custom_services_section() {
    ob_start();
    if (have_rows('services_list')) : ?>
        <section class="d-flex justify-content-center py-2">
            <div class="container">
                <div class="row g-4">
                    <?php 
                    $card_index = 0; // Initialize card index counter
                    while (have_rows('services_list')) : the_row(); 
                        $card_index++; // Increment card index
                        $title1 = get_sub_field('service_title1');
                        $title2 = get_sub_field('service_title2');
                        $image = get_sub_field('service_image');
                        $bg_color = get_sub_field('service_background_color') ?: '#b9ff66';

                        // Check if the current card is 3rd or 6th
                        $text_color = ($card_index == 3 || $card_index == 6) ? 'white' : 'black';
                    ?>
                        <div class="col-md-6 d-flex justify-content-center">
                            <div class="custom-card" style="background-color: <?php echo esc_attr($bg_color); ?>;">
                                <div>
                                    <h3 class="card-title">
                                        <span style="background-color: white; padding: 5px; border-radius: 10px; font-size: 30px; font-weight: 500;">
                                            <?php echo esc_html($title1); ?>
                                        </span><br />
                                        <span style="background-color: white; padding: 5px; border-radius: 10px; font-size: 30px; font-weight: 500;">
                                            <?php echo esc_html($title2); ?>
                                        </span>
                                    </h3>
                                    <a href="#" class="learn-more">
                                        <div class="arrow-button">
                                            <img src="Arrow 1.svg" alt="Arrow" />
                                        </div>
                                        <span style="line-height: 28px; font-size: 20px; font-weight: 400; color: <?php echo esc_attr($text_color); ?>;">
                                            Learn more
                                        </span>
                                    </a>
                                </div>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title1 . ' ' . $title2); ?>" class="card-image" />
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif;

    return ob_get_clean(); // Return the buffered content
}
add_shortcode('services_section', 'custom_services_section');



// cta section
function custom_cta_section_shortcode() {
    $cta_title = get_field('cta_title') ?: 'Let’s make things happen';
    $cta_description = get_field('cta_description') ?: 'Contact us today to learn more about how our digital<br />marketing services can help your business grow and<br />succeed online.';
    $cta_button_text = get_field('cta_button_text') ?: 'Get your free proposal';
    $cta_button_link = get_field('cta_button_link') ?: '#';
    
    $cta_image = get_field('cta_image') ?: plugin_dir_url(__FILE__) . 'images/letsmake.png';

    ob_start();
    ?>
    <section class="cta-section py-5 position-relative mt-5" style="max-width:100%">
        <div class="container position-relative">
            <div class="row align-items-center p-4 rounded shadow-sm position-relative" style="background-color: #F3F3F3;">
                <!-- Left Content (6 columns) -->
                <div class="col-md-6 text-center text-md-start">
                    <h2 class="cta-title mb-3"><?php echo esc_html($cta_title); ?></h2>
                    <p class="cta-description mb-4"><?php echo $cta_description; ?></p>
                    <a href="<?php echo esc_url($cta_button_link); ?>" class="btn btn-dark btn-lg"><?php echo esc_html($cta_button_text); ?></a>
                </div>
            </div>
            <!-- Floating Image -->
            <img src="<?php echo esc_url($cta_image); ?>" alt="Let's Make Things Happen" class="overlay-image position-absolute" style="right: 0; top: 50%; transform: translateY(-50%); max-width: 50%;" />
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_cta_section', 'custom_cta_section_shortcode');    


// case studies or comments
function custom_case_studies_shortcode() {
    $case_study_title = get_field('case_study_title') ?: 'Case Studies';
    $case_study_description = get_field('case_study_description') ?: 'Explore Real-Life Examples of Our Proven Digital Marketing Success through Our Case Studies';
    
    $case_studies = get_field('case_study_items');
    
    // Ensure it's an array, otherwise use default case studies
    if (!is_array($case_studies)) {
        $case_studies = [
            [
                'description' => 'For a local restaurant, we implemented a targeted PPC campaign that resulted in a 50% increase in website traffic and a 25% increase in sales.',
                'link' => '#'
            ],
            [
                'description' => 'For a B2B software company, we developed an SEO strategy that resulted in a first-page ranking for key keywords and a 200% increase in organic traffic.',
                'link' => '#'
            ],
            [
                'description' => 'For a national retail chain, we created a social media marketing campaign that increased followers by 25% and generated a 20% increase in online sales.',
                'link' => '#'
            ]
        ];
    }

    ob_start();
    ?>
    <section class="py-2 mt-16" style="max-width:100%">
        <div class="container text-start" style="margin-left: 0px; padding-left:0px;">
            <div class="row align-items-center">
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <h1 class="fw-bold mb-0" style="background-color: #b9ff66; text-align: center; padding: 5px; border-radius: 10px; font-size: calc(1.5rem + 1vw); font-weight: 500; line-height: 51px;">
                        <?php echo esc_html($case_study_title); ?>
                    </h1>
                </div>
                <div class="col-12 col-md-6 text-start">
                    <p class="mt-0" style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 400; line-height: 26px; margin-bottom: 0px;">
                        <?php echo esc_html($case_study_description); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="items-center justify-center flex" style="font-size: 18px; font-weight: 400; padding: 20px; max-width:100%">
        <div class="text-white rounded-lg p-10 flex flex-col md:flex-row justify-center items-center space-y-8 md:space-y-0 md:space-x-8 w-full max-w-7xl mx-auto shadow-lg" style="border: 2px solid white; border-radius: 50px; background-color: #191a23;">
            <?php foreach ($case_studies as $index => $study) : ?>
                <div class="flex-1 text-start" style="padding: 15px">
                    <p><?php echo esc_html($study['description']); ?></p>
                    <a href="<?php echo esc_url($study['link']); ?>" class="mt-4 inline-flex items-center mx-auto no-underline" style="color: #b9ff66">
                        Learn more
                        <img src="<?php echo get_template_directory_uri(); ?>/Arrow 1.svg" alt="Arrow" style="margin-left: 10px" />
                    </a>
                </div>
                <?php if ($index < count($case_studies) - 1) : ?>
                    <div class="hidden md:block border-l border-white h-48 mx-4"></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_case_studies', 'custom_case_studies_shortcode');



// working process
function custom_working_process_shortcode() {
    $section_title = get_field('working_process_title') ?: 'Our Working Process';
    $section_description = get_field('working_process_description') ?: 'Step-by-Step Guide to Achieving Your Business Goals';
    
    $steps = get_field('working_process_steps') ?: [
        ['number' => '01', 'title' => 'Consultation', 'description' => 'During the initial consultation, we will discuss your business goals and objectives, target audience, and current marketing efforts.'],
        ['number' => '02', 'title' => 'Research and Strategy Development', 'description' => 'We will analyze your industry, competitors, and market trends to create a comprehensive strategy tailored to your goals.'],
        ['number' => '03', 'title' => 'Implementation', 'description' => 'Executing the strategies and monitoring progress to ensure desired results are achieved.'],
        ['number' => '04', 'title' => 'Monitoring and Optimization', 'description' => 'We continually assess and optimize to enhance performance.'],
        ['number' => '05', 'title' => 'Reporting and Communication', 'description' => 'Regular reporting to keep you informed about progress and insights.'],
        ['number' => '06', 'title' => 'Continual Improvement', 'description' => 'Ongoing enhancements to maintain and grow success.']
    ];
    
    ob_start();
    ?>
    <section class="py-2 mt-16" style="max-width:100%">
        <div class="container text-start mb-4" style="margin-left: 0px; padding-left: 0px;">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <h1 class="fw-bold mb-0" style="background-color: #b9ff66; text-align: center; padding: 5px; border-radius: 10px; font-size: calc(1.5rem + 1vw); font-weight: 500; line-height: 51px;">
                        <?php echo esc_html($section_title); ?>
                    </h1>
                </div>
                <div class="col-12 col-md-3 text-start" style="align-items: center">
                    <p class="mt-0" style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 400; line-height: 26px; margin-bottom: 0px;">
                        <?php echo esc_html($section_description); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="flex justify-center items-center min-h-screen mt-0">
            <div class="w-full max-w-7xl">
                <?php foreach ($steps as $index => $step) : ?>
                    <div id="section<?php echo $index; ?>" class="rounded-lg shadow-lg p-6 mb-4 transition-all duration-600 bg-[#F3F3F3]" style="border:solid black 3px;border-bottom: solid black 7px; border-radius:20px">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <span class="text-4xl font-bold"> <?php echo esc_html($step['number']); ?> </span>
                                <span class="ml-4 text-xl font-semibold"> <?php echo esc_html($step['title']); ?> </span>
                            </div>
                            <button onclick="toggleContent('content<?php echo $index; ?>', 'section<?php echo $index; ?>', 'icon<?php echo $index; ?>')" class="bg-white rounded-full w-11 h-11 flex items-center justify-center">
                                <i id="icon<?php echo $index; ?>" class="fas fa-plus"></i>
                            </button>
                        </div>
                        <div id="content<?php echo $index; ?>" class="text-sm overflow-hidden transition-all duration-300 max-h-0 hidden" style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 400;">
                            <hr class="my-4 border-black" />
                            <?php echo esc_html($step['description']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <script>
    function toggleContent(contentId, sectionId, iconId) {
        const content = document.getElementById(contentId);
        const section = document.getElementById(sectionId);
        const icon = document.getElementById(iconId);
        
        const isHidden = content.classList.contains("hidden");
        
        if (isHidden) {
            content.classList.remove("hidden");
            content.style.maxHeight = content.scrollHeight + "px";
            icon.classList.remove("fa-plus");
            icon.classList.add("fa-minus");
            section.style.backgroundColor = "#B9FF66";
        } else {
            content.style.maxHeight = "0";
            setTimeout(() => {
                content.classList.add("hidden");
            }, 300);
            icon.classList.remove("fa-minus");
            icon.classList.add("fa-plus");
            section.style.backgroundColor = "#F3F3F3";
        }
    }
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_working_process', 'custom_working_process_shortcode');


// team section
function team_section_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'title' => 'Team',
            'description' => 'Meet the skilled and experienced team behind our successful digital marketing strategies.',
            'button_text' => 'See all Team',
            'button_link' => '#',
            'team_members' => json_encode(array(
                array('name' => 'John Smith', 'position' => 'CEO and Founder', 'image' => 'images/team1.png', 'bio' => '10+ years of experience in digital marketing. Expertise in SEO, PPC, and content strategy.'),
                array('name' => 'Jane Doe', 'position' => 'Director of Operations', 'image' => 'images/team2.png', 'bio' => '7+ years of experience in project management and team leadership. Strong organizational and communication skills.'),
                array('name' => 'Michael Brown', 'position' => 'Senior SEO Specialist', 'image' => 'images/team3.png', 'bio' => '5+ years of experience in SEO and content creation. Proficient in keyword research and on-page optimization.'),
                array('name' => 'Emily Johnson', 'position' => 'PPC Manager', 'image' => 'images/team4.png', 'bio' => '3+ years of experience in paid search advertising. Skilled in campaign management and performance analysis.'),
                array('name' => 'Brian Williams', 'position' => 'Social Media Specialist', 'image' => 'images/team5.png', 'bio' => '4+ years of experience in social media marketing. Proficient in creating and scheduling content, analyzing metrics, and building engagement.'),
                array('name' => 'Sarah Kim', 'position' => 'Content Creator', 'image' => 'images/team6.png', 'bio' => '2+ years of experience in writing and editing. Skilled in creating compelling, SEO-optimized content for various industries.')
            ))
        ),
        $atts
    );

    $team_members = json_decode($atts['team_members'], true);
    
    ob_start(); ?>
    <section class="py-5 mt-16" style="margin:0px;max-width:100%">
        <div class="container text-start px-5">
            <div class="row align-items-center">
                <div class="col-12 col-md-2 d-flex justify-content-center">
                    <h1 class="fw-bold mb-0" style="background-color: #b9ff66; text-align: center; padding: 5px; border-radius: 10px; font-size: calc(1.5rem + 1vw); font-weight: 500; line-height: 51.04px;">
                        <?php echo esc_html($atts['title']); ?>
                    </h1>
                </div>
                <div class="col-12 col-md-6 text-start d-flex align-items-center">
                    <p class="mt-0" style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 400; line-height: 26px; margin-bottom: 0px;">
                        <?php echo esc_html($atts['description']); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="container px-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-5 relative">
                <?php foreach ($team_members as $member) : ?>
                    <div class="bg-white rounded-lg shadow-lg p-6 relative hover:shadow-2xl transition-shadow duration-300" style="border-width: 3px 3px 7px 3px; border-style: solid; border-color: black; border-radius: 30px;">
                        <div class="absolute top-4 right-4 bg-black text-white w-10 h-10 flex items-center justify-center rounded-full">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="Linkedin" />
                        </div> 
                        <div class="flex items-center mb-4 mt-4">
                        <img alt="Profile picture of <?php echo esc_attr($member['name']); ?>" 
     class="w-20 h-20 p-1" 
     src="<?php echo esc_url(get_template_directory_uri() . '/' . ltrim($member['image'], '/')); ?>" 
     width="50" height="50" />

                            <div class="ml-4" style="margin-top: 15px;">
                                <h4 class="text-lg font-semibold" style="font-family: 'Space Grotesk', sans-serif; font-size: 20px; font-weight: 500;">
                                    <?php echo esc_html($member['name']); ?>
                                </h4>
                                <p class="text-gray-600" style="font-family: 'Space Grotesk', sans-serif; font-size: 16px; font-weight: 400;">
                                    <?php echo esc_html($member['position']); ?>
                                </p>
                            </div>
                        </div>
                        <hr class="border-black mb-4" />
                        <p class="text-gray-700 text-sm" style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 400;">
                            <?php echo esc_html($member['bio']); ?>
                      
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        

        <div class="container text-start px-5">
            <div class="row align-items-center">
                <div class="col-12 col-md-4 text-end">
                    <a href="<?php echo esc_url($atts['button_link']); ?>" class="btn btn-dark btn-lg" style="padding: 15px 50px 15px 50px; margin-top: 50px;">
                        <?php echo esc_html($atts['button_text']); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('team_section', 'team_section_shortcode');


// slider section
function custom_slider_shortcode() {
    ob_start(); ?>
    
    <div class="slider-container">
        <button id="prev" class="slider-btn">Prev</button>
        <div id="slider" class="slider">
            <div class="slider-item">
                <p>“We have been working with Positivus for the past year and have seen a significant increase in website traffic...”</p>
                <h3>Jane Doe</h3>
                <span>CEO at ABC Inc</span>
            </div>
            <div class="slider-item">
                <p>“Positivus has been a game-changer for our online marketing strategy. Their expertise and dedication have helped us...”</p>
                <h3>Michael Brown</h3>
                <span>COO at DEF Ltd</span>
            </div>
            <div class="slider-item">
                <p>“Working with Positivus has been a pleasure. Their team is knowledgeable, efficient, and always available...”</p>
                <h3>Emily White</h3>
                <span>CMO at GHI Co</span>
            </div>
        </div>
        <button id="next" class="slider-btn">Next</button>
    </div>
    <div id="dots-container" class="dots-container"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slider = document.getElementById("slider");
            const prevButton = document.getElementById("prev");
            const nextButton = document.getElementById("next");
            const dotsContainer = document.getElementById("dots-container");

            const slides = document.querySelectorAll(".slider-item");
            let slideWidth = slides[0].offsetWidth;
            let currentIndex = 0;

            function updateActiveDot() {
                const dots = document.querySelectorAll(".dot");
                dots.forEach((dot, index) => {
                    dot.style.fill = index === currentIndex ? "#b9ff66" : "white";
                });
            }

            prevButton.addEventListener("click", function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    slider.scrollTo({ left: slideWidth * currentIndex, behavior: "smooth" });
                    updateActiveDot();
                }
            });

            nextButton.addEventListener("click", function() {
                if (currentIndex < slides.length - 1) {
                    currentIndex++;
                    slider.scrollTo({ left: slideWidth * currentIndex, behavior: "smooth" });
                    updateActiveDot();
                }
            });

            window.addEventListener("resize", function() {
                slideWidth = slides[0].offsetWidth;
                slider.scrollLeft = slideWidth * currentIndex;
            });

            updateActiveDot();
        });
    </script>

    <style>
        .slider-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            width: 80%;
            margin: auto;
            overflow: hidden;
            background: #131313;
            padding: 20px;
            border-radius: 15px;
        }
        .slider {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
            width: 100%;
        }
        .slider-item {
            flex: 0 0 100%;
            scroll-snap-align: center;
            text-align: center;
            padding: 20px;
            background: #1c1c1c;
            color: white;
            border: 2px solid #b9ff66;
            border-radius: 10px;
            margin: 10px;
        }
        .slider-btn {
            background: #b9ff66;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
        }
        .slider-btn:hover {
            background: #8ecb52;
        }
        .dots-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .dot {
            margin: 0 5px;
            cursor: pointer;
        }
    </style>

    <?php return ob_get_clean();
}
add_shortcode('custom_slider', 'custom_slider_shortcode');


// second slider
function custom_testimonial_slider() {
    ob_start(); ?>
    
    <div class="testimonial-slider-container">
        <button id="prev" class="testimonial-slider-btn">&larr;</button>
        <div id="testimonial-slider" class="testimonial-slider">
            <div class="testimonial-slide">
                <p>“We have been working with Positivus for the past year and have seen a significant increase in website traffic and leads as a result of their efforts. The team is professional, responsive, and truly cares about the success of our business. We highly recommend Positivus to any company looking to grow their online presence.”</p>
                <h3>Jane Doe</h3>
                <span>CEO at ABC Inc</span>
            </div>
            <div class="testimonial-slide">
                <p>“Positivus has been a game-changer for our online marketing strategy. Their expertise and dedication have helped us achieve our goals, and we are extremely satisfied with the results. I highly recommend them to anyone looking to improve their digital presence.”</p>
                <h3>Michael Brown</h3>
                <span>COO at DEF Ltd</span>
            </div>
            <div class="testimonial-slide">
                <p>“Working with Positivus has been a pleasure. Their team is knowledgeable, efficient, and always available to help. Thanks to their work, our business has grown tremendously.”</p>
                <h3>Emily White</h3>
                <span>CMO at GHI Co</span>
            </div>
        </div>
        <button id="next" class="testimonial-slider-btn">&rarr;</button>
    </div>
    <div id="testimonial-dots-container" class="testimonial-dots-container"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slider = document.getElementById("testimonial-slider");
            const prevButton = document.getElementById("prev");
            const nextButton = document.getElementById("next");
            const dotsContainer = document.getElementById("testimonial-dots-container");

            const slides = document.querySelectorAll(".testimonial-slide");
            let slideWidth = slides[0].offsetWidth;
            let currentIndex = 0;

            function updateActiveDot() {
                const dots = document.querySelectorAll(".testimonial-dot path");
                dots.forEach((dot, index) => {
                    dot.setAttribute("fill", index === currentIndex ? "#b9ff66" : "#888");
                });
            }

            prevButton.addEventListener("click", function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    slider.scrollTo({ left: slideWidth * currentIndex, behavior: "smooth" });
                    updateActiveDot();
                }
            });

            nextButton.addEventListener("click", function() {
                if (currentIndex < slides.length - 1) {
                    currentIndex++;
                    slider.scrollTo({ left: slideWidth * currentIndex, behavior: "smooth" });
                    updateActiveDot();
                }
            });

            window.addEventListener("resize", function() {
                slideWidth = slides[0].offsetWidth;
                slider.scrollLeft = slideWidth * currentIndex;
            });

            updateActiveDot();
        });
    </script>

    <style>
        .testimonial-slider-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            width: 80%;
            margin: auto;
            overflow: hidden;
            background: #131313;
            padding: 20px;
            border-radius: 25px;
        }
        .testimonial-slider {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
            width: 100%;
        }
        .testimonial-slide {
            flex: 0 0 100%;
            scroll-snap-align: center;
            text-align: center;
            padding: 20px;
            background: #1c1c1c;
            color: white;
            border: 2px solid #b9ff66;
            border-radius: 20px;
            margin: 10px;
            position: relative;
        }
        .testimonial-slide::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: #1c1c1c;
            clip-path: polygon(50% 100%, 0 0, 100% 0);
            border-top: 2px solid #b9ff66;
            border-left: 2px solid #b9ff66;
            border-right: 2px solid #b9ff66;
        }
        .testimonial-slider-btn {
            background: #b9ff66;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
        }
        .testimonial-slider-btn:hover {
            background: #8ecb52;
        }
        .testimonial-dots-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .testimonial-dot {
            margin: 0 5px;
            cursor: pointer;
        }
    </style>

    <?php return ob_get_clean();
}
add_shortcode('testimonial_slider', 'custom_testimonial_slider');


// contact us
function contact_us_shortcode() {
    ob_start();
    ?>
    <section class="py-5 mt-16" style="margin:0px; max-width:100%">
        <div class="container text-start px-3 md:px-5">
            <div class="row align-items-center">
                <div class="col-12 col-md-3 d-flex justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <h1 class="fw-bold mb-0" style="background-color: #b9ff66; text-align: center; padding: 5px; border-radius: 10px; font-size: calc(1.5rem + 1vw); font-weight: 500; line-height: 51px; justify-content: center;">
                        Contact Us
                    </h1>
                </div>
                <div class="col-12 col-md-4 text-center text-md-start">
                    <p class="mt-0" style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 400; line-height: 26px; margin-bottom: 0px;">
                        Connect with Us: Let's Discuss Your Digital Marketing Needs
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="flex items-center justify-center" style="margin-bottom: 50px;margin:0px; max-width:100%">
        <div class="p-10 rounded-lg shadow-lg max-w-7xl w-full flex flex-col md:flex-row items-center" style="background-color: #F3F3F3;">
            <div class="w-full md:w-1/2">
                <form>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="name" style="font-size: 16px; font-weight: 400">Name</label>
                        <input class="mt-1 block w-full px-3 py-2 border border-black rounded-md" id="name" name="name" placeholder="Name" type="text" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="email" style="font-size: 16px; font-weight: 400">Email*</label>
                        <input class="mt-1 block w-full px-3 py-2 border border-black rounded-md" id="email" name="email" placeholder="Email" type="email" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="message" style="font-size: 16px; font-weight: 400;">Message*</label>
                        <textarea class="mt-1 block w-full px-3 py-2 border border-black rounded-md" id="message" name="message" placeholder="Message" rows="4"></textarea>
                    </div>
                    <button class="w-full text-white py-2 rounded-md text-lg" type="submit" style="font-size: 20px; font-weight: 400; background-color: #191A23;">Send Message</button>
                </form>
            </div>
            <div class="w-full md:w-1/2 flex justify-end mt-8 md:mt-0 hidden md:flex">
                <img src="<?php echo get_template_directory_uri(); ?>/images/contact us.png" alt="Contact Us" class="max-w-full h-auto" style="max-width: 470px; margin-right: -260px;" />
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('contact_us', 'contact_us_shortcode');

function footer_shortcode() {
    ob_start();
    ?>
    <footer class="footer mt-16">
        <div class="container" style="max-width: 1500px; padding: 50px; border-radius: 15px;">
            <div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row items-center justify-between">
                <a class="flex title-font font-medium items-center text-white">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo2.png" alt="Positivus logo" class="w-10 h-10" />
                    <span class="ml-3">Positivus</span>
                </a>
                <ul class="navbar-nav flex flex-row text-white space-x-4">
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Use Cases</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
                <span class="inline-flex space-x-3 social-icons">
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </span>
            </div>
            <div class="row contact-section text-start" style="margin-top: 35px; margin-bottom: 15px;">
                <div class="col-md-6" style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 400;">
                    <h5 style="color: #B9FF66;">Contact us:</h5>
                    <p>Email: info@positivus.com</p>
                    <p>Phone: 555-567-8901</p>
                    <p>Address: 1234 Main St, <br>Moonstone City, Stardust State 12345</p>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center" style="background-color: #292A32; font-family: 'Space Grotesk', sans-serif; font-size: 20px; font-weight: 400; border-radius: 10px;">
                    <input type="email" class="form-control me-1" style="color: white; width: 285px; height: 68px;" placeholder="Email">
                    <button class="btn" style="background-color: #B9FF66; width: 249px; height: 68px;">Subscribe to news</button>
                </div>
            </div>
            <div class="bottom-text text-start">
                <p>© 2023 Positivus. All Rights Reserved. <a href="#">Privacy Policy</a></p>
            </div>
        </div>
      </footer>
    <?php
    return ob_get_clean();
}
add_shortcode('footer_section', 'footer_shortcode');



function custom_blog_posts_shortcode($atts) {
    ob_start();

    $query = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 6, // Post ni limit
        'orderby'        => 'date',
        'order'          => 'DESC'
    ));

    if ($query->have_posts()) {
        ?>
        <div class="container mx-auto px-4 py-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php while ($query->have_posts()) {
                    $query->the_post();
                ?>
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl fade-in">
                        <a href="<?php the_permalink(); ?>" class="block">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="w-full h-56 bg-cover bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                            <?php } ?>
                            <div class="p-4">
                                <h3 class="text-xl font-semibold text-gray-800 hover:text-blue-500 transition"><?php the_title(); ?></h3>
                                <p class="text-gray-600 mt-2"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                                <span class="text-sm text-gray-500 block mt-3"><?php echo get_the_date('F d, Y'); ?></span>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .fade-in {
                animation: fadeIn 0.8s ease-in-out;
            }
        </style>
        <?php
        wp_reset_postdata();
    } else {
        echo '<p class="text-center text-gray-500">No posts found.</p>';
    }

    return ob_get_clean();
}
add_shortcode('custom_blog_posts', 'custom_blog_posts_shortcode');



// custome blog
// Enable featured images if not already enabled
function enable_featured_images() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'enable_featured_images');

function custom_blog_shortcode() {
    ob_start();
    ?>
    <div class="container mx-auto py-8">
        <h2 class="text-center text-3xl font-bold mb-6">News & Articles</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 6,
                'orderby'        => 'date',
                'order'          => 'DESC'
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="group bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="w-full h-48 overflow-hidden border bg-gray-200">
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                                </div>
                            <?php else : ?>
                                <div class="w-full h-48 flex items-center justify-center bg-gray-300">
                                    <p class="text-gray-500">No Image Available</p>
                                </div>
                            <?php endif; ?>
                        </a>
                        <div class="p-4 text-center">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition duration-300">
                                <?php the_title(); ?>
                            </h4>
                            <p class="text-gray-600 text-sm mb-3"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                            <a href="<?php the_permalink(); ?>" class="text-blue-500 font-semibold hover:underline">Read More →</a>
                            <p class="text-gray-500 text-xs mt-2"><?php echo get_the_date(); ?></p>
                        </div>
                    </div> 
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p class="text-center text-gray-500">No posts found.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_blog', 'custom_blog_shortcode');

