<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
class UsersController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

          if($validatedData){
        if ($request->hasFile('photo')) {

            // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image

            $path = $request->file('photo')->storeAs('public/photoUsers', $fileNameToStore);
            // $fileNameToStore=  $path;
        }
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->mobile = request('mobile');
        $user->address = request('name');
        $user->city = request('email');
        $user->country = request('phone');
        $user->zip_code = request('mobile');
        $user->password =Hash::make($request->password);
        $user->photo = $fileNameToStore;

        $user->save();

        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);
          }
        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if ($request->hasFile('photo')) {

            // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image

            $path = $request->file('photo')->storeAs('public/photoUsers', $fileNameToStore);
            // $fileNameToStore=  $path;
        }
        else
        {
            $fileNameToStore =$user->photo;
        }
        $user->name = request('name');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->mobile = request('mobile');
        $user->address = request('name');
        $user->city = request('email');
        $user->country = request('phone');
        $user->zip_code = request('mobile');
        $user->password =Hash::make($request->password);
        $user->photo = $fileNameToStore;

        $user->save();

        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
