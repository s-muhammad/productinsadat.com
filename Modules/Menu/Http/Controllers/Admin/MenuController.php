<?php

namespace Modules\Menu\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Menu\Entities\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $menus = Menu::latest()->paginate(20);
        return view('menu::Admin.all',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('menu::Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|min:3',
            'link'=>'required'
        ]);
        Menu::create($data);
        return redirect(route('admin.menu.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('menu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Menu $menu)
    {
        return view('menu::Admin.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'title'=>'required|min:3',
            'link'=>'required'
        ]);
        $menu->update($data);
        return redirect(route('admin.menu.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back();
    }
}
