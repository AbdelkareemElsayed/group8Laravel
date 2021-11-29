<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //

    // public function Message(){
    //     echo "Welcome To Laravel";
    // }


    // public function printDetails($name,$email){

    //     echo 'Name '.$name.' &  Email'.$email;
    // }



    public function create(){
      
        return view('register');

    }



    public function store(Request $request){
        // code ...... 

         // echo $request->name;
        //  echo $request->input('name');
         //    dd($request->all());
        //     dd($request->only(['name','email']));
        //     dd($request->except(['_token']));
         //    dd($request->has('title'));
         //    dd($request->hasAny(['title','name']));  
          //   dd($request->method()); 
          //   dd($request->isMethod('put'));
            // dd($request->ip());
           //    dd($request->path());
         //  dd($request->url());  // fullUrl 


    //    $errors = [];

    //    if(empty($request->name)){
    //        $errors['name'] ="Field Required";
    //    }

    //    if(empty($request->email)){
    //        $errors['Email'] ="Field Required";
    //    }elseif(!filter_var($request->email,FILTER_VALIDATE_EMAIL)){
    //        $errors['Email'] = "Invalid Email";
    //    }


    //    if(count($errors) > 0){
    //        foreach ($errors as $key => $value) {
    //            # code...
    //           echo '* '.$key.' : '.$value.'<br>';
    //         }


    //    }else{
    //        echo "Valid Data";
    //    }

      //  request();

    $data =    $this->validate($request , [
         
       "name"     => "required|min:5",
       "email"    => "required|email", 
       "password" => "required|min:6",
       "linkedIn" => "required|url"

       ] );


       dd($data);
  }        







  public function shareData(){
     
    $data = ["name" => "Root Account" , "age" => 20 , "Level" => 3 , "GPA" => 3.4];
     
    $TeacherName = "Ahmed";

    //    return view('profile',["StudentData" => $data , 'teacher' => $TeacherName ]);
        
   //     return view('profile')->with(["StudentData" => $data , 'teacher' => $TeacherName ]);  //  with('StudentData',$data)->with('teacher',$TeacherName);  
          
        return view('profile',compact('data','TeacherName'));
  }



}




