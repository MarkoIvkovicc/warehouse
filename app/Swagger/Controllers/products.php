<?php

/**
 * @license Apache 2.0
 */

/**
 * @OA\Get(
 *     path="/products/get-all",
 *     tags={"Products"},
 *     summary="Get all products",
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
 *          response=400,
 *          description="Bad Request",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "No query results for model [App\Product]."}
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
 *              example={{"id": 21,
 *                       "name": "Mediocre Rubber Lamp",
 *                       "description": "Qui placeat eligendi amet autem quisquam voluptatem velit. Vel velit dolor in. At velit excepturi voluptatum. Et totam totam dignissimos dolor earum iusto reiciendis.",
 *                       "stock": 1875,
 *                       "price": 860,
 *                       "category_id": 5
 *                       },
 *                       {
 *                       "id": 22,
 *                       "name": "Aerodynamic Plastic Bench",
 *                       "description": "Non quasi sunt corporis tempore facere. Voluptatem dolorum dolore quidem non. Doloremque nemo est repudiandae. Nemo eum saepe cupiditate saepe eum nulla.",
 *                       "stock": 671,
 *                       "price": 7809,
 *                       "category_id": 5
 *                       },
 *                       {
 *                       "id": 23,
 *                       "name": "Durable Wooden Keyboard",
 *                       "description": "Accusantium atque quibusdam et rerum et. Aut ab dolores fugiat quae. Nulla consequatur consequuntur nihil consequuntur dignissimos repudiandae enim quo.",
 *                       "stock": 221,
 *                       "price": 4103,
 *                       "category_id": 5
 *                        }
 *                      }
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
 *              ),
 *              @OA\Property(
 *                  property="stock",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="price",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="category_id",
 *                  type="integer",
 *              ),
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

/**
 * @OA\Get(
 *     path="/products",
 *     tags={"Products"},
 *     summary="Show products after applying filters and/or search",
 *     operationId="index",
 *     @OA\Parameter(
 *          name="category",
 *          in="query",
 *          description="Filter products by category",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="6",
 *     ),
 *     @OA\Parameter(
 *          name="warehouse",
 *          in="query",
 *          description="Filter products by warehouse",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="6",
 *     ),
 *     @OA\Parameter(
 *          name="stockMin",
 *          in="query",
 *          description="Filter products by minimal amount of available",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="50",
 *     ),
 *     @OA\Parameter(
 *          name="stockMax",
 *          in="query",
 *          description="Filter products by maximum amount of stock available",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="5000",
 *     ),
 *     @OA\Parameter(
 *          name="priceMin",
 *          in="query",
 *          description="Filter products by minimal price of products",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="100",
 *     ),
 *     @OA\Parameter(
 *          name="priceMax",
 *          in="query",
 *          description="Filter products by maximum price of products",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="10000",
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
 *              example={"message": "No query results for model [App\Product]."}
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
 *          description="Find produts with this paramters",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"id": 26,
 *                       "name": "Durable Granite Table",
 *                       "description": "Et eveniet numquam pariatur consequuntur. Saepe quo laborum non. Eum dolore velit molestiae debitis.",
 *                       "stock": 1541,
 *                       "price": 1903,
 *                       "category_id": 6,
 *                       "category":{
 *                                  "id": 6,
 *                                  "name": "Industrial, Automotive & Electronics",
 *                                  "description": "Quasi earum animi voluptatum voluptate. Sint quod veniam nihil at eveniet sed quia."
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
 *              ),
 *              @OA\Property(
 *                  property="stock",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="price",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="category_id",
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
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

/**
 * @OA\Post(
 *      path="/products",
 *     tags={"Products"},
 *     summary="Store new created products",
 *     operationId="store",
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"name": "Apple",
 *                       "description": "Fruit that can be used for juice, pie etc.",
 *                       "price": 86,
 *                       "category_id": 5},
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="name",
 *                      type="string",
 *                  ),
 *                  @OA\Property(
 *                      property="description",
 *                      type="string",
 *                  ),
 *                  @OA\Property(
 *                      property="price",
 *                      type="integer",
 *                  ),
 *                  @OA\Property(
 *                      property="category_id",
 *                      type="integer",
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
 *          description="New product successfully created",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"product": {
 *                                  "name": "Apple",
 *                                  "description": "Fruit that can be used for juice, pie etc.",
 *                                  "price": 86,
 *                                  "category_id": 5,
 *                                  "id": 126
 *                                  },
 *                       "message": "Record successfully created!"},
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
 *                          property="price",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="category_id",
 *                          type="integer",
 *                      )
 *                  )
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
 *     path="/products/{product}",
 *     tags={"Products"},
 *     summary="Show product for a given ID",
 *     operationId="show",
 *     @OA\Parameter(
 *          name="product",
 *          in="path",
 *          description="Product ID",
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
 *              example={"message": "No results for given ID of Product."}
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
 *          description="Display data of product for given id",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"product":{
 *                          "id": 16,
 *                          "name": "Ergonomic Wool Bottle",
 *                          "description": "Nihil voluptates accusantium aspernatur rerum voluptates nisi ut. Numquam quae suscipit tempora deleniti culpa placeat est dolores. Quas ut ad iusto omnis consequatur sit qui.",
 *                          "stock": 1020,
 *                          "price": 262,
 *                          "category_id": 4,
 *                          "category": {
 *                              "id": 4,
 *                              "name": "Grocery & Outdoors",
 *                              "description": "Rerum omnis minus esse praesentium accusantium. Qui est adipisci ea repellat deserunt rerum. Velit modi vitae eum molestiae dolorem tempore. Fuga a enim ipsa ducimus nemo aut."
 *                       }}}
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
 *     path="/products/{product}",
 *     tags={"Products"},
 *     summary="Update product for a given ID",
 *     operationId="update",
 *     @OA\Parameter(
 *          name="product",
 *          in="path",
 *          description="Product ID",
 *          required=true,
 *          example=126,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *     ),
 *     @OA\Parameter(
 *          name="name",
 *          in="query",
 *          description="Name of product",
 *          required=true,
 *          example="Chair"
 *     ),
 *     @OA\Parameter(
 *          name="description",
 *          in="query",
 *          description="Description of product",
 *          required=true,
 *          example="A chair is a piece of furniture. It is used for sitting on and it can also be used for standing on, if you can't reach something."
 *     ),
 *     @OA\Parameter(
 *          name="stock",
 *          in="query",
 *          description="Available quantity of stock for some product",
 *          required=true,
 *          example=500,
 *          @OA\Schema(
 *              type="integer",
 *              minimum=0,
 *          )
 *     ),
 *     @OA\Parameter(
 *          name="price",
 *          in="query",
 *          description="Value of the product",
 *          required=true,
 *          example=120,
 *          @OA\Schema(
 *              type="integer",
 *              minimum=0,
 *          )
 *     ),
 *     @OA\Parameter(
 *          name="category_id",
 *          in="query",
 *          description="Value of the category that this product belong",
 *          required=true,
 *          example=6,
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
 *          description="New product successfully created",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"data": {"product": {
 *                                  "name": "Apple",
 *                                  "description": "Fruit that can be used for juice, pie etc.",
 *                                  "stock": 261,
 *                                  "price": 86,
 *                                  "category_id": 5,
 *                                  "id": 126
 *                                  },
 *                       "message": "Record successfully updated!"}}
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
 *                          type="integer",
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
 *     path="/products/{product}",
 *     tags={"Products"},
 *     summary="Delete product for a given ID",
 *     operationId="delete",
 *     @OA\Parameter(
 *          name="product",
 *          in="path",
 *          description="Product ID",
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
 *              example={"message": "No results for given ID of Product."}
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
 *          description="Successfully deleted product!",
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
