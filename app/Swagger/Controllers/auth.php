<?php

/**
 * @license Apache 2.0
 */

/**
 * @OA\Post(
 *     path="/login",
 *     tags={"Auth"},
 *     summary="Log in the user",
 *     operationId="authenticate",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     format="email"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string",
 *                     format="password"
 *                 ),
 *                 example={"email": "admin@mail.com", "password": "1234ABCD"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *          response=422,
 *          description="Unprocessable Entity",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={
 *                "message": "The given data was invalid.",
 *                "errors": {"email": {{"The email field is required."}}}
 *              }
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="message"
 *              ),
 *              @OA\Property(
 *                  property="errors"
 *              )
 *          )
 *     ),
 *     @OA\Response(
 *          response=401,
 *          description="Unauthorized",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "Invalid credentials"}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="message"
 *              )
 *          )
 *     ),
 *     @OA\Response(
 *          response=500,
 *          description="Internal Server Error",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "Internal Server Error"}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="message"
 *              )
 *          )
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU2MjQxMjcwOSwiZXhwIjoxNTYyNDE2MzA5LCJuYmYiOjE1NjI0MTI3MDksImp0aSI6Iks5Y1VrTXp4czhFaTZQUVAiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.PeZ-4rdDdAxWgQEcv0ypASQkq3vNOVvc75Gd3Kc4raE"}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="token"
 *              )
 *          )
 *     )
 * )
 */

 /**
 * @OA\Get(
 *     path="/logout",
 *     tags={"Auth"},
 *     summary="Logout the user",
 *     operationId="logout",
 *     @OA\Response(
 *          response=422,
 *          description="Unprocessable Entity",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={
 *                "message": "The given data was invalid.",
 *                "errors": {"token": {{"The token field is required."}}}
 *              }
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="message"
 *              ),
 *              @OA\Property(
 *                  property="errors"
 *              )
 *          )
 *     ),
 *     @OA\Response(
 *          response=401,
 *          description="Unauthorized",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "User must first login."}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="message"
 *              )
 *          )
 *     ),
 *     @OA\Response(
 *          response=400,
 *          description="Bad Request",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "Given token is invalid."}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="message"
 *              )
 *          )
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="Logout successfully",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "User has successfully logged out"}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="message"
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

 /**
  * @OA\Post(
  *     path="/register",
  *     tags={"Auth"},
  *     summary="Create new user",
  *     operationId="register",
  *     @OA\RequestBody(
  *         required=true,
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             example={"name": "Mike", "email": "Mike@mail.com", "password": "1234ABCDEF"},
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="name",
  *                     type="string",
  *                 ),
  *                 @OA\Property(
  *                     property="email",
  *                     type="string",
  *                     format="email",
  *                 ),
  *                 @OA\Property(
  *                     property="password",
  *                     type="string",
  *                     format="password",
  *                 )
  *             )
  *         )
  *    ),
  *    @OA\Response(
  *         response=422,
  *          description="Unprocessable Entity",
  *          @OA\MediaType(
  *              mediaType="application/json",
  *              example={
  *                "message": "The given data was invalid.",
  *                "errors": "All fields is required."
  *              }
  *          ),
  *          @OA\Schema(
  *              @OA\Property(
  *                  property="message"
  *              ),
  *              @OA\Property(
  *                  property="errors"
  *              )
  *          )
  *     ),
  *     @OA\Response(
  *          response=400,
  *          description="Bad Request",
  *          @OA\MediaType(
  *              mediaType="application/json",
  *              example={"message": "Data into fields is invalid."}
  *          ),
  *          @OA\Schema(
  *              @OA\Property(
  *                  property="message"
  *              )
  *          )
  *     ),
  *     @OA\Response(
  *          response=200,
  *          description="New user successfully register",
  *          @OA\MediaType(
  *              mediaType="application/json",
  *              example={"name": "Mike", "email": "Mike@mail.com", "password": "1234ABCD", "updated_at": "2020-02-12 14:59:40", "created_at": "2020-02-12 14:59:40", "id": "230",
  *                       "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93YXJlaG91c2UubG9jYWxcL2FwaVwvbG9naW4iLCJpYXQiOjE1ODE1MTU0NjUsImV4cCI6MTU4MTUyMjY2NSwibmJmIjoxNTgxNTE1NDY1LCJqdGkiOiI1Wng0dTdYSXJ6V0JxczBtIiwic3ViIjoyMjgsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.6j2uTU6JruQ6ClMq1g-ReEbKcNV_8xSTwUpJwNuuWKw"}
  *          ),
  *          @OA\Schema(
*                 @OA\Property(
*                     property="name",
*                     type="string",
*                 ),
*                 @OA\Property(
*                     property="email",
*                     type="string",
*                     format="email",
*                 ),
*                 @OA\Property(
*                     property="password",
*                     type="string",
*                     format="password",
*                 ),
*                 @OA\Property(
*                     property="updated_at",
*                     type="string",
*                     format="date",
*                 ),
*                 @OA\Property(
*                     property="created_at",
*                     type="string",
*                     format="date",
*                 ),
*                 @OA\Property(
*                     property="id",
*                     type="integer",
*                 )
*          )
*     )
* )
*/

 /**
  * @OA\Get(
  *     path="/refresh",
  *     tags={"Auth"},
  *     summary="Validate new token",
  *     description=" New access token or ID token without having to re-authenticate the user.
  *                 A Refresh Token is a special kind of token that can be used to obtain a renewed access token.
  *                 User are able to request new access tokens until the Refresh Token is blacklisted.",
  *     operationId="refreshToken",
  *     @OA\Response(
  *          response=401,
  *          description="Unauthorized or invalid token given",
  *          @OA\MediaType(
  *              mediaType="application/json",
  *              example={
  *                "message": "Failed to re-authenticate because of invalid authorization header."
  *              }
  *          ),
  *          @OA\Schema(
  *              @OA\Property(
  *                  property="message"
  *              )
  *          )
  *     ),
  *     @OA\Response(
  *          response=200,
  *          description="Re-authenticate user successfully",
  *          @OA\MediaType(
  *              mediaType="application/json",
  *              example={
  *                 "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93YXJlaG91c2UubG9jYWxcL2FwaVwvcmVmcmVzaCIsImlhdCI6MTU4MTU4NDU0OCwiZXhwIjoxNTgxNTkxNzU5LCJuYmYiOjE1ODE1ODQ1NTksImp0aSI6IjNReTdkbmhBZXRyU3FrdEwiLCJzdWIiOjIyOCwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.CM8tiixnG1QKtnNwR-ZdFRNKGBS_Eo9flvA2MPXVXpM",
  *                 "token_type": "bearer",
  *                 "expires_in": 7200
  *              }
  *          ),
  *          @OA\Schema(
  *              @OA\Property(
  *                  property="access_token"
  *              ),
  *              @OA\Property(
  *                  property="token_type"
  *              ),
  *             @OA\Property(
  *                  property="expires_in"
  *             )
  *         )
  *     ),
  *     security={{"bearerAuth": {}}}
  * )
  */

 /**
  * @OA\Get(
  *     path="/me",
  *     tags={"Auth"},
  *     summary="Display data for authenticated user",
  *     description="Show all values for current authenticated user",
  *     operationId="currentUser",
  *     @OA\Response(
  *          response=401,
  *          description="Unauthorized",
  *          @OA\MediaType(
  *              mediaType="application/json",
  *              example={"message": "User must first login."}
  *          ),
  *          @OA\Schema(
  *              @OA\Property(
  *                  property="message"
  *              )
  *          )
  *     ),
  *     @OA\Response(
  *          response=200,
  *          description="Display user data",
  *          @OA\MediaType(
  *              mediaType="application/json",
  *              example={
  *                 "id": 228,
                     "name": "Marko",
                     "email": "marko@mail.com",
                     "email_verified_at": null,
                     "created_at": "2020-02-04 10:17:30",
                     "updated_at": "2020-02-04 10:17:33",
  *              }
  *          ),
  *          @OA\Schema(
  *              @OA\Property(
  *                  property="id"
  *              ),
  *              @OA\Property(
  *                  property="name"
  *              ),
  *             @OA\Property(
  *                  property="email"
  *             ),
  *             @OA\Property(
  *                  property="email_verified_at"
  *             ),
  *             @OA\Property(
  *                  property="created_at"
  *             ),
  *             @OA\Property(
  *                  property="updated_at"
  *             )
  *         )
  *     ),
  *     security={{"bearerAuth": {}}}
  * )
  */
