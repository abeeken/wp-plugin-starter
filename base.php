<?php
    // Base class - contains generic functions
    class base{
    protected $plugin_path;
    protected $view_path;

    function __construct(){
        $this->plugin_path = dirname(__FILE__);
        $this->view_path = 'views';
    }

    function __set($name,$value){
			if(method_exists($this, $name)){
			  $this->$name($value);
			}
			else{
			  $this->$name = $value;
			}
		}
		
		function __get($name){
			if(method_exists($this, $name)){
			  return $this->$name();
			}
			elseif(property_exists($this,$name)){
			  return $this->$name;
			}
    }
      
    // Basic template rendering - also accepts a true/false flag which returns the buffered output instead of rendering it - essential for shortcodes
    function render_view($view, $data = [], $return = false){
        extract($data);
        $path = $this->plugin_path . '/'. $this->view_path .'/'. $view . '.php';
        if($return){
          ob_start();
          require($path);
          return ob_get_clean();
        } else {
          require($path);
        }
        
    }
  }