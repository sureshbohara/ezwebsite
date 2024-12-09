<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ImageHelper;

class AuthController extends Controller
{
    public function adminLoginForm(){

        //  $password = 'changamart4645';
        // $hashedPassword = Hash::make($password);
        // dd($hashedPassword);die;

        if (Auth::check()) {
            return $this->redirectToDashboard(Auth::user()->role_id);
        }
        return view('admin.admin_login');
    }

    public function adminLoginSubmit(Request $request){
      $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|min:6',
     ]);

     if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
     }

     $remember = $request->has('remember');
     $user = User::where('email', $request->email)->first();
     if (!$user) {
        return response()->json(['msg' => 'Email not found'], 404);
     }

     if ($user->status == 0) {
        return response()->json(['msg' => 'Your account is not active'], 403);
     }

     if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
        Auth::user()->touch();
        $role_id = Auth::user()->role_id;
        return response()->json([
            'msg' => 'Login Successful. Welcome back, ' . Auth::user()->name,
            'role_id' => $role_id
        ]);
     } else {
        return response()->json(['msg' => 'Login Failed. Please enter a valid email and password.'], 401);
    }
   }


    private function redirectToDashboard($role_id)
    {
        switch ($role_id) {
            case 1:
                return redirect()->route('admin.dashboard');
            case 2:
                return redirect()->route('employee.dashboard');
            case 3:
                return redirect()->route('customer.dashboard');
            default:
                return redirect()->route('admin.login.form');
        }
    }

    public function adminLogout(Request $request){
    Auth::logout();
    $request->session()->flush();
    $request->session()->flash('success', 'You have been logged out');
    return redirect()->route('users.login.form');
   }


    public function accountDelete(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->delete();
        $request->session()->flash('success', 'Your account has been deleted successfully');
        return redirect()->route('users.login.form');
    }

    public function updateProfies(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $user = Auth::user();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->address = $data['address'];
            $user->mobile = $data['mobile'];
            $user->info = $data['info'];
            $user->gender = $data['gender'];

            if ($request->hasFile('image')) {
                ImageHelper::handleDeletedImage($user, 'image', 'images/');
                $user->image = ImageHelper::handleUploadedImage($request->file('image'), 'images');
            }

            $user->save();
            return response()->json(['msg' => 'Profile updated successfully!'], 200);
        }

        $adminDetails = User::where('email', Auth::user()->email)->first();
        return view('admin.users.update_profiles', compact('adminDetails'));
    }

    public function updateAdminPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'new_password' => 'required|min:8|different:current_password',
                'confirm_password' => 'required|same:new_password',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $user = Auth::user();
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json(['errors' => ['msg' => 'Current password is incorrect.']], 422);
            }

            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json(['status' => true, 'msg' => 'Password updated successfully']);
        }

        return view('admin.users.update_password');
    }
}
