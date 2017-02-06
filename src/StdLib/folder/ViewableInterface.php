<?php

namespace MNHcC\MinimalusLayoutilus\StdLib {

    /**
     *
     * @author Michael Hegenbarth (carschrotter)
     * @package MinimalusLayoutilus	 
     */
    interface ViewableInterface {

        public function getDataToTemplate($name = "");

        public function Name();
    }

}