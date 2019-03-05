<?php

namespace App\Http\Controllers\Printing;

use App\Models\Department;
use App\Models\Filament;
use App\Models\Printer;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::with('owningPrinter')->orderBy('order_column')->get();
        $printers = Printer::all();
        return view('3d.admin.color.index', compact('colors', 'printers'));
        // $colors = Color::all()->pluck('name','id')->all();
        // return view('3d.admin.color.index', compact('colors'));
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
        $color = new Color();
        $color->fill($request->all());
        $color->hex_code = trim($request->get('hex_code'), '#');
        $color->save();

        foreach (Filament::all() as $filament){
            foreach(Department::all() as $department){
                $filament->colors()->attach($color->id, [
                    'quantity' => 0,
                    'department' => $department->id,
                    'printer' => $request->get('printer')
                ]);
            }
        }

        return redirect()->route('3d.color.index');
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
        $color = Color::find($id);
        $printers = Printer::all();

        return view('3d.admin.color.edit', compact('color', 'printers'));
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
        $color = Color::find($id);
        $color->fill($request->all());
        $color->hex_code = trim($request->get('hex_code'), '#');
        $color->save();

        return redirect()->route('3d.color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('edit-colors');

        $color = Color::findorFail($id);
        $color->delete();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request)
    {
        $this->authorize('edit-colors');

        $order = json_decode($request->get('order'))[0];
        foreach($order as $key => $row){
            $color = Color::find($row->id);
            $color->order_column = $key;
            $color->save();
        }
        return response()->json(['status' => true]);
    }
}
