<?php

namespace Ktith\Laravelexceptionnotifier\Exceptions;

use Exception;
// GeneralException: - I use this when I want to throw an exception and stop the execution of code,
// usually in a catch block or if an save/update fails. This exception does not report to the log files,
// instead it redirects back with the message (and old input) in an alert-danger bootstrap alert which is rendered from the messages blade partial using the flash_danger key.
class GeneralException extends Exception
{

}
