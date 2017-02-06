<?php

namespace MNHcC\MinimalusLayoutilus\StdLib {



    /**
     * Implementation for the Instances interface 
     * <p>
     * Get a object instance from the class, and automatic overload the classe by the namespace.<br>
     * The instance will not be saved!
     * </p>
     * @author Michael Hegenbarth (carschrotter)
     * @package MinimalusLayoutilus	 
     */
    trait NoInstancesTrait {

        use InstancesTrait;

//	protected $_instanceID;
//	
//	public function getInstanceID() {
//	    return $this->_instanceID;
//	}
//
//	public function setInstanceID($instanceID) {
//	    $this->_instanceID = $instanceID;
//	}

        /**
         * 
         * @param string $instance the id of 
         * @return static
         */
        public static function &getInstance($instance = self::DEFAULTINSTANCE, $t = null) {
            $class = classes\Bootstrap::getOverloadedClass(get_called_class());
            $reflection = new classes\ReflectionClass($class);
            if ($instance == self::DEFAULTINSTANCE) {
                classes\Error::triggerError($class . '::getInstance() store no reference. Pleas use new ' . $class . '() or ' . $class . '::getInstance(NULL)');
            }
            $obj = $reflection->newInstanceArgs(func_get_args());
            return $obj;
        }

        public static function isInit() {
            throw new Exception('Call to undefined method ' . $this->getClass() . '::' . __FUNCTION__ . '()', ExceptionInterface::noMethodImplement);
        }

    }

}