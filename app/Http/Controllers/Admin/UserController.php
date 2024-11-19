<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()

    {

        $users = User::count();
        // $branches = Branch::all();
        return view('admin.user.index',compact('users'));
    }


    // yajra pagination
    public function getUsers(Request $request)
    {
        if ($request->ajax()) {

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            if($fromDate == null && $toDate == null){

                $data = User::get();
            }

            else{
                //Date Filter
                $data = User::whereBetween('created_at', [$fromDate, $toDate])->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn = '<button class="btn btn-sm  btn-info ml-2 my-3 edit" value="' . $row->id . '" type="button"><i class="fa fa-edit"></i></button>';
                    $btn = $btn .  '<a class="btn btn-sm btn-danger ml-2 my-3" href="'.url('/user-delete/'.$row->id).'" role="button"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('created', function ($row) {

                    $created_at = $row->created_at;

                    $formatted_date = Carbon::parse($created_at)->format('Y-m-d H:i:s');
                    return $formatted_date;
                })
                ->rawColumns(['action', 'created'])
                ->make(true);

        }
    }


    public function addUser(Request $req){

        $password = $req->user_password;
        $hashedPassword = Hash::make($password);

        User::insert([
            'name' => $req->user_name,
            'email' => $req->user_email,
            'password' => $hashedPassword,
            'status' => $req->status,
            'role_id' => 2,
            'created_at' => now(),

        ]);


        return redirect()->back();
    }



    // edit
    public function editUser($id){

        $user = User::find($id);

        return response()->json([
            'user'=>$user,
        ]);
    }


    // update user
    public function updateUser(Request $req){

        $user = User::find($req->userId);

        $user->name = $req->name;

        $user->email = $req->email;
        $user->status = $req->status;

        if($req->password != null){
            $password = $req->password;
            $hashedPassword = Hash::make($password);

            $user->password= $hashedPassword;
        }

        $user->save();


        return redirect()->back();

    }


    // delete user
    public function deleteUser($id){

        $user=User::find($id);

        if ($user) {
            $user->delete();
        }

        session()->flash('message', 'User deleted successfully!');

        return redirect()->back();
    }

    // update profile
    public function profileUser(){

        $user = Auth::user();

        return view('admin.user.profile',compact('user'));
    }


}
