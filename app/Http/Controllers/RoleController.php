<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'permission' => 'required'
        ]);

        $role = new Role();
        $role->name = $fields['name'];
        $role->slug = $fields['name'];
        $role->save();

        $listOfPermission = explode(',', $fields['permission']);
        foreach($listOfPermission as $permission){
            $id = Permission::insertGetId([
                'name' => $permission,
                'slug' => $permission,
            ]);

            $role->permission()->attach($id);
        }

        return redirect()->route('role.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id', '=', $id)->first();
        return view('role.edit', compact('role'));
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
        $fields = $request->validate([
            'name' => 'required|string',
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $fields['name'];
        $role->slug = $fields['name'];
        $role->save();

        $role->permission()->delete();
        $role->permission()->detach();

        $listOfPermission = explode(',', $fields['permission']);
        foreach($listOfPermission as $permission){
            $id = Permission::insertGetId([
                'name' => $permission,
                'slug' => $permission,
            ]);

            $role->permission()->attach($id);
        }

        return redirect()->route('role.index');
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
    }
    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->permission()->delete();
        $role->permission()->detach();
        $role->delete();
       
        return redirect()->route('role.index');
    }
}
