<?php

namespace MNHcC\MinimalusLayoutilus\StdLib\Exception;

use MNHcC\MinimalusLayoutilus\StdLib;
/**
 * 
 * @author Michael Hegenbarth (carschrotter)
 * @package MinimalusLayoutilus	 
 */
trait ExceptionTrait {

    use StdLib\MinimalusLayoutilusTrait;

    public function jsonSerialize() {
        if (classes\Router::isDebug()) {
            $value = (object) \get_object_vars($this);
            unset($value->xdebug_message);
            $value->trace = $this->getTrace();
        } else {
            $value = $this->getMessage();
        }
        return $value;
    }

    public function __toString() {
        return $this->getMessage();
    }
    
}
