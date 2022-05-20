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

    /**
     * Get a list of 'order_details'
     * @return \Illuminate\Http\Response
     */
    public function getOrderWithDetails($id) {

        // assuming "order_details" table exists with foreign key "order_id"
        $order = DB::select('SELECT * FROM `order` o INNER JOIN `order_details` od ON o.id=od.order_id WHERE `od.order_id` = ?', [$id]);
        if($order) {
            // order is found, return the result
            return response()->json(['message' => 'success', 'data' => $order]);
        } else {
            // order not found, show error flag
            return response()->json(['status' => 'failed', 'message' => 'Order Details Not Found..']);
        }

    }

}
