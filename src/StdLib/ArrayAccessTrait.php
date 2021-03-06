<?php

namespace MNHcC\MinimalusLayoutilus\StdLib;

/**
 * ArrayAccess
 *
 * @author MNHcC  - Michael Hegenbarth (carschrotter) <mnh@mn-hegenbarth.de>
 * @copyright 2014, MNHcC  - Michael Hegenbarth (carschrotter) <mnh@mn-hegenbarth.de>
 * @license default
 */
trait ArrayAccessTrait {

    protected $_store = [];

    public function offsetGet($offset) {
        return $this->_store[$offset];
    }

    public function offsetSet($offset, $value) {
        $this->_store[$offset] = $value;
        return $this;
    }

    public function offsetExists($offset) {
        return \key_exists($offset, $this->_store);
    }

    public function offsetUnset($offset) {
        unset($this->_store[$offset]);
        return $this;
    }

}
