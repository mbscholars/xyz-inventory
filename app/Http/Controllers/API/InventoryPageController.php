<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryPageController extends Controller
{
    public function fetchInventory(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|max:255'
        ]);

        return response()->json(
            [
                'status' => 'true',
                'message' => '',
                'data' => inventory::where('slug', $request->query('slug'))->first()
            ]);
    }

    private function fetchRelated($category)
    {
        return inventory::where('category', $category)->skip(0)->limit(5)->get();
    }

    public function filterInventory(InventoryFilterRequest $request)
    {
        $category = $request->query('category');
        $search = $request->query('search');
        $price_min = $request->query('price_min');
        $price_max = $request->query('price_max');
        $order = $request->query('order');

        //SEARCH PRODUCTS
        $inventory = inventory::where('status', 1);

        if ($search != null) {
            $inventory = $inventory->where('title', 'LIKE', "%{$search}%");
        }
        if($price_min != null && $price_max != null){
            $inventory = $inventory->where('price','>', $price_min)->where('price', '<', $price_max);
        }
        if($order != null){
            $inventory = $inventory->orderBy($order,'desc');
        }
        $inventory = $inventory->paginate(10);
        
        return response()->json([
            'status' => 'true',
            'data' => $inventory,
            'message' => ''
        ]);
    
    }

}
