<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    //
    public function __construct()
    {
        # code...
    }

    public function deliveryRequest(deliveryRequest $request)
    {
        /* 
        This method allows the customer to add  a delivery request to the order
         */
        delivery::create([
            'order_id' => $request->order_id,
            'user_id' => $user->id,
            'house_address' => $request->house_address,
            'city' => $request->street,
            'state' => $request->state,
            'country' => $request->country, 
            'status' => 4
        ]);
    }

    public function deliveryUpdateLocation(Request $request)
    {
        $request->validate([
            'delivery_status' => 'required|integer|in:1,2,3,4',
            'id' => 'required|integer|exists:deliveries'
        ]);

        switch ($request->delivery_status) {
            case '1':
                $means = "delivered";
                break;
            case '2':
                $means = "on transit";
            break;
            case '3':
                $means = "packaged";
                # code...
                break;
            case '4':
                $means = "processing";
                # code...
                break;
            default:
                # code...
                $means = "cancelled"; 
                break;
        }
        $delivery = delivery::find($request->id);
        $delivery->status = $request->delivery_status;
        $delivery->status_desc = $means;
        $delivery->save();

        return response()->json([
            'status' => 'true',
            'message' => 'Delivery status updated',
            'data' => $delivery
        ]);
    }

    public function readDelivery(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:deliveries'
        ]);
        $delivery = delivery::find($request->id);
        if($user->can('view', $delivery)){
            return response()->json([
                'status' => 'true',
                'message' => '',
                'data' => $delivery
            ]);
        }

        return response()->json([
            'status' => 'false',
            'message' => 'Request not authorised',
            'data' => null
            ]);
    }
}
