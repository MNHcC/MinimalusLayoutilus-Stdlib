<?php

/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MNHcC\MinimalusLayoutilus\StdLib\Exception;

use MNHcC\MinimalusLayoutilus\StdLib\Helper\AbstractArrayHelper as ArrayHelper;

/**
 * 
 * @todo add description to WrongTypeException
 * @author Michael Hegenbarth <mnh@mn-hegenbarth.de>
 */
class WrongTypeException extends InvalidArgumentException {

    const TYPE_BOOLEAN = 'boolean';
    const TYPE_INTEGER = 'integer';
    const TYPE_DOUBLE = 'double';
    const TYPE_STRING = 'string';
    const TYPE_ARRAY = 'array';
    const TYPE_OBJECT = 'object';
    const TYPE_RESOURCE = 'resource';
    const TYPE_NULL = NULL;

    public $type = self::TYPE_NULL;
    protected static $_defMessage = 'Argument mus from type "%s" in %s()';

    public static function getDefMessage() {
        $args = \func_get_args();
        $args = ArrayHelper::addBefore($args, self::$_defMessage);
        return \call_user_func_array('sprintf', $args);
    }

    public function __construct($message = '', $code = 0, $previous = null) {

        switch ($message) {
            case self::TYPE_ARRAY:
            case self::TYPE_BOOLEAN:
            case self::TYPE_DOUBLE:
            case self::TYPE_INTEGER:
            case self::TYPE_NULL:
            case self::TYPE_OBJECT:
            case self::TYPE_RESOURCE:
            case self::TYPE_STRING:
                $this->type = $message;
                $caller = debug_backtrace()[1];
                $class = ArrayHelper::get('class', $caller, false);
                $function = (($class) ? $class . '::' : '') . classes\ArrayHelper::get('function', $caller, '__main__');
                $message = \sprintf(self::getDefMessage($this->getType(), $function));
                break;
            default:
                break;
        }
        parent::__construct($message, $code, $previous);
    }

    public function getType() {
        if (empty($this->type)) {
            return \gettype($this->type);
        }
        return (string) $this->type;
    }

}
