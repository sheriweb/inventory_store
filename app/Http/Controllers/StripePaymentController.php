<?php
    
namespace App\Http\Controllers;

use App\Services\theme\HomeService;
use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
     
class StripePaymentController extends Controller
{



    protected  $homeService;

    public function __construct( HomeService $homeService)
    {
       
        $this->homeService = $homeService;
       
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $cart = json_decode($this->homeService->loadCart(), true);
        if (count($cart) != 0) {
            $amount = $cart['sub_total'];
            return view('stripe', compact('amount'));
       }
       
       
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        $charge =   Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from LaravelTus.com." 
        ]);
      
        if($charge->status == 'succeeded'){
            Session::flash('success', 'Payment successful!');
            return back();

        }

        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    // If you must need to pass customer name and address with shipping address then you can use below method code.

    public function stripePostDetails(Request $request)
    {
        
        $cart = json_decode($this->homeService->loadCart(), true);
        
        $line1 = $cart['user']['address'];
        $postal_code = $cart['user']['postal_code'];
        $city = $cart['user']['city'];
        $state = $cart['user']['state'];
        $country = $cart['user']['country'];
        $email = $cart['user']['email'];
        $name = $cart['user']['first_name'].' '.$cart['user']['last_name'];
        $amount = $cart['sub_total'];
        try{
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $customer = Stripe\Customer::create(array(
                    "address" => [
                        "line1" => $line1,
                        "postal_code" => $postal_code,
                        "city" =>  $city ,
                        "state" => $state,
                        "country" =>  $country,
                    ],
                    "email" =>  $email,
                    "name" => $name,
                    "source" => $request->stripeToken
                ));
                if (!isset($customer->id)) {
                    info('customer Error Occured!');
                    Session::flash('error', 'Error Occured!');
                    return back();
                }
            $charge = Stripe\Charge::create ([
                    "amount" => 100 * $amount,
                    "currency" => "usd",
                    "customer" => $customer->id,
                    "description" => "Test payment from Sameer Khan",
                    "shipping" => [
                        "name" => $name,
                        "address" => [
                            "line1" =>  $line1,
                            "postal_code" => $postal_code,
                            "city" => $city,
                            "state" => $state,
                            "country" => $country,
                        ],
                    ]
            ]); 

           
            
            if($charge->status == 'succeeded'){
                $order =  $this->homeService->placeOrder($request);
                info($order['orderId']);
                return redirect()->route('order.success',['orderId'=>$order['orderId'],'status'=>$order['status']]);
                // return view('theme.order-success', compact('order'));
                // Session::flash('success', 'Payment successful!');
               
    
            }
            info('else');
            info('Payment error!');
            Session::flash('error', 'Payment error!');
            return back();
        }
        catch (\Exception $e) {
            info('srtipe exp');
            info($e->getMessage());
            Session::flash('error',$e->getMessage());
            return back();
        } 
        // catch(CardErrorException $e) {
        //     Session::flash('error',$e->getMessage());
        //     return back();
        // } catch(MissingParameterException $e) {
        //     Session::flash('error',$e->getMessage());
        //     return back();
        // }
    }
}