<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function createNew(InventoryCreateRequest $request)
    {

        $inventory = inventory::create([
            'title' => $request->name,
            'qty_available' => $request->qty,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'true',
            'data' => $inventory,
            'message' => "Inventory added successfully"
        ]);
    }

    public function deleteInventory(Request $request)
    {
        inventory::delete(['id' => $request->id]);
        return response()->json([
            'status' => 'true',
            'message' => 'Inventory record deleted!',
            'data' => null
        ]);
    }

    public function editInventory(InventoryEditRequest $request)
    {
        $inventory = inventory::where('id', $request->id)->update([
            'title'=> $request->title,
            'qty' => $request->qty,
            'description' => $request->description
        ]);
        
        return response()->json([
            'status' => 'true',
            'message' => 'Inventory record edited successfully',
            'data' => $inventory
        ]);
    }

    public function inventoryStatistics(Request $request)
    {

        $inventory_published  = inventory::where('status', 1);
        $inventory_unpublished  = inventory::where('status', 1);
        $inventory_category  = categories::count();

        return response()->json(compact('inventory_published','inventory_unpublished','inventory_category'));
        
    }


   
}
