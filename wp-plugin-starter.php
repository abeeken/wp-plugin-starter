<?php
	/*
    Plugin Name: WP Plugin Starter
    Plugin URI: 
    Description: A starting point for plugins with class based definition
    Version: 0
    Author URI: http://www.andrewbeeken.co.uk

    This is a simple plugin that features a basic admin screen and shortcode. You can use it as a starting point for any plugins you may need to develop    
    */

    include_once(dirname(__FILE__) .'/base.php');

    class wpPluginStarter extends base{
        // Vars
        protected $show_shortcode;

        // Constructor
        function __construct(){
            // Include parent constructor
            parent::__construct();

            // Set vars
            $this->show_shortcode = get_option('show_shortcode');

            // Hooks
            add_action('admin_menu', array($this, 'add_admin'));
        }

        // Admin functions
        function add_admin(){
            add_options_page('Plugin Options', 'Plugin Options', 'manage_options', 'plugin_functions', array($this, 'plugin_custom_options'));
        }

        function plugin_custom_options(){
            $data = [
                'shortcode_yes' => '',
                'shortcode_no' => ''
            ];
            
            switch($this->show_shortcode){
                case 'yes':
                    $data['shortcode_yes'] = ' selected';
                    break;
                case 'no';
                    $data['shortcode_no'] = ' selected';
                    break;
            }
            $this->render_view('admin', $data);
        }
    }

    // Create plugin instance
    $wp_plugin_starter = new wpPluginStarter();