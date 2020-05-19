<?php

/**
 * @license Apache 2.0
 */

/**
 * @OA\Get(
 *     path="/warehouses/get-all",
 *     tags={"Warehouses"},
 *     summary="Get all warehouses",
 *     operationId="getAll",
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
 *          description="OK",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={{"id": 1,
 *                          "name": "Home",
 *                          "address": "92567 Reichert Falls Apt. 118Addieport, DE 70779-4050",
 *                          "city": "Port Noemouth",
 *                          "phone": "+1.262.219.5590"
 *                          },
 *                          {
 *                          "id": 2,
 *                          "name": "Jewelry, Electronics & Home",
 *                          "address": "94586 Watsica Rue\nWoodrowside, WI 10026-8775",
 *                          "city": "Bergstromhaven",
 *                          "phone": "+19065969141"
 *                          },
 *                          {
 *                          "id": 3,
 *                          "name": "Games, Toys & Baby",
 *                          "address": "5418 Ondricka Port Apt. 034\nSouth Laurianemouth, NV 41962",
 *                          "city": "Camrynbury",
 *                          "phone": "(983) 281-5781 x2341"
 *                      }}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="name",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="address",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="city",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="phone",
 *                  type="string",
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

/**
 * @OA\Get(
 *     path="/warehouses",
 *     tags={"Warehouses"},
 *     summary="Show warehouses after applying filters and/or search",
 *     operationId="index",
 *     @OA\Parameter(
 *          name="product",
 *          in="query",
 *          description="Filter warehouses by products in them",
 *          required=false,
 *          @OA\Schema(
 *              type="string"
 *          ),
 *          style="form",
 *          example="Chair",
 *     ),
 *     @OA\Parameter(
 *          name="city",
 *          in="query",
 *          description="Filter warehouses by city name",
 *          required=false,
 *          @OA\Schema(
 *              type="string"
 *          ),
 *          style="form",
 *          example="Bergstromhaven",
 *     ),
 *     @OA\Parameter(
 *          name="stock",
 *          in="query",
 *          description="Filter warehouses by minimal amount of stock in single warehouse",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="1000",
 *     ),
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
 *          response=400,
 *          description="Bad Request",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "No query results for model [App\Warehouse]."}
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
 *          description="Find warehouses with this paramters",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"id": 11,
 *                       "name": "Industrial & Garden",
 *                       "address": "87357 Tina Light Suite 112\nNew Rosie, ID 42455-7720",
 *                       "city": "Hauckfort",
 *                       "phone": "+1.531.344.1211"}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="name",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="address",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="city",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="phone",
 *                  type="string",
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

/**
 * @OA\Post(
 *     path="/warehouses",
 *     tags={"Warehouses"},
 *     summary="Store new created warehouses",
 *     operationId="store",
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"name": "Docker ware",
 *                       "address": "5075 Savannah Groves\nGeovanybury, WA 66872-5664",
 *                       "city": "North Caledonia",
 *                       "phone": "775.226.4180"},
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="name",
 *                      type="string",
 *                  ),
 *                  @OA\Property(
 *                     property="address",
 *                     type="string",
 *                  ),
 *                  @OA\Property(
 *                      property="city",
 *                      type="string",
 *                  ),
 *                  @OA\Property(
 *                      property="phone",
 *                      type="string",
 *                  )
 *              )
 *          ),
 *     ),
 *     @OA\Response(
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
 *          description="New warehouses successfully created",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"warehouse": {
 *                              "name": "Stock Corporations",
 *                              "address": "Avenie of Palms",
 *                              "city": "Madagascar",
 *                              "phone": "464/2133254",
 *                              "id": 17
 *                              },
 *                       "message": "Record successfully created!"},
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="warehouses",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="address",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="city",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="phone",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="id",
 *                          type="integer",
 *                      )
 *                  )
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string"
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * ),
 */

/**
 * @OA\Get(
 *     path="/warehouses/{warehouse}",
 *     tags={"Warehouses"},
 *     summary="Show warehouse for a given ID",
 *     operationId="show",
 *     @OA\Parameter(
 *          name="warehouse",
 *          in="path",
 *          description="Warehouse ID",
 *          required=true,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          example=16,
 *     ),
 *     @OA\Response(
 *          response=401,
 *          description="Unauthorized",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={
 *                "message": "Token not provided"
 *              }
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="message"
 *              )
 *          )
 *     ),
 *     @OA\Response(
 *          response=404,
 *          description="Bad Request",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "No results for given ID of Warehouse."}
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
 *          description="Display data of warehouse for given id",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"warehouse": {
 *                              "id": 17,
 *                              "name": "Stock Corporations",
 *                              "address": "Avenie of Palms",
 *                              "city": "Madagascar",
 *                              "phone": "464/2133254"
 *                       }}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="warehouse",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(
 *                          property="id",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="address",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="city",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="phone",
 *                          type="string",
 *                      )
 *                  )
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

/**
 * @OA\Patch(
 *     path="/warehouses/{warehouse}",
 *     tags={"Warehouses"},
 *     summary="Update warehouse for a given ID",
 *     operationId="update",
 *     @OA\Parameter(
 *          name="warehouse",
 *          in="path",
 *          description="Warehouse ID",
 *          required=true,
 *          example=16,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *     ),
 *     @OA\Parameter(
 *          name="name",
 *          in="query",
 *          description="Name of warehouse",
 *          required=true,
 *          example="Your items warehouse"
 *     ),
 *     @OA\Parameter(
 *          name="address",
 *          in="query",
 *          description="Warehouse address",
 *          required=true,
 *          example="Main road 99A"
 *     ),
 *     @OA\Parameter(
 *          name="city",
 *          in="query",
 *          description="Warehouse City",
 *          required=true,
 *          example="Las Veganis"
 *     ),
 *     @OA\Parameter(
 *          name="phone",
 *          in="query",
 *          description="Contact Phone",
 *          required=true,
 *          example="587-480-596"
 *     ),
 *     @OA\Response(
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
 *          response=404,
 *          description="Bad Request",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "No query results for model [App\Warehouse]."}
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
 *              example={"message": "Data into fields is invalid."}
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
 *          description="New warehouse successfully created",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"warehouse": {
 *                          "id": 17,
 *                          "name": "Trade company for dreams",
 *                          "address": "Main Roads Of Dreams",
 *                          "city": "Atlantidaa in the oceans",
 *                          "phone": "464213325433"
 *                       },
 *                      "message": "Record successfully updated!"}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="warehouse",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(
 *                          property="id",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="address",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="city",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="phone",
 *                          type="string",
 *                      )
 *                  )
 *              ),
 *              @OA\Property(
 *                  property="message"
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

/**
 * @OA\Delete(
 *     path="/warehouses/{warehouse}",
 *     tags={"Warehouses"},
 *     summary="Delete warehouse for a given ID",
 *     operationId="delete",
 *     @OA\Parameter(
 *          name="warehouse",
 *          in="path",
 *          description="Warehouse ID",
 *          required=true,
 *          example=17,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *     ),
 *     @OA\Response(
 *          response=404,
 *          description="Bad Request",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "No results for given ID of Warehouse."}
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
 *          response=204,
 *          description="Successfully deleted warehouse!",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={
 *                  "message": "Record successfully deleted."
 *              },
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="message",
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */
