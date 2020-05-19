<?php

/**
 * @license Apache 2.0
 */

/**
 * @OA\Get(
 *     path="/arrivals/get-all",
 *     tags={"Arrivals"},
 *     summary="Get all arrivals",
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
 *              example={"message": "No query results for model [App\Arrival]."}
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
 *              example={{"id": 3,
 *                        "arrival_date": "2017-05-14",
 *                        "arrival_stock": 226,
 *                        "expire_date": "2022-01-17",
 *                        "supplier_id": 4,
 *                        "employee_id": 25,
 *                        "product_id": 16,
 *                        "warehouse_id": 1
 *                        },
 *                        {
 *                        "id": 9,
 *                        "arrival_date": "2018-11-25",
 *                        "arrival_stock": 936,
 *                        "expire_date": "2022-09-28",
 *                        "supplier_id": 5,
 *                        "employee_id": 13,
 *                        "product_id": 55,
 *                        "warehouse_id": 6
 *                        },
 *                        {
 *                        "id": 10,
 *                        "arrival_date": "2018-07-09",
 *                        "arrival_stock": 1504,
 *                        "expire_date": "2020-07-05",
 *                        "supplier_id": 7,
 *                        "employee_id": 34,
 *                        "product_id": 47,
 *                        "warehouse_id": 7
 *                        }}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="arrival_date",
 *                  type="date",
 *              ),
 *              @OA\Property(
 *                  property="arrival_stock",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="expire_date",
 *                  type="date",
 *              ),
 *              @OA\Property(
 *                  property="supplier_id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="employee_id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="product_id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="warehouse_id",
 *                  type="integer",
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

/**
 * @OA\Get(
 *     path="/arrivals",
 *     tags={"Arrivals"},
 *     summary="Show arrivals after applying filters and/or search",
 *     operationId="index",
 *     @OA\Parameter(
 *          name="supplier",
 *          in="query",
 *          description="Filter arrivals by supplier",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="1",
 *     ),
 *     @OA\Parameter(
 *          name="employee",
 *          in="query",
 *          description="Filter arrivals by employee",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="1",
 *     ),
 *     @OA\Parameter(
 *          name="product",
 *          in="query",
 *          description="Filter arrivals by product",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="1",
 *     ),
 *     @OA\Parameter(
 *          name="warehouse",
 *          in="query",
 *          description="Filter arrivals by warehouse",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="1",
 *     ),
 *     @OA\Parameter(
 *          name="arrivalDateMin",
 *          in="query",
 *          description="Filter arrivals from this date",
 *          required=false,
 *          @OA\Schema(
 *              type="date"
 *          ),
 *          style="form",
 *          example="2017-05-14",
 *     ),
 *     @OA\Parameter(
 *          name="arrivalDateMax",
 *          in="query",
 *          description="Filter arrivals to this date",
 *          required=false,
 *          @OA\Schema(
 *              type="date"
 *          ),
 *          style="form",
 *          example="2019-11-14",
 *     ),
 *     @OA\Parameter(
 *          name="arrivalStockMin",
 *          in="query",
 *          description="Filter arrivals by minimal arrived stock",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="100",
 *     ),
 *     @OA\Parameter(
 *          name="arrivalStockMax",
 *          in="query",
 *          description="Filter arrivals by maximum arrived stock",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="1000",
 *     ),
 *     @OA\Parameter(
 *          name="expireDays",
 *          in="query",
 *          description="Filter arrivals by how much days left before validity of the product expire",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="30",
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
 *              example={"message": "No query results for model [App\Arrival]."}
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
 *          description="Find arrivals with this paramters",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"id": 3,
 *						 "arrival_date": "2017-05-14",
 *						 "arrival_stock": 226,
 *						 "expire_date": "2022-01-17",
 *						 "supplier_id": 4,
 *						 "employee_id": 25,
 *						 "product_id": 16,
 *						 "warehouse_id": 1,
 *						 "supplier": {
 *						 	"id": 4,
 *						 	"name": "Grocery",
 *						 	"address": "197 Gislason Lights Apt. 641\nSouth Efren, OH 31272-7238",
 *						 	"city": "East Rickeymouth",
 *						 	"phone": "1-340-452-3824 x256"
 *						 },
 *						 "employee": {
 *						 	"id": 25,
 *						 	"name": "Prof. Paul Johnston",
 *						 	"age": 21,
 *						 	"job_description": "Dolorem dolor culpa dignissimos laudantium. Et laborum eaque nobis alias. Iste dignissimos non fugit provident dolorum magni excepturi.",
 *						 	"warehouse_id": 5
 *						 },
 *						 "product": {
 *						 	"id": 16,
 *						 	"name": "Ergonomic Wool Bottle",
 *						 	"description": "Nihil voluptates accusantium aspernatur rerum voluptates nisi ut. Numquam quae suscipit tempora deleniti culpa placeat est dolores. Quas ut ad iusto omnis consequatur sit qui.",
 *						 	"stock": 1020,
 *						 	"price": 262,
 *						 	"category_id": 4
 *						 },
 *						 "warehouse": {
 *						 	"id": 1,
 *						 	"name": "Home",
 *						 	"address": "92567 Reichert Falls Apt. 118Addieport, DE 70779-4050",
 *						 	"city": "Port Noemouth",
 *						 	"phone": "+1.262.219.5590"
 *						 }}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="arrival_date",
 *                  type="date",
 *              ),
 *              @OA\Property(
 *                  property="arrival_stock",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="expire_date",
 *                  type="date",
 *              ),
 *              @OA\Property(
 *                  property="supplier_id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="employee_id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="product_id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="warehouse_id",
 *                  type="integer",
 *              ),
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
 *                  property="employee",
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
 *                          property="age",
 *                         type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="job_description",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="warehouse_id",
 *                          type="integer",
 *                      )
 *                  )
 *              ),
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
 * @OA\Post(
 *     path="/arrivals",
 *     tags={"Arrivals"},
 *     summary="Store new created arrivals",
 *     operationId="store",
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"arrival_date": "2020-01-01",
 *                       "arrival_stock": "6511",
 *                       "expire_date": "2022-01-01",
 *                       "supplier_id": "15",
 *                       "employee_id": "15",
 *                       "product_id": "16",
 *                       "warehouse_id": "13"
 *                       },
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="arrival_date",
 *                      type="date",
 *                  ),
 *                  @OA\Property(
 *                      property="arrival_stock",
 *                      type="integer",
 *                  ),
 *                  @OA\Property(
 *                      property="expire_date",
 *                      type="date",
 *                  ),
 *                  @OA\Property(
 *                      property="supplier_id",
 *                      type="integer",
 *                  ),
 *                  @OA\Property(
 *                      property="employee_id",
 *                      type="integer",
 *                  ),
 *                  @OA\Property(
 *                      property="product_id",
 *                      type="integer",
 *                  ),
 *                  @OA\Property(
 *                      property="warehouse_id",
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
 *          description="New arrivals successfully created",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"arrival": {
 *                          "arrival_date": "2020-01-01",
 *                          "arrival_stock": "6511",
 *                          "expire_date": "2022-01-01",
 *                          "supplier_id": "15",
 *                          "employee_id": "15",
 *                          "product_id": "16",
 *                          "warehouse_id": "13",
 *                          "id": 165
 *                          },
 *                      "message": "Record successfully created!"},
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="arrivals",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(
 *                          property="id",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="arrival_date",
 *                          type="date",
 *                      ),
 *                      @OA\Property(
 *                          property="arrival_stock",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="expire_date",
 *                          type="date",
 *                      ),
 *                      @OA\Property(
 *                          property="supplier_id",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="employee_id",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="product_id",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="warehouse_id",
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
 *     path="/arrivals/{arrival}",
 *     tags={"Arrivals"},
 *     summary="Show arrival for a given ID",
 *     operationId="show",
 *     @OA\Parameter(
 *          name="arrival",
 *          in="path",
 *          description="Arrival ID",
 *          required=true,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          example=165,
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
 *              example={"message": "No results for given ID of Arrival."}
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
 *          description="Display data of arrival for given id",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"arrival": {
 *                          "id": 165,
 *                          "arrival_date": "2020-01-01",
 *                          "arrival_stock": 6511,
 *                          "expire_date": "2022-01-01",
 *                          "supplier_id": 15,
 *                          "employee_id": 15,
 *                          "product_id": 16,
 *                          "warehouse_id": 13,
 *                          "supplier": {
 *                              "id": 15,
 *                              "name": "Kids, Computers & Games",
 *                              "address": "3475 Adonis Station\nPort Bernie, TN 61939",
 *                              "city": "New Danika",
 *                              "phone": "727-306-7480"
 *                          },
 *                          "employee": {
 *                              "id": 15,
 *                              "name": "Mrs. Heidi Heaney DDS",
 *                              "age": 59,
 *                              "job_description": "Corporis minima architecto aliquid praesentium blanditiis minus enim itaque. Eum quaerat non sunt facere ducimus. Iste velit fugit expedita voluptas corrupti.",
 *                              "warehouse_id": 3
 *                          },
 *                          "product": {
 *                              "id": 16,
 *                              "name": "Ergonomic Wool Bottle",
 *                              "description": "Nihil voluptates accusantium aspernatur rerum voluptates nisi ut. Numquam quae suscipit tempora deleniti culpa placeat est dolores. Quas ut ad iusto omnis consequatur sit qui.",
 *                              "stock": 1020,
 *                              "price": 262,
 *                              "category_id": 4
 *                          },
 *                          "warehouse": {
 *                              "id": 13,
 *                              "name": "Jewelry & Clothing",
 *                              "address": "830 Hermann Stravenue\nTylerland, NE 74796",
 *                              "city": "East Charley",
 *                              "phone": "+1 (671) 287-1011"
 *                       }}}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="arrival_date",
 *                  type="date",
 *              ),
 *              @OA\Property(
 *                  property="arrival_stock",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="expire_date",
 *                  type="date",
 *              ),
 *              @OA\Property(
 *                  property="supplier_id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="employee_id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="product_id",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="warehouse_id",
 *                  type="integer",
 *              ),
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
 *                  property="employee",
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
 *                          property="age",
 *                         type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="job_description",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="warehouse_id",
 *                          type="integer",
 *                      )
 *                  )
 *              ),
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
 *     path="/arrivals/{arrival}",
 *     tags={"Arrivals"},
 *     summary="Update arrival for a given ID",
 *     operationId="update",
 *     @OA\Parameter(
 *          name="arrival",
 *          in="path",
 *          description="Arrival ID",
 *          required=true,
 *          example=165,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *     ),
 *     @OA\Parameter(
 *          name="arrival_date",
 *          in="query",
 *          description="Date when product was arrived",
 *          required=true,
 *          example="2019-01-01"
 *     ),
 *     @OA\Parameter(
 *          name="arrival_stock",
 *          in="query",
 *          description="How many units of new product came",
 *          required=true,
 *          example="300",
 *          @OA\Schema(
 *              type="integer",
 *              minimum=1
 *          )
 *     ),
 *     @OA\Parameter(
 *          name="expire_date",
 *          in="query",
 *          description="Date when product will expire",
 *          required=true,
 *          example="2021-06-12"
 *     ),
 *     @OA\Parameter(
 *          name="product_id",
 *          in="query",
 *          description="ID of the product that this arrival belong",
 *          required=true,
 *          example=2,
 *     ),
 *     @OA\Parameter(
 *          name="supplier_id",
 *          in="query",
 *          description="ID of the supplier who shipped this product",
 *          required=true,
 *          example=2,
 *     ),
 *     @OA\Parameter(
 *          name="employee_id",
 *          in="query",
 *          description="ID of the employee who unload this product",
 *          required=true,
 *          example=2,
 *     ),
 *     @OA\Parameter(
 *          name="warehouse_id",
 *          in="query",
 *          description="ID of the warehouse where this product is arrived",
 *          required=true,
 *          example=2,
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
 *          description="New arrival successfully updated",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"arrival": {
 *                          "id": 165,
 *                          "arrival_date": "2020-01-01",
 *                          "arrival_stock": "6511",
 *                          "expire_date": "2022-01-01",
 *                          "supplier_id": "15",
 *                          "employee_id": "15",
 *                          "product_id": "16",
 *                          "warehouse_id": "13"
 *                       },
 *                       "message": "Record successfully updated!"}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="arrival",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(
 *                          property="id",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="arrival_date",
 *                          type="date",
 *                      ),
 *                      @OA\Property(
 *                          property="arrival_stock",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="expire_date",
 *                          type="date",
 *                      ),
 *                      @OA\Property(
 *                          property="supplier_id",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="employee_id",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="product_id",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="warehouse_id",
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
 *     path="/arrivals/{arrival}",
 *     tags={"Arrivals"},
 *     summary="Delete arrival for a given ID",
 *     operationId="delete",
 *     @OA\Parameter(
 *          name="arrival",
 *          in="path",
 *          description="Arrival ID",
 *          required=true,
 *          example=165,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *     ),
 *     @OA\Response(
 *          response=404,
 *          description="Bad Request",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"message": "No results for given ID of Arrival."}
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
 *          description="Successfully deleted arrival!",
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
