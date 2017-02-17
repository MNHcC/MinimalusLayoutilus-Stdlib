<?php

namespace MNHcC\MinimalusLayoutilus\StdLib {

    use MNHcC\MinimalusLayoutilus\StdLib\Exception\Exception;
    use MNHcC\MinimalusLayoutilus\Reflection\Exception\ExceptionInterface;
    
    /**
     *
     * @author Michael Hegenbarth (carschrotter)
     * @package MinimalusLayoutilus	 
     */
    trait MinimalusLayoutilusTrait {

	protected static $___require = [];

	public function __toString() {
	    return $this->getClass();
	}

	public function getClass() {
	    return \get_class($this);
	}

	/**
	 * replace the default Error to a Exeption
	 * @param string $name
	 * @param array $arguments
	 * @throws Exception
	 */
	public function __call($name, $arguments) {
	    throw new Exception('Call to undefined method '
	    . $this->getClass() . '::' . $name . '()', ExceptionInterface::noMethodImplement);
	}

	public static function __callStatic($name, $arguments) {
	    throw new Exception('Call to undefined method ' . __CLASS__ . '::' . $name . '()', ExceptionInterface::noStaticMethodImplement);
	}

	public static function ___onLoaded() {
	    //classes\Error::triggerError(self::getCalledClass() . "::___onLoaded() was not explicitly implemented", E_USER_NOTICE);
	}

	public static function getCalledClass() {
	    return \get_called_class();
	}

    }

}
