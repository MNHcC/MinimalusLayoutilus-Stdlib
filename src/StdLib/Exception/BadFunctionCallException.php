<?php

/*
 * Copyright (C) 2014 Michael Hegenbarth (carschrotter) <mnh@mn-hegenbarth.de>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace MNHcC\MinimalusLayoutilus\StdLib\Exception {

    use MNHcC\MinimalusLayoutilus\StdLib;

    /**
     * BadFunctionCallException
     *
     * @author MNHcC  - Michael Hegenbarth (carschrotter) <mnh@mn-hegenbarth.de>
     * @copyright 2014, MNHcC  - Michael Hegenbarth (carschrotter) <mnh@mn-hegenbarth.de>
     * @license gpl20
     */
    class BadFunctionCallException extends \BadFunctionCallException implements ExceptionInterface {

        use StdLib\MinimalusLayoutilusTrait,
            StdLib\NoInstancesTrait,
            ExceptionTrait {
            StdLib\MinimalusLayoutilusTrait::__toString insteadof ExceptionTrait;
        }
    }
    
}
