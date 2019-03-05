<?php

namespace App\Http\Controllers\Printing;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('3d.admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create-pages');

        $page = new Page();
        $page->fill($request->only(['name', 'slug']));
        $page->created_by = auth()->guard('web')->user()->id;
        $page->updated_by = auth()->guard('web')->user()->id;
        $page->save();

        return redirect()->route('3d.page.edit', ['page' => $page]);
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
        $this->authorize('edit-pages');

        $page = Page::findOrFail($id);

        return view('3d.admin.pages.edit', compact('page'));
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
        $this->authorize('edit-pages');

        $page = Page::findOrFail($id);
        $page->fill($request->only(['name', 'slug', 'content']));
        $page->created_by = auth()->guard('web')->user()->id;
        $page->updated_by = auth()->guard('web')->user()->id;
        $page->save();

        return redirect()->route('3d.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete-pages');

        $page = Page::findorFail($id);
        $page->delete();

        return redirect()->back();
    }
}
