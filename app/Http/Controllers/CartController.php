<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Stripe\Stripe;

class CartController extends Controller
{


    public function addToCart(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $userId = Auth::check() ? Auth::id() : null;
        $sessionId = Session::getId();


        //if product already in cart
        $cartItem = Cart::where('session_id', $sessionId)
            ->where('product_id', $product->id)->first();





        if ($cartItem) {
            //update the quantitu
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            //Add new to cart

            $cartItem = Cart::create([
                'user_id' => $userId,
                'session_id' => $sessionId,
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'image' => $product->image,
            ]);
        }

        $cartCount = Cart::where('session_id', $sessionId)->sum('quantity');


        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully',
            'cartCount' => $cartCount,
            'cartItem' => $cartItem
        ]);
    }



    public function showCart()
    {
        $sessionId = Session::getId();
        $cartItems = Cart::where('session_id', $sessionId)->get();

        $cartTotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'cartTotal'));
    }



    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        $sessionId = Session::getId();
        $cartCount = Cart::where('session_id', $sessionId)->sum('quantity');

        return response()->json([
            'success' => true,
            'cartCount' => $cartCount,
        ]);
    }


    public function removeFromCart($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        $sessionId = Session::getId();
        $cartCount = Cart::where('session_id', $sessionId)->sum('quantity');

        return response()->json([
            'success' => true,
            'cartCount' => $cartCount,
        ]);
    }



    public function checkout()
    {
        $sessionId = Session::getId();
        $cartItems = Cart::where('session_id', $sessionId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty');
        }

        return view('cart.checkout', compact('cartItems'));
    }


    public function createStripeSession(Request $request)
    {

        $sessionId = Session::getId();
        $cartItems = Cart::where('session_id', $sessionId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty');
        }


        Stripe::setApiKey(config('services.stripe.secret'));

        $lineItems = [];


        foreach ($cartItems as $item) {
            $imageUrl = $item->image ? asset('storage/products/' . $item->image) : asset('images/default-product.png');



            $lineItems[] = [
                'price_data' => [
                    'currency' => 'jod',
                    'product_data' => [
                        'name' => $item->name,
                        'images' => [$item->image],

                    ],
                    'unit_amount' => intval($item->price * 1000), // Stripe expects price in cents

                ],
                'quantity' => $item->quantity,

            ];
        }

        // Create Stripe Checkout Session
        $stripeSession = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);

        Session::put('stripe_session_id', $stripeSession->id);

        return redirect($stripeSession->url);
    }




    public function checkoutSuccess(Request $request)
    {
        // Verify stripe session here if needed

        // Clear the cart
        $sessionId = Session::getId();
        Cart::where('session_id', $sessionId)->delete();

        return view('cart.success');
    }




    public function checkoutCancel()
    {
        return view('cart.cancel');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
