<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getNumOfOrders(){
        return DB::table('oneprint_order')->count();
    }
    public function getNumOfOrdersByUser($user){
        return DB::table('oneprint_order')->where('order_user', $user)->count();
    }

    public function getNumOfClients(){
        return DB::table('oneprint_user')->count();
    }

    // public function getDueAmount($startDate, $endDate){
    //     $orders = Order::whereBetween('invoice_date', [$startDate, $endDate])->where('status','<>','Paid')->get();
    //     $amount = 0;
    //     foreach ($orders as $order){
    //         $amount += self::getOrderBalanceDue($order);
    //     }
    //     return $amount;
    // }

    public function getOrderAndAmountByMonth($startDate, $endDate){
        // $startDatetime = strtotime($startDate);
        // $endDatetime = strtotime($endDate);
        $startDate = date('Y-m-d',strtotime($startDate));
        $endDatetime = date('Y-m-d',strtotime($endDate));
        //$orders = DB::table('oneprint_order')->whereBetween('order_date', [$startDate,$endDate])->get();
        $orders = DB::table('oneprint_order')->whereBetween('order_date', [$startDate,$endDate])->selectRaw('YEAR(order_date) as invoice_year, MONTH(order_date) as invoice_month,order_price')->orderBy('invoice_year', 'ASC')->orderBy('invoice_month', 'ASC')->get();
        //print($orders);

        $result = array();
        foreach ($orders as $order) {
            if (!isset($result[$order->invoice_year][$order->invoice_month])) {
               $result[$order->invoice_year][$order->invoice_month] = new \stdClass;
               $result[$order->invoice_year][$order->invoice_month]->amount = 0;
               $result[$order->invoice_year][$order->invoice_month]->count = 0;
            }
            $result[$order->invoice_year][$order->invoice_month]->amount += $order->order_price;
            $result[$order->invoice_year][$order->invoice_month]->count += 1;
        }
        return json_encode($result);

    }

    public function getOrderAndAmountByMonthUser($startDate, $endDate,$user){
        // $startDatetime = strtotime($startDate);
        // $endDatetime = strtotime($endDate);
        $startDate = date('Y-m-d',strtotime($startDate));
        $endDatetime = date('Y-m-d',strtotime($endDate));
        //$orders = DB::table('oneprint_order')->whereBetween('order_date', [$startDate,$endDate])->get();
        $orders = DB::table('oneprint_order')->where('order_user',$user)->whereBetween('order_date', [$startDate,$endDate])->selectRaw('YEAR(order_date) as invoice_year, MONTH(order_date) as invoice_month,order_price')->orderBy('invoice_year', 'ASC')->orderBy('invoice_month', 'ASC')->get();
        //print($orders);

        $result = array();
        foreach ($orders as $order) {
            if (!isset($result[$order->invoice_year][$order->invoice_month])) {
               $result[$order->invoice_year][$order->invoice_month] = new \stdClass;
               $result[$order->invoice_year][$order->invoice_month]->amount = 0;
               $result[$order->invoice_year][$order->invoice_month]->count = 0;
            }
            $result[$order->invoice_year][$order->invoice_month]->amount += $order->order_price;
            $result[$order->invoice_year][$order->invoice_month]->count += 1;
        }
        return json_encode($result);

    }

    public function getAllOrder($startDate, $endDate){
        // $startDatetime = strtotime($startDate);
        // $endDatetime = strtotime($endDate);
        $startDate = date('Y-m-d',strtotime($startDate));
        $endDatetime = date('Y-m-d',strtotime($endDate));
        //$orders = DB::table('oneprint_order')->whereBetween('order_date', [$startDate,$endDate])->get();
        $orders = DB::table('oneprint_order')->whereBetween('order_date', [$startDate,$endDate])->get();
        //print($orders);


        return json_encode($orders);
        //return $orders;

    }

    public function getAllOrderByUser($user){

        //$orders = DB::table('oneprint_order')->whereBetween('order_date', [$startDate,$endDate])->get();
        $orders = DB::table('oneprint_order')->where('order_user', $user)->get();
        //print($orders);


        return json_encode($orders);
        //return $orders;

    }


    public function getAllUser(){
        // $startDatetime = strtotime($startDate);
        // $endDatetime = strtotime($endDate);
        //$orders = DB::table('oneprint_order')->whereBetween('order_date', [$startDate,$endDate])->get();
        $orders = DB::table('oneprint_user')->get();
        //print($orders);


        return json_encode($orders);
        //return $orders;

    }
    public function getAmount(){
        $orders = DB::table('oneprint_order')->get();
        $amount = 0;
        foreach ($orders as $order){
            $amount += $order->order_price;
        }
        return $amount;
    }
    
    public function getAmountByUser($user){
        $orders = DB::table('oneprint_order')->where('order_user', $user)->get();
        $amount = 0;
        foreach ($orders as $order){
            $amount += $order->order_price;
        }
        return $amount;
    }
    // private function getOrderTotalPayment($order){
    //     $totalPayment = 0;
        
    //     foreach ($order->order_price as $OrderPayment) {
    //         $totalPayment += $OrderPayment->amount_paid;
    //     }

    //     return (float)bcdiv($totalPayment, 1, 2);
    // }
    private function calculateOrderTotalPrice($order){
        $totalPrice = 0;
        foreach ($order as $orderService) {
            $totalPrice += $orderService->order_price;
            
        }
        return (float)bcdiv($totalPrice, 1, 2);
    }
}
