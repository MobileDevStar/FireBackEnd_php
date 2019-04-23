<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "dddddddddddddd";
        return  redirect()->to('signup');
       // $data = "dsssssssssssssss";
     //   return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function register()
    {
        $email = $_GET["email"];
        $username = $_GET["username"];
        $password = $_GET["password"];

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebackend-2b477-56c9f83b3960.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://firebackend-2b477.firebaseio.com/')
        ->create();

        $auth = $firebase->getAuth();
        $userProperties = [
            'email' => $email,
            'emailVerified' => false,
            'password' => $password,
            'displayName' => $username,
            'photoUrl' => '',
            'disabled' => false,
        ];
        
        $createdUser = $auth->createUser($userProperties);

        $database = $firebase->getDatabase();

        $newPost = $database
        ->getReference('users/' .$createdUser->uid)
        ->set($createdUser);

            if ($createdUser == null) {
                echo "err";
            } else {
                echo print_r($createdUser->uid);
            }
       // $data = "dsssssssssssssss";
     //   return $data;
    }
}
