<?php

/*
 * Copyright (C) 2013 Michael Hegenbarth (carschrotter) <mnh@mn-hegenbarth.de>.
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301  USA
 */

namespace MNHcC\MinimalusLayoutilus\StdLib  {

    /**
     * The register interface for classes automatically events.
     * @author Michael Hegenbarth (carschrotter)
     * @package MinimalusLayoutilus	
     */
    interface ActionsInterface {

	/**
	 * @return array <p>A array of all actions. 
	 * The methods starting with keyword "on" 
	 * and are constructed according to the pattern "onActionName"</p>
	 */
	function getActions();
    }

}