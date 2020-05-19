<?php

/**
 * @license Apache 2.0
 */

/**
 * @OA\Get(
 *     path="/home",
 *     tags={"Home"},
 *     summary="Show statistics",
 *     operationId="index",
 *     @OA\Response(
 *          response=401,
 *          description="Unauthorized",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={
 *                "message": "Failed to authenticate because of bad credentials or an invalid authorization header."
 *              }
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
 *          description="View statistics for arrivals date and new register users trought years and over months",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"monthly chart": {
 *                              "name": "Arrival Date Over Year",
 *                              "type": "bar",
 *                              "values": {
 *                                  1,
 *                                  6,
 *                                  7,
 *                                  10
 *                              },
 *                              "labels": {
 *                                  "January",
 *                                  "February",
 *                                  "March",
 *                                  "April"
 *                              },
 *                       }}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="monthly chart",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(
 *                          property="name",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="type",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="values",
 *                          type="array",
 *                          @OA\Items(
 *                              type="integer"
 *                          )
 *                      ),
 *                      @OA\Property(
 *                          property="labels",
 *                          type="array",
 *                          @OA\Items(
 *                              type="string"
 *                          )
 *                      ),
 *                  )
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */
