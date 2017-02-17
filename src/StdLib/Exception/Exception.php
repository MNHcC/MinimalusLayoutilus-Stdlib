<?php

/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MNHcC\MinimalusLayoutilus\StdLib\Exception;

use \Exception as BaseException;

/**
 * 
 * @todo add description to Exception
 * @author Michael Hegenbarth <mnh@mn-hegenbarth.de>
 */
class Exception extends BaseException implements ExceptionInterface {
    use ExceptionTrait;
}
