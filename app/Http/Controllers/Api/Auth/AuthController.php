<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\RegistrationFormRequest;

class AuthController extends Controller
{
    /**
     * @var bool
     */
    public $loginAfterSignUp = true;

    /**
     * @param RegistrationFormRequest $request
     * @return JsonResponse
     */
    public function login(RegistrationFormRequest $request)
    {
        $userData = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($userData)) {
            return response()->json('Error! Wrong email or password!')->setStatusCode(401);
        }

        return response()->json(compact('token'));
    }

    /**
     * @param RegistrationFormRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function logout()
    {
        try {
            auth()->logout();
            return response()->json(['Message' => 'Logout successfully']);
        } catch (JWTException $exception) {
            return response()->json([ 'error' => $exception->getMessage()])->setStatusCode(500);
        }
    }

    /**
     * @param RegistrationFormRequest $request
     * @return JsonResponse
     */
    public function register(RegistrationFormRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($this->loginAfterSignUp) {
            $token = $this->login($request);
        }

        $response = [
            'data' => $user,
            'token' => $token->original,
        ];

        return response()->json($response);
    }

    /**
     * Get the authenticated User
     *
     * @return JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }
}
