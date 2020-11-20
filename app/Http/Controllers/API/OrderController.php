<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->user = auth('api')->user();
    
    }
    public function create(OrderCreateRequest $request)
    {
            //create an Order
            $product = inventory::find($request->product_id);
            if($product->qty < $request->quantity){
                return [
                    'status' => 'false',
                    'message' => 'Value is greater than available quantity'
                ];
            }
            Order::create([
                'product_id' => $request->product_id,
                'qty' => $request->quantity,
                // 'unit_cost' => (new Order)->getProductUnitCost($request->product_id),
                
            ]);
    }
    
    public function edit(OrderEditRequest $request)
    {
        /*        
         This method allows a user to edit his Order data as long as the user has not checked out 
         */
        $Order = Order::find($request->order_id);
         if(!$this->user->can('edit', $Order)){
            return response()->json([
                'status' => 'false',
                'message' => "Authentication Failure! Action not allowed.",
                'data' => null
            ]);
        }

        $Order->qty = $request->qty;
        $Order->comments = $request->comments;
        $Order->save();
        return response()->json([
            'status' => 'true',
            'message' => "Order Updated ",
            'data' => $Order
        ]);
    }

    public function deleteOrder(Request $request)
    {
        /* This gives an administrator the right to delete an Order */
        $request->validate([
            'id' => 'required|integer|exists:orders,id'
        ]);
        $Order = Order::find($request->id);
        if($this->user->can('delete', $Order)){
            $Order->delete();
            return response()->json([
                'status' => 'true',
                'message' => 'Deleted',
                'data' => null
            ]);
        }
    }


    public function userOrderList()
    {
        /* 
        This method returns all the orders made by a customer 
        */
        $OrderList = $this->user->orders->paginate(20);

        return response()->json([
            'status' => 'true',
            'data' => $OrderList
        ]);
    }
}
