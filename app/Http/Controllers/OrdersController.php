<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ { Order, Shop };
class OrdersController extends Controller
{

    public function index(Request $request)
    {
        $orders = $request->user()->orders()->with('state')->get();
        return view('account.orders.index', compact('orders'));
    }


    public function show(Request $request, $id)
    {
        $order = Order::with('products', 'state', 'adresses', 'adresses.country')->findOrFail($id);
        $this->authorize('manage', $order);
        $data = $this->data($request, $order);
        return view('account.orders.show', $data);
    }


    /**
     * Show order confirmation.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function confirmation(Request $request, $id)
    {
        $order = Order::with('products', 'adresses', 'state')->findOrFail($id);
        if(in_array($order->state->slug, ['cheque', 'mandat', 'virement', 'carte', 'erreur'])) {
            
            
            $this->authorize('manage', $order);   
            
            $data = $this->data($request, $order);
            return view('command.confirmation', $data);
        }
    }
    /**
     * Get order data
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return array
     */
    protected function data($request, $order)
    {
        $shop = Shop::firstOrFail();
        $data = compact('order', 'shop');
       /*  if($order->state->slug === 'carte' || $order->state->slug === 'erreur') {
            // Là on s'occupera de Stripe
        }  */
        if($order->state->slug === 'carte' || $order->state->slug === 'erreur') {
            $data = $this->stripe($data, $request, $order);
        }  
        
        return $data;
    }

    protected function stripe($data, $request, $order)
    {
        if($request->session()->has($order->reference)) {
            $data['secret'] = $request->session()->get($order->reference);
        } else {            
            \Stripe\Stripe::setApiKey('sk_test_ADM8RZKOJbWZ9UUo8WxM3yeu00U7zQy0NH');
            $intent = \Stripe\PaymentIntent::create([
                'amount' => (integer) ($order->totalOrder * 100),
                'currency' => 'EUR',
                'metadata' => [
                'reference' => $order->reference,
                ],
            ]);
            $request->session()->put($order->reference, $intent->client_secret);
            $data['secret'] =  $intent->client_secret;
        };
        
        return $data;
    }
}