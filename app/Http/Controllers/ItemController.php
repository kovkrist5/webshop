<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('category')->get();
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item= Item::find($id);
        if(!$item){
            return response()->json(["message"=>"item not found"]);
        }
        
        return response()->json($item);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            "name"=>"string",
            "categoryId"=>"integer",
            "stock"=>"integer",
            "price"=>"integer",
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()], 422);
        }
        $item= Item::find($id);
        if(!$item){
            return response()->json(['message'=>'item not found'], 404);
        }
        $item->update($request->all());
        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
