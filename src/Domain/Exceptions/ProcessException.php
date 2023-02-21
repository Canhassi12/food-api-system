<?php

namespace Truckpag\Domain\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ProcessException extends Exception
{
    public static function ProcessFailed(): self
    {
        return new self('process failed :/', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
