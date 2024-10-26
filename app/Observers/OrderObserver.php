<?php

namespace App\Observers;

use App\Mail\OrderMail;
use App\Mail\OrderUpdateMail;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
           //send mail to customer
        // $data = [
        //     'content' => 'You have 1 order new !!!',
        //     'name' => Auth::user()->name,
        //     'email' => Auth::user()->email,
        //     'order_total' => $order->total,
        //     'order_products' => $order->products->toArray(),
        // ];

        // Mail::to(Auth::user()->email)->send(new OrderMail($data));


        //send mail to admin
        $data = [
            'content' => 'You have 1 order new !!!',
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'order_total' => $order->total,
            'order_products' => $order->products->toArray(),
        ];

        // dd(OrderProduct::where('order_id', $order->id)->get()->toArray());

        // dd($order);

        Mail::to("lehuuvinh@gmail.com")->send(new OrderMail($data));
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        if($order->wasChanged('status')){

            if($order->status == Order::STATUS_DONE){

                $data['order_id'] = $order->id;
                $data['status'] = $order->status;

                Mail::to("lehuuvinh@gmail.com")->send(new OrderUpdateMail($data));
            }
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
