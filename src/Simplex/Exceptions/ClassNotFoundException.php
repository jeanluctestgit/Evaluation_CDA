<?php
/**
 * Created by iKNSA.
 * User: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 20/04/2021
 * Time: 12:36
 */


namespace Simplex\Exceptions;


use Throwable;

class ClassNotFoundException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if ($message === "") {
            $message = "Class not found";
        }

        parent::__construct($message, $code, $previous);
    }
}
