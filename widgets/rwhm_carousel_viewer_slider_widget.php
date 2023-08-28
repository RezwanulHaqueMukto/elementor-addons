<?php
class Rwhm_Carousel_Viewer_Slider extends \Elementor\Widget_Base
{
   public function get_name()
   {
      return 'rwhm_carousel_slider';
   }

   public function get_title()
   {
      return esc_html__('Rwhm Carousel Slider', 'elementor-addon');
   }

   public function get_icon()
   {
      return 'eicon-slider-push';
   }

   public function get_categories()
   {
      return ['basic'];
   }

   public function get_keywords()
   {
      return ['rwhm Slider Carousel', 'hover'];
   }

   protected function register_controls()
   {
      $this->start_controls_section(
         'content_section',
         [
            'label' => esc_html__('Rwhm Carousel Slider', 'textdomain'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
         ]
      );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'list_title',
         [
            'label' => esc_html__('Title', 'textdomain'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Lorem Ipsum', 'textdomain'),
            'label_block' => true,
         ]
      );

      $repeater->add_control(
         'list_content',
         [
            'label' => esc_html__('Sub Title', 'textdomain'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Lorem Ipsum sub', 'textdomain'),
            'show_label' => true,
         ]
      );

      $repeater->add_control(
         'image',
         [
            'label' => __('Choose Image', 'my-elementor-addon'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $repeater->add_control(
         'btn_text_1',
         [
            'label' => esc_html__('Button Text One', 'textdomain'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Start Visit', 'textdomain'),
            'show_label' => false,
         ]
      );

      $repeater->add_control(
         'btn_link_1',
         [
            'label' => esc_html__('Button Link One', 'textdomain'),
            'type' => \Elementor\Controls_Manager::URL,
            'default' => [
               'url' => '',
            ],
            'show_label' => false,
         ]
      );

      $repeater->add_control(
         'btn_text_2',
         [
            'label' => esc_html__('Button Text Two', 'textdomain'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Start Visit', 'textdomain'),
            'show_label' => false,
         ]
      );

      $repeater->add_control(
         'btn_link_2',
         [
            'label' => esc_html__('Button link Two', 'textdomain'),
            'type' => \Elementor\Controls_Manager::URL,
            'default' => [
               'url' => '',
            ],
            'show_label' => false,
         ]
      );

      $this->add_control(
         'list',
         [
            'label' => esc_html__('Repeater List', 'textdomain'),
            'type' =>
            \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
            'title_field' => '{{{ list_title }}}',
         ]
      );
      $this->end_controls_section();
      //    $this->add_control(
      //       'carousel',
      //       [
      //          'label' => esc_html__('Carousel', 'textdomain'),
      //          'type' => \Elementor\Controls_Manager::SWITCHER,
      //          'default' => 'no',
      //       ]
      //    );
      //    $this->end_controls_section();
      // Carousel settings section for each instance of the widget
      $this->start_controls_section(
         'carousel_settings_section',
         [
            'label' => esc_html__('Carousel Settings', 'textdomain'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
         ]
      );

      $this->add_control(
         'carousel',
         [
            'label' => esc_html__('Enable Carousel', 'textdomain'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'no',
         ]
      );

      // Add other carousel-specific settings here (e.g., slidesToShow, slidesToScroll, etc.)

      $this->end_controls_section();
   }
   protected function render()
   {
      $settings = $this->get_settings_for_display();

      $test = 'no_class_';
      if ($settings['carousel'] == 'yes') {
         $test = 'yes_class_';
?>

         <script>
            jQuery(document).ready(function($) {
               $('.yes_class_rwhm_slider_slick').slick({
                  slidesToShow: 4,
                  slidesToScroll: 1,
                  autoplay: true,
                  autoplaySpeed: 2000,
                  arrows: false,
                  centerMode: true
               });

            });
         </script>
      <?php

      }
      ?>

      <div class="<?php echo $test; ?>rwhm_slider_slick rwhm_slider_slick-<?php echo $settings['carousel']; ?>">
         <?php
         if ($settings['list']) {
            foreach ($settings['list'] as $item) {
         ?>
               <div class="teamGrid rwh-carousel-style">
                  <div class="colmun">
                     <div class="teamcol rwh-carousel-width">
                        <div class="teamcolinner">
                           <?php if (!empty($item['image']['url'])) { ?>
                              <div class="avatar">
                                 <img src="<?php echo $item['image']['url']; ?>" alt="Member">
                              </div>
                           <?php } ?>

                           <div class="member-name">
                              <h2 align="center"><?php echo $item['list_title']; ?></h2>
                           </div>
                           <div class="member-info">
                              <p align="center"><?php echo $item['list_content']; ?></p>
                           </div>

                           <div class="member-btn-container">
                              <?php if (!empty($item['btn_link_1']['url'])) { ?>
                                 <div class="member-btn-1">
                                    <a href="<?php echo $item['btn_link_1']['url']; ?>"><?php echo $item['btn_text_1']; ?></a>
                                 </div>
                              <?php } ?>

                              <?php if (!empty($item['btn_link_2']['url'])) { ?>
                                 <div class="member-btn-2">
                                    <a href="<?php echo $item['btn_link_2']['url']; ?>"><?php echo $item['btn_text_2']; ?></a>
                                 </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         <?php
            }
         }
         ?>
      </div>
<?php
   }
}
