<?php
Class Controller_Brands Extends Controller_Base {
  	function index() {
      try {
        $query = $this->registry['db']->prepare("SELECT id, name, created, changed FROM brands WHERE del = 0"); 
        $query->execute(); 
        $results = $query->fetchALL(PDO::FETCH_ASSOC);
         
        $db = null;
      } catch (PDOException $e) {
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
      }
      
      $this->registry['template']->set('brands', $results);
    	$this->registry['template']->show('brand_index');
    }
    function create() {
	    $this->registry['template']->show('brand_create');
    }
    function save() {
      $name = $_GET['name'];
      
      try {
        $this->registry['db']->beginTransaction();
        $this->registry['db']->exec('INSERT INTO brands (name, created, changed) VALUES ("' . $name . '", NOW(), NOW())');
        $this->registry['db']->commit();
      } catch (PDOException $e) {
        $this->registry['db']->rollback();
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }    	  
        
      $this->registry['template']->set('name', $name);
    	$this->registry['template']->show('brand_save');
    }
}
?>