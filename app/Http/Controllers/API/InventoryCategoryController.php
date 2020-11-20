<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryCategoryController extends Controller
{
    public function __construct()
    {
        # code...
    }

    public function create(InventoryCategoryCreateRequest $request)
    {
        category::create([
            'title' => $request->title,
        ]);
        return response()->json([
            'status' => 'true',
            'message' => "inventory created",
            'data' => $category
        ]);
    }
    
    public function edit(InventoryCategoryEditRequest $request)
    {
        category::where('id', $request->id)->update([
            'title' => $request->title
            ]);
        return response()->json([
            'status' => 'true',
            'message' => "inventory created",
            'data' => $category
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:categories,id'
        ]);
        $category =  category::find($request->id);
        if($category->count == 0){
            $category->delete();
            return response()->json(
                [
                    'status' => 'true',
                    'message' => 'Category deleted!',
                    'data' => null
            ]);
        }else{
            return response()->json([
                'status' => 'false',
                'message' => 'Cannot delete a non-empty category',
                'data' => null
            ]);
        }
    }
}
