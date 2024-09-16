<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Orders;




class HomeController extends Controller 
{
    public function redirect() 
    {
        if (Auth::check()) {  // Check if the user is authenticated
            $user = Auth::user();
            $userType = $user->usertype;
            

            if ($userType == 1) {
                return view('admin.home');
            } else {
                $product=product::paginate(1);
                return view('home.userpage',compact('product'));
            }
        } else {
            // If the user is not authenticated, redirect to the login page
            return redirect()->route('login');
        }
    }

    public function index() 
    {
        $product=product::paginate(1);
        return view('home.userpage',compact('product'));
    }
    public function product_details($id) 
    {
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id) 
    {
        if (Auth::id())
        { 
            $user=Auth::user();

            $product=product::find($id);

            $cart= new cart;
            $cart->Name=$user->name;
            $cart->Email=$user->email;
            $cart->Phone=$user->phone;
            $cart->Address=$user->address;
            $cart->User_Id=$user->id;

            $cart->Product_Title=$product->Title;

            if( $product->Discount_price!=null)
            {
                $cart->Price=$product->Discount_price * $request->quantity;
            }
            else
            {
                $cart->Price=$product->Price * $request->quantity;

            }

            $cart->Product_Id=$product->id;
            $cart->Image=$product->Image;

            $cart->Quantity=$request->quantity;



            $cart->save();
            return redirect()->back();


        } 
        else 
        {
            return redirect('login');
        }

    }
    
    public function show_cart() 
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('home.show_cart',compact('cart'));
        }
        else
        {
            return redirect('login');

        }
        
    }
    public function remove_cart($id)
    {
        $cart=cart::find($id);  
        $cart->delete();  
        return redirect()->back()->with('message','Product deleted successfully');
    }

    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {
            $order=new orders;
            $order->Name=$data->Name;
            $order->Email=$data->Email;
            $order->Phone=$data->Phone;
            $order->Address=$data->Address;
            $order->User_Id=$data->User_Id;

            $order->Product_Title=$data->Product_Title;
            $order->Price=$data->Price;
            $order->Quantity=$data->Quantity;
            $order->Image=$data->Image;
            $order->Product_Id=$data->Product_Id;

            $order->Payment_Status='Cash on Delivery';
            $order->Delivery_Status='Processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with('message','We have recieved your Order. We will connect with you soon...');
    }
}
