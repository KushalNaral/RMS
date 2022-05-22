<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;
use App\Models\Programme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class ApiAuthController extends Controller
{
    //adds a new class and a semester
    public function addClass(Request $request, Programme $programme)
    {

        $validator = Validator::make($request->all(), [

            'branch' => 'required|string|max:255',
            'semester' => 'required|string|max:255',


        ]);

        if($validator->fails())
        {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $programme = new Programme();
        $programme['branch'] = $request['branch'];
        $programme['semester'] = $request['semester'];
        $programme->save();

        return response($programme , 200);


    }



    //shows all enrolled students

    /**
     * @OA\Post(
     *      path="/all",
     *      operationId="getUserList",
     *      tags={"Users"},
     * security={
     *  {"passport": {}},
     *   },
     *      summary="Get list of users",
     *      description="Returns list of users",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function showStudents()
    {
        $users = User::all();
        return response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'data' => [
                'users' => User::all(),
            ],

            'message' => 'All users pulled out successfully'

        ]);
    }


    //registering student

    /**
     * @OA\Post(
     ** path="/addStudent",
     *   tags={"Register"},
     *   summary="Api to enroll new students to an existing class",
     *   operationId="register",
     *
     *  @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *
     *   @OA\Parameter(
     *      name="address",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="phone",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="password_confirmation",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    /**
     * Register api
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function enrollStudent(Request $request)
    {
        $validator = Validator::make($request->all(),
            [

                'name' => 'required|string|max:255',
                'password' => 'required|min:6|string',
                'address' => 'required|string',
                'email' => 'required|string|unique:users',
                'phone' => 'required|string',

            ]);
        if($validator->fails())
        {
            return response(['errors' => $validator->errors()->all(), 422]);
        }

            if($request['password'] == $request['password_confirmation']){


                $students = $request->all();
                $students['password'] = Hash::make($students['password']);

                $user = User::create($students);

                $success['token'] =  $user->createToken('Enroll Token')->accessToken;
                $success['id'] =  $user->id;
                $success['name'] =  $user->name;
                $success['email'] =  $user->email;
                $success['password'] =  $user->password;
                $success['address'] =  $user->address;
                $success['phone'] =  $user->phone;
                return response()->json(['success' => $success])->setStatusCode(Response::HTTP_CREATED);


            }
            else
            {
                return response(['error' => 'The passwords do not match']);
            }
        }



    /**
     * @OA\Post(
     ** path="/login",
     *   tags={"Login"},
     *   summary="Login for enrolled students",
     *   operationId="login",
     *
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|email|string|max:255',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $token = 'Student has been logged in successfully';
            $loginToken = Str::random(44);
            if($user['isAdmin'] == '0')
            {
                $adminStatus = 'false';
            }
            else
            {
                $adminStatus = 'true';
            }
            $user = [
                'token' => $token,
                'loginToken' => $loginToken,
                'id' => $user['id'],
                'adminStatus' => $adminStatus,
                ];

            return response($user, 200);
//            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }











}
