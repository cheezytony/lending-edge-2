<?php

namespace App\Traits;

use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;

trait ReturnsAuthenticationResponse
{
    /**
     * Returns failed authentication reponse.
     *
     * @return mixed
     */
    public function failedAutheticationResponse()
    {
        return $this->errorResponse(
            __('auth.failed'),
            null,
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    /**
     * Returns successful authentication reponse.
     *
     * @param \App\Models\User|\Illuminate\Contracts\Auth\Authenticatable|null $user
     * @param string|null $token
     * @return mixed
     */
    public function successfulAuthenticationResponse($user, string $token)
    {
        return $this->successResponse(
            __('auth.passed'),
            [
                'expires_in' => auth()->factory()->getTTL() * 60,
                'token' => $token,
                'user' => new UserResource($user)
            ],
        );
    }

    /**
     * Returns failed authentication reponse.
     *
     * @return mixed
     */
    public function failedAccountCreationResponse()
    {
        return $this->errorResponse(
            __('auth.create.failed'),
            null,
            Response::HTTP_BAD_REQUEST
        );
    }

    /**
     * Returns successful authentication reponse.
     *
     * @param \App\Models\User|\Illuminate\Contracts\Auth\Authenticatable|null $user
     * @param string|null $token
     * @return mixed
     */
    public function successfulAccountCreationResponse($user, string $token)
    {
        return $this->successResponse(
            __('auth.create.passed'),
            [
                'expires_in' => auth()->factory()->getTTL() * 60,
                'token' => $token,
                'user' => new UserResource($user)
            ],
            Response::HTTP_CREATED
        );
    }
}
