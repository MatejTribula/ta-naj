<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//they allow us to access data of the user
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;

class HomeController extends Controller
{
    public function redirect()
    {

        $usertype = Auth::User()->usertype;

        if ($usertype == '1') {
            return view('admin.product');
        } else {
            $data = Product::take(3)->get();

            $user = auth()->user();

            $count = Cart::where('email', $user->email)->count();
            return view('user.index', compact('data', 'count'));
        }
    }



    public function index()
    {

        //if there is any user loged in, redirect will be called, execution of the function stops
        if (Auth::id()) {
            return redirect('redirect');
        } else {
            $data = Product::where('quantity', '>', 0)->take(3)->get();
            return view('user.index', compact('data'));
        }
    }

    public function contact()
    {
        $count = 0;
        if (auth()->check()) {
            $user = auth()->user();
            $count = Cart::where('email', $user->email)->count();
        }
        return view('user.contact', compact('count'));
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $data = [
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('maturitnytest@gmail.com')->send(new ContactFormMail($data));

        return redirect()->back();
    }


    public function products()
    {
        $data = Product::where('quantity', '>', 0)->get();
        $count = 0;
        if (auth()->check()) {
            $user = auth()->user();
            $count = Cart::where('email', $user->email)->count();
        }
        return view('user.products', compact('data', 'count'));
    }

    public function story()
    {
        $count = 0;
        if (auth()->check()) {
            $user = auth()->user();
            $count = Cart::where('email', $user->email)->count();
        }
        return view('user.story', compact('count'));
    }


    // CART FUNC
    public function addCart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = auth()->user();

            $cart = new cart;

            $cart->email = $user->email;

            $product = product::find($id);
            $cart->product_title =  $product->title;
            $cart->color =  $product->color;
            $cart->price =  $product->price;
            $cart->image =  $product->image;

            $cart->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function showCart()
    {
        $user = auth()->user();

        $cart = Cart::where('email', $user->email)->get();
        $count = Cart::where('email', $user->email)->count();
        return view('user.cart', compact('count', 'cart'));
    }

    public function deleteCart($id)
    {
        $data = cart::find($id);
        $data->delete();

        return redirect()->back();
    }



    // ORDER FUNC
    public function billingInfo()
    {
        $user = auth()->user();

        $cart = Cart::where('email', $user->email)->get();
        $count = Cart::where('email', $user->email)->count();

        if ($count > 0) {
            return view('user.billing-info', compact('count', 'cart'));
        } else {
            return redirect()->back();
        }
    }
    public function orderSummary(Request $request)
    {
        $user = auth()->user();

        $cart = Cart::where('email', $user->email)->get();
        $count = Cart::where('email', $user->email)->count();


        if ($request->session()->has('billing_info')) {

            return view('user.summary', compact('count', 'cart'));
        } else {
            return redirect()->back();
        }
    }

    public function storeBillingInfo(Request $request)
    {

        $request->session()->put('billing_info', $request->all());
        return redirect('/summary');
    }

    public function checkout()
    {
        $user = auth()->user();
        $cartItems = Cart::where('email', $user->email)->select('product_title', 'price')->get();

        $lineItems = [];

        foreach ($cartItems as $cartItem) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $cartItem->product_title,
                    ],
                    'unit_amount' => $cartItem->price * 100, // convert price to cents
                ],
                'quantity' => 1, // You might adjust quantity as per your cart implementation
            ];
        }

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('placeOrder'),
            'cancel_url' => route('paymentFailure'),
        ]);

        return redirect()->away($session->url);
    }

    public function placeOrder(Request $request)
    {
        // Retrieve cart data for the authenticated user
        $user = auth()->user();
        $cartItems = Cart::where('email', $user->email)->select('product_title', 'price')->get();



        // Calculate total amount based on cart items
        $totalAmount = 0;
        foreach ($cartItems as $cartItem) {
            $totalAmount += $cartItem->price; // Assuming each cart item has a 'price' attribute
        }

        // Retrieve billing information from the session
        $billingInfo = $request->session()->get('billing_info');

        // Create a new order instance
        $order = new Order();
        $order->name = $billingInfo['name'] ?? '';
        $order->surname = $billingInfo['surname'] ?? '';
        $order->email = $billingInfo['email'] ?? '';
        $order->phone = $billingInfo['phone'] ?? '';
        $order->address = $billingInfo['address'] ?? '';
        $order->country = $billingInfo['country'] ?? '';
        $order->city = $billingInfo['city'] ?? '';
        $order->postal_code = $billingInfo['postal_code'] ?? '';
        $order->products = $cartItems->toJson(); // Store cart data as JSON string
        $order->total_amount = $totalAmount;
        $order->save();


        // Clear cart items associated with the authenticated user
        Cart::where('email', $user->email)->delete();

        // Redirect to a confirmation page or perform any other necessary actions
        return redirect('payment-success');
    }

    public function paymentSuccess()
    {
        $user = auth()->user();
        $count = Cart::where('email', $user->email)->count();
        return view('user.payment-success', compact('count'));
    }
    public function paymentFailure()
    {
        $user = auth()->user();
        $count = Cart::where('email', $user->email)->count();
        return view('user.payment-failure', compact('count'));
    }
}
