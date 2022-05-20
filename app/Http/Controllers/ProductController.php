<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class ProductController extends Controller
{
    /**
     * Show a list of all of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrders()
    {
        $orders = DB::select('SELECT * FROM `order`');
        if($orders) {
            // display results
            return response()->json(['status' => 'success', 'data' => $orders]);
        } else {
            // show error message
            return response()->json(['status'=> 'failed', 'message' => 'No Orders Found!!']);
        }
    }

    /**
     * Show the list of all orders by specific ID
     * @return \Illuminate\Http\Response
    */
    public function getSingleOrder($id) {
        $order = DB::select('SELECT * FROM `order` WHERE `id` = ?', [$id]);
        if($order) {
            // order is found, return the result
            return response()->json(['message' => 'success', 'data' => $order]);
        } else {
            // order not found, show error flag
            return response()->json(['status' => 'failed', 'message' => 'Order Not Found..']);
        }
    }

    public function getOrderWithDetails($id) {
        $order = DB::select('SELECT * FROM `order_details` WHERE `order_id` = ?', [$id]);
        if($order) {
            // order is found, return the result
            return response()->json(['message' => 'success', 'data' => $order]);
        } else {
            // order not found, show error flag
            return response()->json(['status' => 'failed', 'message' => 'Order Details Not Found..']);
        }
    }

}
