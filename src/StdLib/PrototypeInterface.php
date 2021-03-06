<?php
namespace MNHcC\MinimalusLayoutilus\StdLib {
	
	/**
	 * implement the Caller for override method from object
	 * @author Michael Hegenbarth (carschrotter)
	 * @package MinimalusLayoutilus
	 */
	interface PrototypeInterface {
	    public function __call($name, $arguments);
	    public static function __callStatic($name, $arguments);
	    public function setFunction($call, $name);
	    public static function setFunctionStatic($call, $name);
	    public function Prototype();
	}
}