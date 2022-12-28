<?php

namespace App\Http\Controllers;

use App\Models\Plating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // End Destroy

    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        $jml_pasang = Plating::where('created_by', '=', Auth::user()->name)->count();
        $jml_unracking = Plating::where('updated_by', '=', Auth::user()->name)->count();
        $jml_kensa = Plating::where('created_by', '=', Auth::user()->name)->count();
        return view('admin.admin_profile_view', compact('adminData','jml_pasang','jml_kensa','jml_unracking'));
    } // End Profile

    public function editprofile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function storeprofile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_images')) {
            $file = $request->file('profile_images');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_images'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }


}
