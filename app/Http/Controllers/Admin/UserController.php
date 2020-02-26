<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function index()
    {
        // echo Admin;die;      //using constants from constants.php file
        $logged_in_user = Auth::user()->id;
        // echo $logged_in_user;die;
        $users = User::orderBy('id')->paginate(3);
        // dd($roles->toArray());
        return view('admin.users.index',compact('users'));
    }

    public function create() {
        $roles = get_roles();           //helper function
        return view('admin.users.create',compact('roles'));
    }

    public function store(Request $request) {

        // echo "<pre>";
        // print_r($request->all());die;
        $create_user = new User();

        //One method to insert data using form
        // $create_user->name = $request->username;
        // $create_user->email = $request->emailid;
        // $create_user->password = $request->password;
        // $create_user->dob = date('Y-m-d',strtotime($request->dob));
        // $create_user->is_active = $request->status;
        // $create_user->save();

        //Another method to insert data using form
        $post = $request->input();
        $create_user = new User();
        $create_user->name = $post['username'];
        $create_user->email = $post['emailid'];
        $create_user->password = $post['password'];
        $create_user->dob = date('Y-m-d',strtotime($post['dob']));
        $create_user->is_active = $post['status'];
        $file = $request->file('imgs');                 //similar to $_FILES method in php, note: filename must be imgs only in input field as well
        // dd($request->file());
        $filename = $file->getClientOriginalName();     // gets the name of the file
        $filesize = $file->getClientSize();             // gets the size of the file
        $file->storeAs('public/userimages',$filename);            // stores file inside storage/public/userimages folder
        $create_user->user_imgs = $filename;

        // dd($request->all());
        $insertUser = $create_user->save();

        if($insertUser) {
            $users_id = $create_user->id;                      //finds last inserted users id
            $users = User::findorFail($users_id);
            $users->roles()->attach($request->roles);       //and attach specific role to it in the role_user table

            $users_data = ["users_data"=>$create_user];
            $user_encode = json_encode($users_data);
               // dd($user_encode);
            $file_open = fopen(UserLogPath.'/'.$users_id.'.json','w+');
            fwrite($file_open,$user_encode);

            $data = ['status'=>'200','success'=>'User has been Created Successfully!'];
            return redirect()->route('admin.users.index')->with($data);
        }
        else{
            $data = ['status'=>'404','warning'=>'Error in Creating User'];
            return redirect()->route('admin.users.index')->with($data);
        }
    }

    public function edit($id) {
        $user = User::where('id',$id)->first();           //another method => whereUserId(1)->first()
        $roles = Role::all();
        if(Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning','You are not allowed to edit yourself...');
        }
        return view('admin.users.edit',compact('user','roles'));
    }

    public function update(Request $request,$id) {
        $user = User::findorFail($id);
        $imgFile = $request->file('user_imgs');

        $user->update([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'is_active'=>$request->is_active
        ]);

        if($imgFile != null) {
            $filename = $imgFile->getClientOriginalName();
            $imgFile->storeAs('public/userimages',$filename);
            $user->update(['user_imgs'=>$filename]);
        }

        // $user->update($request->all());         //all functions update all fields, if any single field is not
                                                    // changed then it is updated as it is. but cannot able to update img field
        if($request->roles) {
            $user->roles()->sync($request->roles);
        }

        $data = [
            'success' => 'Users has been updated successfully!'
        ];
        return redirect()->route('admin.users.index')->with($data);
    }

    public function destroy($id) {
        if(Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning','You are not allowed to delete yourself...');
        }
        $user = User::findorFail($id);
        User::destroy($id);

        if($user->user_imgs != '') {
            unlink('storage/userimages/'.$user->user_imgs);     //deletes file from folder it is deleting from app/public/storage/userimages folder
        }

        //Another method
        // $user = User::findorFail($id);
        // $user->delete();
        $data = [
            'success' => 'Users has been deleted successfully!'
        ];
        return redirect()->route('admin.users.index')->with($data);
    }
}
