<?php

namespace Josip\Json;

use Josip\Json\Exceptions\JsonDecodeException;
use Josip\Json\Exceptions\JsonEncodeException;

/**
 * @param $value
 * @param int $options
 * @param int $depth
 *
 * @return string
 *
 * @throws JsonEncodeException
 */
function json_encode($value, $options = 0, $depth = 512)
{
    $result = \json_encode($value, $options, $depth);

    if ($result === false) {
        $errorCode = \json_last_error();
        $errorMessage = \json_last_error_msg();

        throw new JsonEncodeException($errorMessage, $errorCode);
    }

    return $result;
}

/**
 * @param string $json
 * @param bool $assoc
 * @param int $depth
 * @param int $options
 *
 * @return mixed
 *
 * @throws JsonDecodeException
 */
function json_decode($json, $assoc = false, $depth = 512, $options = 0)
{
    $result = \json_decode($json, $assoc, $depth, $options);

    if (is_null($result)) {
        $errorCode = \json_last_error();
        $errorMessage = \json_last_error_msg();

        throw new JsonDecodeException($errorMessage, $errorCode);
    }

    return $result;
}
