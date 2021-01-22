<?php


namespace App\Http\Responses;


use Illuminate\Http\JsonResponse;
use Throwable;

class ExceptionResponse
{
    public static function build(Throwable $exception): JsonResponse
    {
        $statusCode = $exception->getCode() < 200 ? 400 : $exception->getCode();
        $errorName  = self::makeErrorName($exception);

        return response()->json([
            'error'      => $errorName,
            'error_desc' => $exception->getMessage(),
        ], $statusCode);
    }

    private static function makeErrorName($exception): string
    {
        $path  = explode('\\', get_class($exception));
        $input = array_pop($path);

        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match === strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}
