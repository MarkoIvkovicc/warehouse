<?php

/**
 * @license Apache 2.0
 */

/**
 * @OA\Get(
 *     path="/categories/get-all",
 *     tags={"Categories"},
 *     summary="Get all categories",
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
 *              example={{"id": 4,
 *                       "name": "Grocery & Outdoors",
 *                       "description": "Rerum omnis minus esse praesentium accusantium. Qui est adipisci ea repellat deserunt rerum. Velit modi vitae eum molestiae dolorem tempore. Fuga a enim ipsa ducimus nemo aut."
 *                        },
 *                       {
 *                       "id": 5,
 *                       "name": "Books, Electronics & Jewelry",
 *                       "description": "Ut deleniti corrupti magni quod id ducimus. Eos est qui ipsam quis. Ut optio sed explicabo molestiae rerum ut iusto."
 *                       },
 *                       {
 *                       "id": 6,
 *                       "name": "Industrial, Automotive & Electronics",
 *                       "description": "Quasi earum animi voluptatum voluptate. Sint quod veniam nihil at eveniet sed quia."
 *                        }}
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
 *                  property="description",
 *                  type="string",
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

/**
 * @OA\Get(
 *     path="/categories",
 *     tags={"Categories"},
 *     summary="Show categories after applying filters and/or search",
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
 *          response=400,
 *          description="Bad Request",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "No query results for model [App\Category]."}
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
 *          description="Find categories with this paramters",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"id": 4,
 *                       "name": "Grocery & Outdoors",
 *                       "description": "Rerum omnis minus esse praesentium accusantium. Qui est adipisci ea repellat deserunt rerum. Velit modi vitae eum molestiae dolorem tempore. Fuga a enim ipsa ducimus nemo aut."}
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
 *                  property="description",
 *                  type="string",
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

/**
 * @OA\Post(
 *      path="/categories",
 *     tags={"Categories"},
 *     summary="Store new created categories",
 *     operationId="store",
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"name": "Fruit",
 *                       "description": "A fruit is the seed-bearing structure in flowering plants."},
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="name",
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
 *          description="New categories successfully created",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"category": {
 *                          "name": "Fruit",
 *                          "description": "A fruit is the seed-bearing structure in flowering plants.",
 *                          "id": 33},
 *                       "message": "Record successfully created!"},
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="name",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="description",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="message"
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * ),
 */

/**
 * @OA\Get(
 *     path="/categories/{category}",
 *     tags={"Categories"},
 *     summary="Show category for a given ID",
 *     operationId="show",
 *     @OA\Parameter(
 *          name="category",
 *          in="path",
 *          description="Category ID",
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
 *              example={"message": "No results for given ID of Category."}
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
 *          description="Display data of category for given id",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"category": {
 *                                  "id": 16,
 *                                  "name": "Kids",
 *                                  "description": "Aperiam excepturi fugit dolores pariatur. Omnis facilis expedita perferendis nihil. Et odio nisi harum incidunt omnis minus."}}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="products",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="description",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="stock",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="price",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="category_id",
 *                          type="array",
 *                          @OA\Items(
 *                              @OA\Property(
 *                                  property="id",
 *                                  type="integer",
 *                              ),
 *                              @OA\Property(
 *                                  property="name",
 *                                  type="string",
 *                              ),
 *                              @OA\Property(
 *                                  property="description",
 *                                  type="string",
 *                              )
 *                          )
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
 *     path="/categories/{category}",
 *     tags={"Categories"},
 *     summary="Update category for a given ID",
 *     operationId="update",
 *     @OA\Parameter(
 *          name="category",
 *          in="path",
 *          description="Category ID",
 *          required=true,
 *          example=126,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *     ),
 *     @OA\Parameter(
 *          name="name",
 *          in="query",
 *          description="Name of category",
 *          required=true,
 *          example="Fruit"
 *     ),
 *     @OA\Parameter(
 *          name="description",
 *          in="query",
 *          description="Description of category",
 *          required=true,
 *          example="Aperiam excepturi fugit dolores pariatur. Omnis facilis expedita perferendis nihil. Et odio nisi harum incidunt omnis minus."
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
 *              example={"message": "No query results for model [App\Category]."}
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
 *          description="New category successfully created",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"category": {
 *                          "id": 32,
 *                          "name": "Fruitt",
 *                          "description": "Aperiam excepturi fugit dolores pariatur. Omnis facilis expedita perferendis nihil. Et odio nisi harum incidunt omnis minus."},
 *                       "message": "Record successfully updated!"}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="category",
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
 *                          property="description",
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
 *     path="/categories/{category}",
 *     tags={"Categories"},
 *     summary="Delete category for a given ID",
 *     operationId="delete",
 *     @OA\Parameter(
 *          name="category",
 *          in="path",
 *          description="Category ID",
 *          required=true,
 *          example=125,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *     ),
 *     @OA\Response(
 *          response=404,
 *          description="Bad Request",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "No results for given ID of Category."}
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
 *          description="Successfully deleted category!",
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
