<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
   exit;
}
class rwhm_team_viewer extends \Elementor\Widget_Base
{

   public function get_name()
   {
      return 'rwhm_Team_viewer';
   }

   public function get_title()
   {
      return esc_html__('Rwhm Team Viewer', 'elementor-addon');
   }

   public function get_icon()
   {
      return ' eicon-preferences';
   }

   public function get_categories()
   {
      return ['basic'];
   }

   public function get_keywords()
   {
      return ['rwhm Team viewer', 'hover'];
   }
   protected function _register_controls()
   {
      // Add controls for title.
      $this->start_controls_section(
         'section_title',
         [
            'label' => __('Title', 'my-elementor-addon'),
         ]
      );

      $this->add_control(
         'title_text',
         [
            'label' => __('Title Text', 'my-elementor-addon'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('My Title', 'my-elementor-addon'),
         ]
      );

      $this->end_controls_section();
      // Add controls for text.
      $this->start_controls_section(
         'section_text',
         [
            'label' => __('Text', 'my-elementor-addon'),
         ]
      );

      $this->add_control(
         'text_content',
         [
            'label' => __('Text Content', 'my-elementor-addon'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => __('My Text Content', 'my-elementor-addon'),
         ]
      );

      $this->end_controls_section();
      // Add controls for image.
      $this->start_controls_section(
         'section_image',
         [
            'label' => __('Image', 'my-elementor-addon'),
         ]
      );

      $this->add_control(
         'image',
         [
            'label' => __('Choose Image', 'my-elementor-addon'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->end_controls_section();
      // Add controls for repeater with icon and link.
      // Add controls for repeater.
      $this->start_controls_section(
         'section_repeater',
         [
            'label' => __('Repeater', 'my-elementor-addon'),
         ]
      );
      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'icon',
         [
            'label' => __('Icon', 'my-elementor-addon'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
               'value' => 'fas fa-star',
               'library' => 'fa-solid',
            ],
         ]
      );

      $repeater->add_control(
         'link',
         [
            'label' => __('Link', 'my-elementor-addon'),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __('https://example.com', 'my-elementor-addon'),
            'default' => [
               'url' => '',
               'is_external' => false,
               'nofollow' => false,
            ],
         ]
      );

      $this->add_control(
         'repeater_items',
         [
            'label' => __('Repeater Items', 'my-elementor-addon'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
            'title_field' => '{{{ link.url }}}',
         ]
      );
      $this->end_controls_section();
   }
   protected function render()
   {
      $settings = $this->get_settings_for_display();

?>

      <div class="teamGrid" id="rez_team">
         <div class="colmun">
            <div class="teamcol">
               <div class="teamcolinner">

                  <?php if (!empty($settings['image']['url'])) { ?>

                     <div class="avatar"><img src="<?php echo $settings['image']['url']; ?>" alt="Member"></div>
                  <?php
                  } ?>

                  <div class="member-name">
                     <h2 align="center"><?php echo  $settings['title_text']  ?>
                     </h2>
                  </div>
                  <div class="member-info">
                     <p align="center"><?php echo  $settings['text_content']  ?></p>
                  </div>
           
            

                  <div class="member-social">
                     <?php
                     if (!empty($settings['repeater_items'])) {
                        echo '<ul class= "social-listing">';

                        foreach ($settings['repeater_items'] as $item) {
                           $link_attributes = '';

                           if ($item['link']['is_external']) {
                              $link_attributes .= ' target="_blank"';
                           }

                           if ($item['link']['nofollow']) {
                              $link_attributes .= ' rel="nofollow"';
                           }

                           echo '<li><a href="' . $item['link']['url'] . '"' . $link_attributes . '><i class="' . $item['icon']['value'] . ' ' . $item['icon']['library'] . '"></i></a></li>';
                        }

                        echo '</ul>';
                     }

                     ?>
                  </div>
              
               </div>
            </div>
         </div>


      </div>
      <style>

      </style>
<?php
   }
}
