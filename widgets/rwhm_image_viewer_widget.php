<?php
class rwhm_image_viewer extends \Elementor\Widget_Base
{

   public function get_name()
   {
      return 'rwhm_image_viewer';
   }

   public function get_title()
   {
      return esc_html__('Rwhm Image Viewer', 'elementor-addon');
   }

   public function get_icon()
   {
      return 'eicon-image-box';
   }

   public function get_categories()
   {
      return ['basic'];
   }

   public function get_keywords()
   {
      return ['rwhm image viewer', 'hover'];
   }
   protected function _register_controls()
   {

      
   }
   protected function render()
   {
?>

      <p> Hello World </p>

<?php
   }
}
