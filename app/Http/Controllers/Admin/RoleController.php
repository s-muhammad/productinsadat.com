<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show-roles')->only(['index']);
        $this->middleware('can:create-role')->only(['create','store']);
        $this->middleware('can:edit-role')->only(['edit','update']);
        $this->middleware('can:delete-role')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::query();
        if ($keywords=request('search')){
            $roles->where('label','LIKE',"%{$keywords}%")
                ->orWhere('name','LIKE',"%{$keywords}%");
        }
        $roles=$roles->latest()->paginate(20);
        return view('admin.roles.all',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'label' => ['required', 'string', 'max:255'],
            'permissions' => ['required', 'array'],
        ]);
        $role = Role::create($data);

        $role->permissions()->sync($data['permissions']);

        alert()->success('با موفقیت انجام شد');
        return redirect(route('admin.roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data= $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('permissions')->ignore($role->id)],
            'label' => ['required', 'string', 'max:255'],
            'permissions' => ['required', 'array'],
        ]);

        $role->update($data);
        $role->permissions()->sync($data['permissions']);
        alert()->success('با موفقیت انجام شد');
        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        alert()->success('با موفقیت انجام شد');
        return back();
    }
}
