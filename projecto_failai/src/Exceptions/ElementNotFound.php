<?php

namespace Mod\Exceptions;
use http\Exception;
class ElementNotFound extends \Exception
{
    public function __construct($message = 'Elementas, kurio ieškote - NERASTAS', $code = 404)
{
    parent::__construct($message, $code);
}
}
