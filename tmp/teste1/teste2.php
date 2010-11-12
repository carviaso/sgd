<?php
/**
 *
 * @author bruno
 * @version 
 */
require_once 'Zend/Loader/PluginLoader.php';
require_once 'Zend/Controller/Action/Helper/Abstract.php';

/**
 * {1} Action Helper 
 * 
 * @uses actionHelper {0}
 */
class {0}_{1} extends {3}
{
    /**
     * @var Zend_Loader_PluginLoader
     */
    public $pluginLoader;

    /**
     * Constructor: initialize plugin loader
     * 
     * @return void
     */
    public function __construct(){
        // TODO Auto-generated Constructor
        $this->pluginLoader = new Zend_Loader_PluginLoader();
    }
    
    /**
     * Strategy pattern: call helper as broker method
     */
    public function direct(){
    	// TODO Auto-generated 'direct' method
    }
}

