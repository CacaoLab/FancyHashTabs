<?php namespace EasyTabs\lib;

class Assets extends Wordpress {

    private $plugin_path = '';
    private $assets_path = '';

    public function __construct( $path ) {
        $this->plugin_path = $path;
        $this->assets_path = $this->plugin_path . '/assets';
        $this->register();
    }

    private function register(){
        $this->register_css();
        $this->register_js();
    }

    private function register_css(){
        wp_register_style('easy-tabs-styles', $this->get_asset_path( 'css',  'example.css' ), array(), null, null);
    }

    private function register_js(){
        wp_register_script('jquery-ba-hash-change', $this->get_asset_path( 'js', 'jquery.ba-hashchange.min.js' ), array('jquery'), null, false );
        wp_register_script('jquery-easy-tabs', $this->get_asset_path( 'js', 'jquery.easytabs.min.js' ), array('jquery'), null, false );
    }

    private function get_asset_path( $directory_name = '', $file_name = '' ){
        return $this->get_path_from_asset($directory_name) . $file_name;
    }

    private function get_path_from_asset( $directory_name ){
        return ( $this->assets_path . '/' . $directory_name . '/' );
    }

    public function load(){
        add_action('init', $this->call_method( 'enqueue_scripts' ) );
        add_action('wp_footer', $this->call_method( 'enqueue_hash_script' ) );
    }

    public function enqueue_scripts(){
        wp_enqueue_script('jquery-ba-hash-change');
        wp_enqueue_script('jquery-easy-tabs');
        wp_enqueue_style('easy-tabs-styles');
    }

    public function enqueue_hash_script(){
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#tab-container').easytabs();
    });
</script>
<?php 
    }
}
