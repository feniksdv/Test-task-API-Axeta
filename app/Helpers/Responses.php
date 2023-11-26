<?php

namespace App\Helpers;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * Trait Responses
 * @package App\Helpers
 */
trait Responses
{
    /**
     * @param $data
     * @param int $code
     * @return JsonResponse
     */
    public function successResponseWithData($data, int $code = ResponseAlias::HTTP_OK): JsonResponse
    {
        return response()->json(
            [
                'status' => true,
                'data' => $data
            ],
            $code,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse(int $code = ResponseAlias::HTTP_OK): JsonResponse
    {
        return response()->json(['status' => true], $code,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $messages
     * @param int $code
     */
    public function exceptionResponse($messages, int $code = ResponseAlias::HTTP_OK): void
    {
        $response = response()->json(
            [
                'status' => false,
                'messages' => $messages
            ],
            $code,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
        throw new HttpResponseException($response);
    }
}
