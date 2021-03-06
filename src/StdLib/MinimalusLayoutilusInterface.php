<?php

namespace MNHcC\MinimalusLayoutilus\StdLib {

    /**
     *
     * @author Michael Hegenbarth (carschrotter)
     * @package MinimalusLayoutilus	 
     */
    interface MinimalusLayoutilusInterface {

        const secure = 'Ay0keRT1l8';

        public static function ___onLoaded();

        /**
         * make convertable to string default is classname
         */
        public function __toString();

        /**
         * get the classname
         */
        public function getClass();

        public static function getCalledClass();

        /**
         * replace the default Error to a Exeption
         * @param string $name
         * @param array $arguments
         * @throws Exception
         */
        public function __call($name, $arguments);

        /**
         * replace the default Error to a Exeption
         * @param string $name
         * @param array $arguments
         * @throws Exception
         */
        public static function __callStatic($name, $arguments);
    }

}