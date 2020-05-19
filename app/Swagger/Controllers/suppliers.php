<?php

/**
 * @license Apache 2.0
 */

/**
 * @OA\Get(
 *     path="/suppliers/get-all",
 *     tags={"Suppliers"},
 *     summary="Get all suppliers",
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
 *                          "name": "Computers",
 *                          "address": "6988 Tobin Squares Suite 019\nPierretown, TX 77938-6986",
 *                          "city": "Breannafort",
 *                          "phone": "587-480-5969 x26898"
 *                          },
 *                          {
 *                          "id": 2,
 *                          "name": "Industrial",
 *                          "address": "1525 Kemmer Pike\nTrompville, AL 90179",
 *                          "city": "South Shyanne",
 *                          "phone": "(508) 567-6736 x01413"
 *                          },
 *                          {
 *                          "id": 3,
 *                          "name": "Electronics, Shoes & Tools",
 *                          "address": "3701 Hudson Field Suite 211 East Jordi, MA 68278-7574",
 *                          "city": "Enosview",
 *                          "phone": "(417) 812-8540"
 *                     }}
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
 *     path="/suppliers",
 *     tags={"Suppliers"},
 *     summary="Show suppliers after applying filters and/or search",
 *     operationId="index",
 *     @OA\Parameter(
 *          name="city",
 *          in="query",
 *          description="Filter suppliers by city name",
 *          required=false,
 *          @OA\Schema(
 *              type="string"
 *          ),
 *          style="form",
 *          example="Breannafort",
 *     ),
 *     @OA\Parameter(
 *          name="phone",
 *          in="query",
 *          description="Filter suppliers by phone",
 *          required=false,
 *          @OA\Schema(
 *              type="string"
 *          ),
 *          style="form",
 *          example="1-340-452-3824 x256",
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
 *              example={"message": "No query results for model [App\Supplier]."}
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
 *          description="Find suppliers with this paramters",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"id": 10,
 *                       "name": "Games, Kids & Grocery",
 *                       "address": "5075 Savannah Groves\nGeovanybury, WA 66872-5664",
 *                       "city": "North Bernadine",
 *                       "phone": "775.226.4180 x63057"}
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
 *      path="/suppliers",
 *     tags={"Suppliers"},
 *     summary="Store new created suppliers",
 *     operationId="store",
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"name": "Games, Kids & Grocery",
 *                       "address": "5075 Savannah Groves\nGeovanybury, WA 66872-5664",
 *                       "city": "North Bernadine",
 *                       "phone": "775.226.4180 x63057"},
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
 *          description="New suppliers successfully created",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"supplier": {
 *                          "name": "Co and Sonss Two",
 *                          "address": "Main Bulevarrs Of Dream",
 *                          "city": "Atlantidaa in the ocean",
 *                          "phone": "46421332543",
 *                          "id": 33
 *                          },
 *                       "message": "Record successfully created!"},
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="supplier",
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
 *     path="/suppliers/{supplier}",
 *     tags={"Suppliers"},
 *     summary="Show supplier for a given ID",
 *     operationId="show",
 *     @OA\Parameter(
 *          name="supplier",
 *          in="path",
 *          description="Supplier ID",
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
 *              example={"message": "No results for given ID of Supplier."}
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
 *          description="Display data of supplier for given id",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"supplier": {
 *                          "id": 16,
 *                          "name": "Health & Books",
 *                          "address": "74117 Brenden Row Suite 414\nBlancashire, SC 24742-9978",
 *                          "city": "Darrenberg",
 *                          "phone": "836-412-7801 x7324"
 *                       }}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="supplier",
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
 *     path="/suppliers/{supplier}",
 *     tags={"Suppliers"},
 *     summary="Update supplier for a given ID",
 *     operationId="update",
 *     @OA\Parameter(
 *          name="supplier",
 *          in="path",
 *          description="Supplier ID",
 *          required=true,
 *          example=16,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *     ),
 *     @OA\Parameter(
 *          name="name",
 *          in="query",
 *          description="Name of supplier",
 *          required=true,
 *          example="Company Trade"
 *     ),
 *     @OA\Parameter(
 *          name="address",
 *          in="query",
 *          description="Supplier address",
 *          required=true,
 *          example="Main road 99A"
 *     ),
 *     @OA\Parameter(
 *          name="city",
 *          in="query",
 *          description="Supplier City",
 *          required=true,
 *          example="Las Vegas"
 *     ),
 *     @OA\Parameter(
 *          name="phone",
 *          in="query",
 *          description="Contact Phone",
 *          required=true,
 *          example="587-480-5969 x26898"
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
 *              example={"message": "No query results for model [App\Supplier]."}
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
 *          description="New supplier successfully created",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"supplier": {
 *                          "id": 33,
 *                          "name": "Trade company for dreams",
 *                          "address": "Main Roads Of Dreams",
 *                          "city": "Atlantidaa in the oceans",
 *                          "phone": "464213325433"
 *                       },
 *                      "message": "Record successfully updated!"}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="supplier",
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
 *     path="/suppliers/{supplier}",
 *     tags={"Suppliers"},
 *     summary="Delete supplier for a given ID",
 *     operationId="delete",
 *     @OA\Parameter(
 *          name="supplier",
 *          in="path",
 *          description="Supplier ID",
 *          required=true,
 *          example=33,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *     ),
 *     @OA\Response(
 *          response=404,
 *          description="Bad Request",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "No results for given ID of Supplier."}
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
 *          description="Successfully deleted supplier!",
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
