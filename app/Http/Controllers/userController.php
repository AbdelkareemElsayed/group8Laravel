<?php

namespace App\Http\Controllers;

use App\Models\student;

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



   public function index(){
 
    //  if(auth()->check()){

     $data =    student::orderBy('id','desc')->get();

     return view('index',["data" => $data]);
    //  }else{
    //    return redirect(url('/login'));
    //  }
   }


    public function create(){
      
        return view('register');

    }


    public function store(Request $request){

      $data = $this->validate($request , [    
         
         "name"     => "required|min:5",
         "email"    => "required|email", 
         "password" => "required|min:6",
         "linkedIn" => "required|url"
  
         ] );

      $data['password'] = bcrypt($data['password']);

   //   $2y$10$XBu92Bm/M0vFNBRIoHZcYuGnoHCCpnzzudiDf6QaUuuW.1ND64Sf.
   //     $2y$10$q.zTxXEo/n4wtxsHOjsp5u20t9afHQf9aAwRCYANIsimMqtvukRhi

      $op =  student::create($data);
   
      if($op){
        $message =  'Raw Inserted';
      }else{
        $message =  'Error Try Again';
      }

      //  session()->put('Message',$message);

      session()->flash('Message',$message);

      return redirect(url('/Student'));



    }




     public function edit($id){

      // $data = student::where('id',$id)->get(); 
       $data = student::find($id);

       return view('edit',['data' => $data]);
        
     }



    public function update(Request $request){

        
       $data = $this->validate($request,
       [    
         "name"     => "required|min:5",
         "email"    => "required|email", 
         "linkedIn" => "required|url" , 
         "id"       => "required"
         ]  
    );



      $op =  student::where('id',$request->id)->update($data);

      if($op){
        $message =  "Raw Updated";
      }else{
        $message = "Error Try Again";
      }
      
      session()->flash('Message',$message);

      return redirect(url('/Student'));


    }




    public function delete($id){

       $op = student::where('id',$id)->delete();

       if($op){
          $message  = "Raw Removed";
       }else{
          $message  = "Error Try Again"; 
       }
       session()->flash('Message',$message);

       return redirect(url('/Student'));

    }



   public function login(){
     return view('login');
   }



   public function doLogin(Request $request){

      $data = $this->validate($request,[
               "email"    => "required|email",
               "password" => "required|min:6"
           
      ]);

      // logic login .... 

      if(auth()->attempt($data)){

           return redirect(url('/Student'));
      }else{
        return redirect(url('/login'));
      }


   }


   public function logOut(){

      auth()->logout();
      return redirect(url('/login'));
   }







   // public function store(Request $request){
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

  //   $data =    $this->validate($request , [
         
  //      "name"     => "required|min:5",
  //      "email"    => "required|email", 
  //      "password" => "required|min:6",
  //      "linkedIn" => "required|url"

  //      ] );


  //      dd($data);
  // }        







  // public function shareData(){
     
  //   $data = ["name" => "Root Account" , "age" => 20 , "Level" => 3 , "GPA" => 3.4];
     
  //   $TeacherName = "Ahmed";

  //   //    return view('profile',["StudentData" => $data , 'teacher' => $TeacherName ]);
        
  //  //     return view('profile')->with(["StudentData" => $data , 'teacher' => $TeacherName ]);  //  with('StudentData',$data)->with('teacher',$TeacherName);  
          
  //       return view('profile',compact('data','TeacherName'));
  // }



}




