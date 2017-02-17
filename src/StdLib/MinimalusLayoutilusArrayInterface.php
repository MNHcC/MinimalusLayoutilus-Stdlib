<?php

namespace MNHcC\MinimalusLayoutilus\StdLib {
    use ArrayAccess;
    use Traversable;
    use Countable;
    
    interface MinimalusLayoutilusArrayInterface extends ArrayAccess, Traversable, Countable{

        /** 	 
         * Creates a copy of the MinimalusLayoutilusArray.
         * @return array a copy of the values as array
         */
        public function getArrayCopy();
        
        /**
         * 
	 * Exchange the array for another one.
	 * @param mixed $input <p>
	 * The new array or object to exchange with the current array.
	 * </p>
	 * @return array the old array.
	 */
	public function exchangeArray($input);
        
    }

}
