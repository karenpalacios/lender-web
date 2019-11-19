<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Gutentor_Advanced_Import_Server' ) ) {
	/**
	 * Advanced Import
	 * @package Gutentor
	 * @since 1.0.1
	 *
	 */
	class Gutentor_Advanced_Import_Server extends WP_Rest_Controller {

		/**
		 * Rest route namespace.
		 *
		 * @var Gutentor_Advanced_Import_Server
		 */
		public $namespace = 'gutentor-advanced-import/';

		/**
		 * Rest route version.
		 *
		 * @var Gutentor_Advanced_Import_Server
		 */
		public $version = 'v1';

		/**
		 * Initialize the class
		 */
		public function run() {
			add_action( 'rest_api_init', array( $this, 'register_routes' ) );

            /*Install and Activate Template Library*/
            add_action( 'wp_ajax_install_activate_template_library', array( $this, 'install_activate_template_library' ) );
        }

		/**
		 * Register REST API route
		 */
		public function register_routes() {
			$namespace = $this->namespace . $this->version;

			register_rest_route(
				$namespace,
				'/fetch_templates',
				array(
					array(
						'methods'	=> \WP_REST_Server::READABLE,
						'callback'	=> array( $this, 'fetch_templates' ),
					),
				)
			);

			register_rest_route(
				$namespace,
				'/import_template',
				array(
					array(
						'methods'	=> \WP_REST_Server::READABLE,
						'callback'	=> array( $this, 'import_template' ),
						'args'		=> array(
							'url'	=> array(
								'type'        => 'string',
								'required'    => true,
								'description' => __( 'URL of the JSON file.', 'gutentor' ),
							),
						),
					),
				)
			);
		}

		/**
		 * Function to fetch templates.
		 *
		 * @return array|bool|\WP_Error
		 */
		public function fetch_templates( \WP_REST_Request $request ) {
			if ( ! current_user_can( 'edit_posts' ) ) {
				return false;
			}

            $templates_list = array(

                array(
                    'title'				=> __( 'About Block', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'about-block', 'about 1' ),
                    'categories'		=> array( 'about' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/about-block/about-1/gutentor_about-block.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/about-block/about-1/about-block.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/about/#section-cb91908c-d5ea-4bc4-bbfd-1bc2525a40ea',
                ),
                array(
                    'title'				=> __( 'Accordion', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'accordion', 'accordion 1' ),
                    'categories'		=> array( 'accordion' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/accordion/accordion-1/gutentor_accordion.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/accordion/accordion-1/accordion.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/accordion/#section-ae935ac7-a085-47a2-8676-eaf956284a03',
                ),
                array(
                    'title'				=> __( 'Author Profile', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'author-profile', 'author-profile 1' ),
                    'categories'		=> array( 'author-profile' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/author-profile/author-profile-1/gutentor_author-profile.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/author-profile/author-profile-1/author-profile.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/author-profile/#section-b37afe24-2d7b-420b-9e94-efb3c3440a3c',
                ),
                array(
                    'title'				=> __( 'Call To Action', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'call-to-action', 'call-to-action 1' ),
                    'categories'		=> array( 'call-to-action' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/call-to-action/call-to-action-1/gutentor_call-to-action.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/call-to-action/call-to-action-1/call-to-action.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/call-to-action/#section-35e69fbe-80f4-43df-bf4e-494a345f66c0',
                ),
                array(
                    'title'				=> __( 'Count Down', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'count-down', 'count-down 1' ),
                    'categories'		=> array( 'count-down' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/count-down/count-down-1/gutentor_count-down.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/count-down/count-down-1/count-down.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/count-down/#section-621045f5-3c1d-446b-8072-6adb8eb55b5a',
                ),
                array(
                    'title'				=> __( 'Counter', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'counter', 'counter 1' ),
                    'categories'		=> array( 'counter' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/counter/counter-1/gutentor_counter-box.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/counter/counter-1/counter.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/counter/#section-814c5e88-7dd3-4cef-a872-bff5103649da',
                ),
                array(
                    'title'				=> __( 'Featured Block', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'featured-block', 'featured-block 1' ),
                    'categories'		=> array( 'featured-block' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/featured-block/featured-block-1/gutentor_featured-block.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/featured-block/featured-block-1/featured-block.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/featured-block/#section-b526b783-9078-4675-b8d3-f6c4ac207098',
                ),
                array(
                    'title'				=> __( 'Gallery', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'gallery', 'gallery 1' ),
                    'categories'		=> array( 'gallery' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/gallery/gallery-1/gutentor_gallery.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/gallery/gallery-1/gallery.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/gallery/#section-5c3dc2b1-32ed-4696-b5fa-abff0dff6dc4',
                ),
                array(
                    'title'				=> __( 'Icon Box', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'icon-box', 'icon-box 1' ),
                    'categories'		=> array( 'icon-box' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/icon-box/icon-box-1/gutentor_icon-box.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/icon-box/icon-box-1/icon-box.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/icon-box/#section-f5a1ee87-e6f5-4571-98a8-f262c4ab78e0',
                ),
                array(
                    'title'				=> __( 'Image Box', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'image-box', 'image-box 1' ),
                    'categories'		=> array( 'image-box' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/image-box/image-box-1/gutentor_image-box.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/image-box/image-box-1/image-box.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/image-block/#section-d7ae3fd8-b954-4468-ae14-e904aff1e84c',
                ),
                array(
                    'title'				=> __( 'Image Slider', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'image-slider', 'image-slider 1' ),
                    'categories'		=> array( 'image-slider' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/image-slider/image-slider-1/gutentor_image-slider.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/image-slider/image-slider-1/image-slider.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/image-slider/#section-35f902ba-cd22-4920-bc39-d104e23f3b89',
                ),
                array(
                    'title'				=> __( 'List Block', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'list', 'list 1' ),
                    'categories'		=> array( 'list' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/list/list-1/gutentor_list.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/list/list-1/list.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/list/#section-8f4613b9-f012-4044-b04d-0f458132a42a',
                ),
                array(
                    'title'				=> __( 'Notification Block', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'notification', 'notification 1' ),
                    'categories'		=> array( 'notification' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/notification/notification-1/gutentor_notification.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/notification/notification-1/notification.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/notification/#section-24d95c46-83e8-4088-9d0b-df1bdff55fc7',
                ),
                array(
                    'title'				=> __( 'Opening Hours', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'opening-hours', 'opening-hours 1' ),
                    'categories'		=> array( 'opening-hours' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/opening-hours/opening-hours-1/gutentor_opening-hours.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/opening-hours/opening-hours-1/opening-hours.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/opening-hours/#section-d83e7661-98af-446f-a56a-9ee11702e3d2',
                ),
                array(
                    'title'				=> __( 'Pricing', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'pricing', 'pricing 1' ),
                    'categories'		=> array( 'pricing' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/pricing/pricing-1/gutentor_pricing.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/pricing/pricing-1/pricing.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/pricing/#section-fa15ba5e-ec27-4941-afde-5d5211eaf61c',
                ),
                array(
                    'title'				=> __( 'Progressbar', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'progress-bar', 'progress-bar 1' ),
                    'categories'		=> array( 'progress-bar' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/progress-bar/progress-bar-1/gutentor_progress-bar.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/progress-bar/progress-bar-1/progress-bar.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/progress-bar/#section-d63c446f-de55-47aa-8a1b-cf0fa1fc108c',
                ),
                array(
                    'title'				=> __( 'Restaurant Menu', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'restaurant-menu', 'restaurant-menu 1' ),
                    'categories'		=> array( 'restaurant-menu' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/restaurant-menu/restaurant-menu-1/gutentor_restaurant-menu.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/restaurant-menu/restaurant-menu-1/restaurant-menu.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/restaurant-menu/#section-eb78e751-096e-4dfd-8f12-b4a2c3f000e9',
                ),
                array(
                    'title'				=> __( 'Social', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'social', 'social 1' ),
                    'categories'		=> array( 'social' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/social/social-1/gutentor_social.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/social/social-1/social.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/social/#section-35f902ba-cd22-4920-bc39-d104e23f3b89',
                ),
                array(
                    'title'				=> __( 'Tabs', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'tabs', 'tabs 1' ),
                    'categories'		=> array( 'tabs' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/tabs/tabs-1/gutentor_tabs.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/tabs/tabs-1/tabs.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/tabs/#section-a066ea7b-a982-4a33-a45f-0a6bec70bce7',
                ),
                array(
                    'title'				=> __( 'Team', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'team', 'team 1' ),
                    'categories'		=> array( 'team' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/team/team-1/gutentor_team.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/team/team-1/team.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/team/#section-3ffc55c6-ddde-4e3e-b565-b2a06c13552e',
                ),
                array(
                    'title'				=> __( 'Testimonial', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'testimonial', 'testimonial 1' ),
                    'categories'		=> array( 'testimonial' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/testimonial/testimonial-1/gutentor_testimonial.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/testimonial/testimonial-1/testimonial.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/testimonial/#section-62a6a138-ab1a-444f-a551-e6634ef72335',
                ),
                array(
                    'title'				=> __( 'Timeline', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'timeline', 'timeline 1' ),
                    'categories'		=> array( 'timeline' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/timeline/timeline-1/gutentor_timeline.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/timeline/timeline-1/timeline.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/timeline/#section-3b803f53-93b4-47a8-a133-1f02e3a4ad57',
                ),
                array(
                    'title'				=> __( 'Blog', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'blog', 'blog 1' ),
                    'categories'		=> array( 'blog' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/blog/blog-1/gutentor_blog-post.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/blog/blog-1/blog.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/blog/#section-749d8301-3bc3-480d-9d25-af0583d3154a',
                ),
                array(
                    'title'				=> __( 'Google Map', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'google-map', 'google-map 1' ),
                    'categories'		=> array( 'google-map' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/google-map/google-map-1/gutentor_google-map.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/google-map/google-map-1/google-map.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/google-map/#section-90380ab9-e0eb-4857-aaf3-aa976c680c39',
                ),
                array(
                    'title'				=> __( 'Video Popup', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'video-popup', 'video-popup 1' ),
                    'categories'		=> array( 'video-popup' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/video/video-1/gutentor_video-popup.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/video/video-1/video.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/video/#section-98cd8ba9-fc36-47a6-a29b-41a6c33cf888',
                ),
                array(
                    'title'				=> __( 'Show More/Less Block', 'gutentor' ),
                    'type'				=> 'block',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'show-more-less', 'show-more-less 1' ),
                    'categories'		=> array( 'show-more-less' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/blocks/show-more-less/show-more-less-1/gutentor_show-more.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/blocks/show-more-less/show-more-less-1/show-more-less.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/free-block-demo/show-more-less/#section-1a932db4-7843-413f-b7b0-e1f44a0bb1fd',
                ),
                array(
                    'title'				=> __( 'Business', 'gutentor' ),
                    'type'				=> 'template',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'business', 'business 1' ),
                    'categories'		=> array( 'business' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/templates/business/business-1/template.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/templates/business/business-1/business-template.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/templates/business/',
                ),
                array(
                    'title'				=> __( 'Medical', 'gutentor' ),
                    'type'				=> 'template',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'medical', 'medical 1' ),
                    'categories'		=> array( 'medical' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/templates/medical/medical-1/template.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/templates/medical/medical-1/medical-template.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/templates/medical-1/',
                ),
                array(
                    'title'				=> __( 'Fitness', 'gutentor' ),
                    'type'				=> 'template',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'fitness', 'fitness 1' ),
                    'categories'		=> array( 'fitness' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/templates/fitness/fitness-1/template.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/templates/fitness/fitness-1/fitness-template.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/templates/fitness-1/',
                ),
                array(
                    'title'				=> __( 'Construction', 'gutentor' ),
                    'type'				=> 'template',
                    'author'			=> __( 'Gutentor', 'gutentor' ),
                    'keywords'			=> array( 'construction', 'construction 1' ),
                    'categories'		=> array( 'construction' ),
                    'template_url'		=> GUTENTOR_URL.'assets/template-library/templates/construction/construction-1/template.json',
                    'screenshot_url'    => GUTENTOR_URL.'assets/template-library/templates/construction/construction-1/construction-template.jpg',
                    'demo_url'    => 'https://www.demo.gutentor.com/templates/construction-1/',
                ),
            );

			$templates = apply_filters( 'gutentor_advanced_import_templates', $templates_list );

			return rest_ensure_response( $templates );
		}

		/**
		 * Function to fetch template JSON.
		 *
		 * @return array|bool|\WP_Error
		 */
		public function import_template( $request ) {
			if ( ! current_user_can( 'edit_posts' ) ) {
				return false;
			}

			$url = $request->get_param( 'url' );
			if ( $url ) {
				/*TODO: Rest API */
				$body_args = [
					/*API version*/
					'api_version' => GUTENTOR_VERSION,
					/*lang*/
					'site_lang' => get_bloginfo( 'language' ),
				];
				$raw_json = wp_safe_remote_get( $url, [
					'timeout' => 100,
					'body' => $body_args,
				] );

				if ( ! is_wp_error( $raw_json ) ) {
					$obj = json_decode( wp_remote_retrieve_body( $raw_json ) );

					if ( $obj ) {
						return rest_ensure_response( $obj );
					}
				}
			}
			return false;
		}

        /**
         * Install and Activate Template Library
         * @since 1.1.5
         *
         * @return array|bool|\WP_Error
         */
		public function install_activate_template_library(){

            check_ajax_referer( 'gutentorNonce', 'security' );

            $slug   = GUTENTOR_RECOMMENDED_TEMPLATE_LIBRARY_SLUG;
            $plugin = GUTENTOR_RECOMMENDED_TEMPLATE_LIBRARY_PLUGIN;

            $status = array(
                'install' => 'plugin',
                'slug'    => sanitize_key( wp_unslash( $slug ) ),
            );

            if ( is_plugin_active_for_network( $plugin ) || is_plugin_active( $plugin ) ) {
                // Plugin is activated
                wp_send_json_success( $status );
            }
            if ( ! current_user_can( 'install_plugins' ) ) {
                $status['errorMessage'] = __( 'Sorry, you are not allowed to install plugins on this site.', 'gutentor' );
                wp_send_json_error( $status );
            }

            include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
            include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

            // Looks like a plugin is installed, but not active.
            if ( file_exists( WP_PLUGIN_DIR . '/' . $slug ) ) {
                $plugin_data          = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
                $status['plugin']     = $plugin;
                $status['pluginName'] = $plugin_data['Name'];

                if ( current_user_can( 'activate_plugin', $plugin ) && is_plugin_inactive( $plugin ) ) {
                    $result = activate_plugin( $plugin );

                    if ( is_wp_error( $result ) ) {
                        $status['errorCode']    = $result->get_error_code();
                        $status['errorMessage'] = $result->get_error_message();
                        wp_send_json_error( $status );
                    }

                    wp_send_json_success( $status );
                }
            }

            $api = plugins_api(
                'plugin_information',
                array(
                    'slug'   => sanitize_key( wp_unslash( $slug ) ),
                    'fields' => array(
                        'sections' => false,
                    ),
                )
            );

            if ( is_wp_error( $api ) ) {
                $status['errorMessage'] = $api->get_error_message();
                wp_send_json_error( $status );
            }

            $status['pluginName'] = $api->name;

            $skin     = new WP_Ajax_Upgrader_Skin();
            $upgrader = new Plugin_Upgrader( $skin );
            $result   = $upgrader->install( $api->download_link );

            if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
                $status['debug'] = $skin->get_upgrade_messages();
            }

            if ( is_wp_error( $result ) ) {
                $status['errorCode']    = $result->get_error_code();
                $status['errorMessage'] = $result->get_error_message();
                wp_send_json_error( $status );
            } elseif ( is_wp_error( $skin->result ) ) {
                $status['errorCode']    = $skin->result->get_error_code();
                $status['errorMessage'] = $skin->result->get_error_message();
                wp_send_json_error( $status );
            } elseif ( $skin->get_errors()->get_error_code() ) {
                $status['errorMessage'] = $skin->get_error_messages();
                wp_send_json_error( $status );
            } elseif ( is_null( $result ) ) {
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
                WP_Filesystem();
                global $wp_filesystem;

                $status['errorCode']    = 'unable_to_connect_to_filesystem';
                $status['errorMessage'] = __( 'Unable to connect to the filesystem. Please confirm your credentials.', 'gutentor' );

                // Pass through the error from WP_Filesystem if one was raised.
                if ( $wp_filesystem instanceof WP_Filesystem_Base && is_wp_error( $wp_filesystem->errors ) && $wp_filesystem->errors->get_error_code() ) {
                    $status['errorMessage'] = esc_html( $wp_filesystem->errors->get_error_message() );
                }

                wp_send_json_error( $status );
            }

            $install_status = install_plugin_install_status( $api );

            if ( current_user_can( 'activate_plugin', $install_status['file'] ) && is_plugin_inactive( $install_status['file'] ) ) {
                $result = activate_plugin( $install_status['file'] );

                if ( is_wp_error( $result ) ) {
                    $status['errorCode']    = $result->get_error_code();
                    $status['errorMessage'] = $result->get_error_message();
                    wp_send_json_error( $status );
                }
            }

            wp_send_json_success( $status );
        }

		/**
		 * Gets an instance of this object.
		 * Prevents duplicate instances which avoid artefacts and improves performance.
		 *
		 * @static
		 * @access public
		 * @since 1.0.1
		 * @return object
		 */
		public static function get_instance() {
			// Store the instance locally to avoid private static replication
			static $instance = null;

			// Only run these methods if they haven't been ran previously
			if ( null === $instance ) {
				$instance = new self();
			}

			// Always return the instance
			return $instance;
		}

		/**
		 * Throw error on object clone
		 *
		 * The whole idea of the singleton design pattern is that there is a single
		 * object therefore, we don't want the object to be cloned.
		 *
		 * @access public
		 * @since 1.0.0
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'gutentor' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @access public
		 * @since 1.0.0
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'gutentor' ), '1.0.0' );
		}
	}

}
Gutentor_Advanced_Import_Server::get_instance()->run();