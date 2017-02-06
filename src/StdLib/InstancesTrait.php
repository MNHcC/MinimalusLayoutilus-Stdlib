<?php

namespace MNHcC\MinimalusLayoutilus\StdLib;

    use MNHcC\MinimalusLayoutilus\StdLib\Exception;
    /**
     * Implementation for the Instances interface 
     * <p>
     * Get a object instance from the class, and automatic overload the classe by the namespace.<br>
     * The instance is saved with id specified.
     * </p>
     * @author Michael Hegenbarth (carschrotter)
     * @package MinimalusLayoutilus	 
     */
    trait InstancesTrait {

	protected static $_instances = [];
	protected $_instanceID = self::DEFAULTINSTANCE;
	
	/**
	 * is init (a object createt)
	 * @var bool 
	 */
	protected static $init = false;

	/**
	 *  is a object createt also init
	 * @return bool
	 */
	public static function isInit() {
	    return self::$init;
	}
	
	public function getInstanceID() {
	    return $this->_instanceID;
	}

	public function setInstanceID($instanceID) {
	    $this->_instanceID = $instanceID;
	}
	
	static public function issetInstance($instance = self::DEFAULTINSTANCE) {
	    if(Helper\AbstractArrayHelper::keyExists($instance, self::$_instances)) {
		return ( \is_object(self::$_instances[$instance]) && (self::$_instances[$instance] instanceof self) );
	    } 
	    return false;
	}

        /**
         * 
         * @param type $instance
         * @param self $self
         * @throws Exception
         */
	static protected function setInstance($instance, $self) {
	    if($self instanceof self){
		self::$_instances[$instance] = $self;
	    } else {
		throw new Exception(__class_.'::setInstance() only accept objects from type '.__class_);
	    }
	}
	
	/**
	 * 
	 * @param string $instance (optional) <p>Instance id/name</p>
	 * @return static
	 */
	static public function &getInstance($instance = self::DEFAULTINSTANCE, $override = self::INSTANCE_NOT_OVERIDE) {
	    if ( (!\key_exists($instance, self::$_instances)) || ($override == self::INSTANCE_OVERIDE) ) {
		$class = Bootstrap::getOverloadedClass(get_called_class());
		$args = func_get_args();
		if (Helper\AbstractArrayHelper::count($args) > 0) {
		    Helper\AbstractArrayHelper::shift($args);
		    if (Helper\AbstractArrayHelper::keyExists(0, $args)) {
			if (Helper\AbstractArrayHelper::in($args[0], [self::INSTANCE_OVERIDE, self::INSTANCE_NOT_OVERIDE])) {
			    Helper\AbstractArrayHelper::shift($args);
			} else {
			    classes\Error::triggerError('Pleas use as the secont argument the \\mnhcc\\ml\\interfaces\\Instances::INSTANCE_... constants', classes\Error::DEPRECATED);
			}
		    }
		}
		self::$_instances[$instance] = (new classes\ReflectionClass($class))->newInstanceArgs($args);
		self::$_instances[$instance]->setInstanceID($instance);
		if ($instance == self::DEFAULTINSTANCE) {
		    self::$init = true;
		}
	    }
	    return self::$_instances[$instance];
	}

        /**
         * @param string $instance (optional) the instance key
         * @param type $args
         * @param type $override
         * @return static
         */
	static public function &getInstanceArgs($instance = self::DEFAULTINSTANCE,  $args = [], $override = self::INSTANCE_NOT_OVERIDE) {
	    $args = Helper\AbstractArrayHelper::addBefore($args, $override);
	    $args = Helper\AbstractArrayHelper::addBefore($args, $instance);
	    /**
	     * @todo self keyword on ReflectionClass
	     */
//	    \Kint::dump(new classes\ReflectionClass('self'));
//	    \Kint::dump(classes\ReflectionClass::getInstance('self'));
	    
	    $call = 'self::getInstance';
	    if(\method_exists(__CLASS__, '_getInstance')){
		$call = 'self::_getInstance';
	    } 
	    $eval_args_str = '';
	    for($i =0; $i < \count($args); $i++){
		$eval_args_str .= '$args['.$i.'],';
	    }
	    $eval_args_str = rtrim($eval_args_str, ',');
	    $pointer = null;
	    eval('$pointer = &'.$call.'('.$eval_args_str.');'); // \call_user_func_array($call, $args);
	    return $pointer;    
	}
	
	/**
	 * @return static[] <p>array of instances from static</p>
	 */
	static public function &getInstances() {
	    return self::$_instances;
	}

    }
