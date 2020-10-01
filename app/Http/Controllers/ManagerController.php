<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ManagerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function newManager(){
        return view('auth.register');
    }

    public function listManager(){
        try {

            $users = DB::table('users')->where('status', 1)->paginate(10);

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'users' => $users
        ];

        return view('admin.users.list-users')->with($data);
    }

    public function deleteManager($user_id){
        DB::table('users')->where('id', $user_id)->delete();

        return Redirect::back()->with('message','Success! The manager is deleted!');
    }

    public function editManager(Request $request){

        try {

            if ($request->password != $request->password_confirmation){
                return Redirect::back()->with('error','Error! The password is not match!');
            }else{

                if ($request->password && $request->password_confirmation){
                    DB::table('users')
                        ->where('id', $request->user_id)
                        ->update(array(
                            'name' => $request->user_name,
                            'password' => Hash::make($request->password),
                            'updated_at' => now()
                        ));
                }else{
                    DB::table('users')
                        ->where('id', $request->user_id)
                        ->update(array(
                            'name' => $request->user_name,
                            'updated_at' => now()
                        ));
                }
            }

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        return Redirect::back()->with('message','Success! '.$request->user_name.' manager is edited!');
    }
}
