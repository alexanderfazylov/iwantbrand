<?php


Class Template {

        private $registry;

        private $vars = array();


        function __construct($registry) {

                $this->registry = $registry;

        }

        
		function set($varname, $value, $overwrite=false) {
		
		        if (isset($this->vars[$varname]) == true AND $overwrite == false) {
		
		                trigger_error ('Unable to set var `' . $varname . '`. Already set, and overwrite not allowed.', E_USER_NOTICE);
		
		                return false;
		
		        }
		
		
		        $this->vars[$varname] = $value;
		
		        return true;
		
		}
		
		
		function remove($varname) {
		
		        unset($this->vars[$varname]);
		
		        return true;
		
		}
		
		function show($name) {
		        $path = site_path . 'templates' . DIRSEP . $name . '.php';
		        if (file_exists($path) == false) {
		                trigger_error ('Template `' . $name . '` does not exist.', E_USER_NOTICE);
		                return false;
		        }
		
		        // Load variables
		        foreach ($this->vars as $key => $value) {
		                $$key = $value;
		        }
		
		        include ($path);                
		}		

}


?>