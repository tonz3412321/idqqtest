<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Mockery\CountValidator\Exception;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.user.manage');
    }

    public function indexData()
    {
        $users = User::select(['id','name','email']);

        return Datatables::of($users)
            ->addColumn('action', function ($model) {
                return '
                    <a class="btn btn-xs btn-alt btn-danger delete-user" data-id="'.$model->id.'" data-original-title="Remove">
                            <i class="fa fa-times"></i>Remove
                    </a>'
                    ;

            })
            ->make();

    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Requests\UserRequest $request)
    {

       User::create($request->all());

        return "User created successfully";
    }


    public function destroy($id)
    {
        $students = User::findorfail($id);

        if($id==Auth::user()->id){
            return 'you cant delete your self';
        }

        try{
            $students->forceDelete();
        }
        catch(Exception $e){

            return 'failed';

        }

        return 'user deleted';

    }
}
