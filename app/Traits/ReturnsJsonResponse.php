<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ReturnsJsonResponse
{
    /**
     * Returns a json response in api error format.
     *
     * @param string $message
     * @param mixed|null $error
     * @param int $responseCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse(
        string $message,
        mixed $error = null,
        int $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR
    ) {
        $responseObject = [
            'message' => $message,
            'success' => false
        ];

        if ($error) {
            $responseObject['error'] = $error;
        }

        return $this->jsonResponse($responseObject, $responseCode);
    }

    /**
     * Returns a json response.
     *
     * @param array $responseObject
     * @param int $responseCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonResponse(array $responseObject, int $responseCode)
    {
        return response()
            ->json($responseObject, $responseCode);
    }

    /**
     * Returns a json response in api success format.
     *
     * @param string $message
     * @param mixed|null $data
     * @param int $responseCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse(string $message, $data = null, int $responseCode = Response::HTTP_OK)
    {
        $responseObject = [
            'message' => $message,
            'success' => true
        ];

        if ($data) {
            $responseObject['data'] = $data;
        }

        return $this->jsonResponse($responseObject, $responseCode);
    }
}
