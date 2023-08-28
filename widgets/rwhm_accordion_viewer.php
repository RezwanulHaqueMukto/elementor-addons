<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
   exit;
}
class rwhm_accordion extends \Elementor\Widget_Base
{

   public function get_name()
   {
      return 'Rez_Accordion';
   }

   public function get_title()
   {
      return esc_html__('Rez Accordion', 'elementor-addon');
   }

   public function get_icon()
   {
      return 'eicon-accordion';
   }

   public function get_categories()
   {
      return ['basic'];
   }

   public function get_keywords()
   {
      return ['Accordion', 'viewer'];
   }

   protected function register_controls()
   {

      // Content 

      $this->start_controls_section(
         'section_title',
         [
            'label' => esc_html__('Add Your Accordion ', 'elementor-addon'),

         ]
      );



      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'title',
         [
            'label' => esc_html__('Accordion Title', 'elementor-addon'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Repeater Item Title', 'elementor-addon'),
         ]
      );

      $repeater->add_control(
         'description',
         [
            'label' => esc_html__('Description', 'elementor-addon'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__('Repeater Item Description', 'elementor-addon'),
         ]
      );

      $this->add_control(
         'repeater_items',
         [
            'label' => esc_html__('Repeater Items', 'elementor-addon'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
         ]
      );

      $this->end_controls_section();
   }

   protected function render()
   {
      $settings = $this->get_settings_for_display();

?>
      <script>
         jQuery(document).ready(function($) {
            $(".rez_accordion").accordion();

         });
      </script>

      <div class="rez_accordion">
         <?php
         if ($settings['repeater_items']) {
            foreach ($settings['repeater_items'] as $item) {
         ?>

               <h3><?php echo esc_html($item['title']); ?></h3>
               <p><?php echo esc_html($item['description']); ?></p>


         <?php }
         } ?>
      </div>


<?php
   }
}
