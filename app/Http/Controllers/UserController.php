<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Hash;
// Use Hash; enables the password to be stored (in the database) in encrypted format. The Hash 
// functionality is also used in store and update sections on the user controller page.

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         // $this->authorize('ViewAny',User::class);
         //  When We want to update a user(but we don't have authority) we can UNCOMMENT THE $this->authorize('ViewAny', User::class); to give us authority to view any user

        $users=User::all();
      

        return view('user.index', compact('users'));
        // ::signifies the class/model. Class/Models must start with a capital letter. Eg User
        // users in compact('users')); refers to $users in $users=User::all(); So we are compacting/showing all users.
      

    }
    public function filterz(){
    
        return view('user.filterz');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
         $this->authorize('Create', User::class);
        $roles=Role::all();
       
        return view('user.create',compact('roles'));
        // we cannot use compact('user/s') in create(). Since we are creating new users, we don't need to see any or all users.  Compact('user') is used is used in show method to show one USER.  compact('users') is used in index() to show TOTAL users.
      
     
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $input=$request->all();
        //$input refers to protected $fillable = ['name','email','phone','password']; as defined in the user model
    

        if(isset($input['password'])){
            $input['password']=Hash::make($input['password']);
        }
        else{
            unset($input['password']);
        }

        $user=User::create($input);
        $user->syncPermissions($request->input('permissions'));
        //  $user->syncPermissions($request->input('permissions')); SYNCS USER AND PERMISSIONS
        return redirect('/user/'.$user->id);
        // we only want a particular user hence we use .$user->id

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
         // $this->authorize('view', $user);
         //  When We want to update a user(but we don't have authority) we can UNCOMMENT THE $this->authorize('view', User::class); to give us authority to show a user
        return view('user.show', compact('user'));

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
        // $this->authorize('update', User::class);
        // When We want to edit a user (but we don't have authority) we can UNCOMMENT THE $this->authorize('update', User::class); to give us authority to edit a user
        $user=User::find($id);
        $roles=Role::all();
        $permissions=Permission::all();
        return view('user.edit', compact('user','roles','permissions'));
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
        // $this-> authorize('update',User::class);
        // When We want to update a user we can UNCOMMENT THE $this->authorize('update', User::class); to give us authority to update a user
        $user=User::find($id);
        $input=$request->all();
        if(isset($input['password'])){
            $input['password']=Hash::make($input['password']);
        }
        else{
            unset($input['password']);
        }

        $user->update($input);
        $user->syncPermissions($request->input('permissions'));
        //  $user->syncPermissions($request->input('permissions')); SYNCS USERS AND PERMISSIONS
        return redirect('/user/'.$user->id);

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
        $this->authorize('delete', User::class);
        //When We want to delete a user we can UNCOMMENT THE $this->authorize('delete', User::class); to give us authority to delete a user
        $user=User::find($id);
        $user->delete();
        return redirect('/user');
    }
}
