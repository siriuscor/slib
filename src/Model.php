<?php
namespace slib;
abstract class Model {
    //save fields
    protected $container;
    public $modelName;
    
    public function __construct($obj=array()) {
        $this->container = $obj;
        $this->modelName = get_class($this);
    }
    
    public function save() {
    }
    
    public function asArray() {
        return $this->container;
    }
    
    /**
    *    usage: $model->get('prop1', 'prop2', ...);
    **/
    public function get() {
        $params = array(&$this->container);
        $params = array_merge($params, func_get_args());
        return call_user_func_array('slib\ArrayPath::get', $params);
    }
    
    /**
    *    usage: $model->set('prop1','prop2',... ,$value);
    **/
    public function set() {
        $params = array(&$this->container);
        $params = array_merge($params, func_get_args());
        return call_user_func_array('slib\ArrayPath::set', $params);
    }

    public function del() {
        $params = array(&$this->container);
        $params = array_merge($params, func_get_args());
        return call_user_func_array('slib\ArrayPath::del', $params);
    }

    public function has() {
        $params = array(&$this->container);
        $params = array_merge($params, func_get_args());
        return call_user_func_array('slib\ArrayPath::has', $params);
    }

    public function __set($offset, $value) {
        $this->container[$offset] = $value;
    }
    
    public function __isset($offset) {
        return isset($this->container[$offset]);
    }
    
    public function __unset($offset) {
        unset($this->container[$offset]);
    }
    public function __get($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}
?>