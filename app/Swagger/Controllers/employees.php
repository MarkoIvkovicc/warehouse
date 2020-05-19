<?php

/**
 * @license Apache 2.0
 */

/**
 * @OA\Get(
 *     path="/employees/get-all",
 *     tags={"Employees"},
 *     summary="Get all employees",
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
 *              example={"message": "No query results for model [App\Employee]."}
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
 *                          "name": "Zaria Goodwin",
 *                          "age": 54,
 *                          "job_description": "Exedita suscipit magni optio ut sit laboriosam tempore. Dolore pariatur ut illum atque assumenda et deleniti. Earum mollitia nihil at ratione qui. Dolor eum voluptatum voluptas earum aut vero.",
 *                          "warehouse_id": 1
 *                          },
 *                          {
 *                          "id": 2,
 *                          "name": "Dr. Chauncey Wiza DVM",
 *                          "age": 28,
 *                          "job_description": "Necessitatibus dicta laborum ut distinctio omnis. Optio id non reiciendis. Optio voluptatem exercitationem nemo totam. Quam facere veritatis quasi aut reiciendis cupiditate.",
 *                          "warehouse_id": 1
 *                          },
 *                          {
 *                          "id": 3,
 *                          "name": "Seth Towne",
 *                          "age": 18,
 *                          "job_description": "Nostrum ea sunt mollitia officiis cumque. Quidem eius repellendus nihil tenetur error adipisci architecto. Fugiat omnis at nam commodi. Recusandae illo reiciendis expedita ut animi.",
 *                          "warehouse_id": 1
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
 *                  property="age",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="job_description",
 *                  type="string",
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
 *     path="/employees",
 *     tags={"Employees"},
 *     summary="Show employees after applying filters and/or search",
 *     operationId="index",
 *     @OA\Parameter(
 *          name="employee",
 *          in="query",
 *          description="Filter employees by warehouse",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="1",
 *     ),
 *     @OA\Parameter(
 *          name="ageMin",
 *          in="query",
 *          description="Filter employees by minimal age",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="18",
 *     ),
 *     @OA\Parameter(
 *          name="ageMax",
 *          in="query",
 *          description="Filter employees by maximal age",
 *          required=false,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          style="form",
 *          example="65",
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
 *              example={"message": "No query results for model [App\Employee]."}
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
 *          description="Find employees with this paramters",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"id": 7,
 *                       "name": "Kenyatta Haag",
 *                       "age": 56,
 *                       "job_description": "Quod et alias enim aspernatur. A cupiditate perspiciatis autem aperiam.",
 *                       "warehouse_id": 2}
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
 *                  property="age",
 *                  type="integer",
 *              ),
 *              @OA\Property(
 *                  property="job_description",
 *                  type="string",
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
 * @OA\Post(
 *      path="/employees",
 *     tags={"Employees"},
 *     summary="Store new created employees",
 *     operationId="store",
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"name": "John Doe",
 *                       "age": 24,
 *                       "job_description": "Quod et alias enim aspernatur. A cupiditate perspiciatis autem aperiam.",
 *                       "warehouse_id": 2},
 *              @OA\Schema(
 *                  @OA\Property(
 *                     property="name",
 *                     type="string",
 *                  ),
 *                  @OA\Property(
 *                      property="age",
 *                      type="integer",
 *                      minimum=18,
 *                      maximum=65
 *                  ),
 *                  @OA\Property(
 *                      property="job_description",
 *                      type="string",
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
 *          description="New employees successfully created",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"employee": {
 *                              "name": "John Doe",
 *                              "age": "24",
 *                              "job_description": "Lorem ipsum",
 *                              "warehouse_id": "2",
 *                              "id": 74
 *                              },
 *                       "message": "Record successfully created!"},
 *          ),
 *          @OA\Schema(
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
 *                  property="message"
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * ),
 */

/**
 * @OA\Get(
 *     path="/employees/{employee}",
 *     tags={"Employees"},
 *     summary="Show employee for a given ID",
 *     operationId="show",
 *     @OA\Parameter(
 *          name="employee",
 *          in="path",
 *          description="Employee ID",
 *          required=true,
 *          @OA\Schema(
 *              type="integer"
 *          ),
 *          example=74,
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
 *              example={"message": "No results for given ID of Employee."}
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
 *          description="Display data of employee for given id",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"employees": {
 *                              "id": 74,
 *                              "name": "John Doe",
 *                              "age": 24,
 *                              "job_description": "Lorem ipsum",
 *                              "warehouse_id": 2,
 *                              "warehouse": {
 *                                      "id": 2,
 *                                      "name": "Jewelry, Electronics & Home",
 *                                      "address": "94586 Watsica Rue\nWoodrowside, WI 10026-8775",
 *                                      "city": "Bergstromhaven",
 *                                      "phone": "+19065969141"
 *                      }}}
 *          ),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="employees",
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
 *                      ),
 *                      @OA\Property(
 *                          property="warehouse",
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
 *                                  property="address",
 *                                  type="string",
 *                              ),
 *                              @OA\Property(
 *                                  property="city",
 *                                  type="string",
 *                              ),
 *                              @OA\Property(
 *                                  property="phone",
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
 *     path="/employees/{employee}",
 *     tags={"Employees"},
 *     summary="Update employee for a given ID",
 *     operationId="update",
 *     @OA\Parameter(
 *          name="employee",
 *          in="path",
 *          description="Employee ID",
 *          required=true,
 *          example=74,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *     ),
 *     @OA\Parameter(
 *          name="name",
 *          in="query",
 *          description="Name of employee",
 *          required=true,
 *          example="Jany Ding"
 *     ),
 *     @OA\Parameter(
 *          name="age",
 *          in="query",
 *          description="Age of employee",
 *          required=true,
 *          example="30",
 *          @OA\Schema(
 *              type="integer",
 *              minimum=18,
 *              maximum=65
 *          )
 *     ),
 *     @OA\Parameter(
 *          name="job_description",
 *          in="query",
 *          description="Description of employee jobs",
 *          required=true,
 *          example="Lorem Ipsum",
 *     ),
 *     @OA\Parameter(
 *          name="warehouse_id",
 *          in="query",
 *          description="ID of the warehouse that this employee belong (work)",
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
 *          description="New employee successfully updated",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              example={"employee": {
 *                          "id": 75,
 *                          "name": "Janika Dinga",
 *                          "age": "31",
 *                          "job_description": "Loerm ipsum",
 *                          "warehouse_id": "2"
 *                          },
 *                      "message": "Record successfully updated!"}
 *          ),
 *          @OA\Schema(
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
 *                  property="message"
 *              )
 *          )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

/**
 * @OA\Delete(
 *     path="/employees/{employee}",
 *     tags={"Employees"},
 *     summary="Delete employee for a given ID",
 *     operationId="delete",
 *     @OA\Parameter(
 *          name="employee",
 *          in="path",
 *          description="Employee ID",
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
 *              example={"message": "No results for given ID of Employee."}
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
 *          description="Successfully deleted employee!",
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
