<?php

namespace MNHcC\MinimalusLayoutilus\StdLib\Exception;
{

    /**
     * Interface for the MinimalusLayoutilus Exception.
     * <p>
     * Important, all exceptions should implement \JsonSerializable and mnhcc\ml\interfaces\MNHcC
     * </p>
     * @author Michael Hegenbarth (carschrotter)
     * @package MinimalusLayoutilus	 
     */
    interface ExceptionInterface extends \JsonSerializable {

        const noMethodImplement = 7;
        const noStaticMethodImplement = 14;

    }

}