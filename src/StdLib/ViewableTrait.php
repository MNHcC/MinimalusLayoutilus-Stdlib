<?php

namespace MNHcC\MinimalusLayoutilus\StdLib {

    /**
     * Description of Viewable
     *
     * @author Michael Hegenbarth (carschrotter)
     * @package MinimalusLayoutilus	 
     */
    trait ViewableTrait {

        public function getDataToTemplate($name = "") {
            $name = ($name) ? $name : "view." . $this->Name() . ".php";
            require "templates/" . $name;
        }

        public function Name() {
            return get_class($this);
        }

    }

}