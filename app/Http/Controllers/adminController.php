<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

use App\Models\departments;

use App\Models\address;

class adminController extends Controller
{

     public function __construct(){
       
        $this->middleware('AdminCheck',['except' => ['login','doLogin','create','store']]);

     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Admin::join('departments','admins.dep_id','=','departments.id')
                       -> leftJoin('address','admins.id','=','address.user_id')
                       -> select('admins.*','departments.title','address.city')
                       -> orderBy('id', 'desc')->get();
   
              // "select admins.* , departments.title from admins join departments on admins.dep_id = departments.id" 
   
   //leftjoin 
   //rightjoin 

        return view('Admins.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $data = departments::get();
        return view('Admins.create',['data' => $data]);
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

        $this->validate($request, [
            'name'     => 'required|min:5',
            'email'    => 'required|email',
            'password' => 'required|min:6',
            'dep_id'   => "required|numeric",
            "city"     => "required|min:5",
            "extraData" => "required|min:5"
        ]);

        

       $data =  $request->except(['city','extraData','_token']);
       $data['password'] = bcrypt($data['password']);

        $Raw = Admin::create($data);
        
        $op = address::create(['user_id' => $Raw->id , 'city' => $request->city , 'extraData' => $request->extraData]);     


        if ($op) {
            $message = 'Raw Inserted';
        } else {
            $message = 'Error Try Again';
        }

        session()->flash('Message', $message);

        return redirect(url('/Admins'));
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
        echo 'Show Function';
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
        $data = Admin::find($id);

        $dep_data = departments::get();

        return view('Admins.edit', ['data' => $data , 'dep_data' => $dep_data]);
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

        $data = $this->validate($request, [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'dep_id'   => "required|numeric"
        ]);

        $op = Admin::where('id', $id)->update($data);

        if ($op) {
            $message = 'Raw Updated';
        } else {
            $message = 'Error Try Again';
        }

        session()->flash('Message', $message);

        return redirect(url('/Admins'));
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
        $op = Admin::where('id', $id)->delete();

        if ($op) {
            $message = 'Raw Removed';
        } else {
            $message = 'Error Try Again';
        }
        session()->flash('Message', $message);

        return redirect(url('/Admins'));
    }

    public function login()
    {
        return view('Admins.login');
    }

    public function doLogin(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // logic login ....

      //   dd(auth()->guard('web')->attempt($data));
        //    dd(auth('admins')->attempt($data));

        if (auth()->guard('admins')->attempt($data)) {
            return redirect(url('/Admins'));
        } else {
            return redirect(url('/AdminLogin'));
        }
    }

    public function logOut()
    {
        auth()->guard('admins')->logout();
        return redirect(url('/AdminLogin'));
    }
}
