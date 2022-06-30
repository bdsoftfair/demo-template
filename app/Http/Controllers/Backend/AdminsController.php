<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{

    public $user;
    public function __construct()
    {
        $this->middleware(function($request, $next){
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /***
     *  all Admins list
     */
    public function adminList()
    {

        if(is_null($this->user) || !$this->user->can('admin.index')){
            abort(403, 'Sorry!! Unauthorized Access to show admin list');
        }

        $all_data = Admin::all();
        return view('backend.admins.view', compact('all_data'));
    }
    /***
     *  create admin 
     */
    public function createAdmin()
    {
        if(is_null($this->user) || !$this->user->can('admin.create')){
            abort(403, 'Sorry!! Unauthorized Access to create admin');
        }

        $roles = Role::all();
        // dd($roles);
        return view('backend.admins.create', compact('roles'));
    }
    /***
     *  store admin data
     */
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:100|unique:admins,email',
            'phone_number' => 'required|regex:/(01)[0-9]{9}/',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        // create new admin
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone_number = $request->phone_number;
        $admin->address = $request->address;
        $admin->password = Hash::make($request->password);
        $admin->save();

        if($request->roles){
            $admin->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Admin Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.list')->with($notification);
    }
    /***
     *  admin edit data
     */
    public function editAdmin($id)
    {
        if(is_null($this->user) || !$this->user->can('admin.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Data');
        }

        $edit_data = Admin::where('id',$id)->first();
        // $edit_data = admin::find($id);
        $roles = Role::all();
        return view('backend.admins.edit', compact('edit_data','roles'));
    }
    /***
     *  update admin
     */
    public function updateAdmin(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('admin.update')){
            abort(403, 'Sorry!! Unauthorized Access to Update data');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:100|unique:admins,email,'.$id,
            'phone_number' => 'required|regex:/(01)[0-9]{9}/',
            'address' => 'required',
            'password' => 'nullable|min:6',
        ]);
        // create new admin
        $admin = Admin::where('id',$id)->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone_number = $request->phone_number;
        $admin->address = $request->address;
        if($request->password){
            $admin->password = Hash::make($request->password);
        }
        
        $admin->save();

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Admin has been updated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.list')->with($notification);
    }
    /***
     *  admin delete
     */
    public function deleteAdmin($id)
    {
        if(is_null($this->user) || !$this->user->can('admin.destroy')){
            abort(403, 'Sorry!! Unauthorized Access to delete');
        }


        $admin = Admin::where('id',$id)->first();
        if (!is_null($admin)) {
            $admin->delete();
        }

        $notification = array(
            'message' => 'Admin deleted successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
