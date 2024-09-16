<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;
use App\models\product;


class AdminController extends Controller
{
    public function view_category()
    {
        $data=Category::all(    );
        return view("admin.category",compact('data'));  
    }
    public function add_category(Request $request)
    {
        $data=new Category;
        $data->Category_name=$request->Category_name;
        $data->save();
        return redirect()->back()->with("message","Category added successfully");
       // return view("admin.category");
    }
    public function delete_Category($id)
    {
        $data=Category::find($id);
        $data->delete();   
        return redirect()->back()->with("message","Category deleted successfully");
    }

    public function view_product()
    {
        $category=category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request)   
    {
        $product=new Product;  

        $product->Title=$request->title;
        $product->Description=$request->description;
        $product->Price=$request->p_price;
        $product->Quantity=$request->p_quantity;
        $product->Category=$request->category;
        $product->Discount_price=$request->d_price;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->Image=$imagename;

        $product->save();
        return redirect()->back()->with('message','Product added successfully');
    }
    public function show_product()
    {
        $product=product::all();    
        return view('admin.show_product',compact('product'));   
    }

    public function delete_product($id)
    {
        $product=product::find($id);  
        $product->delete();  
        return redirect()->back()->with('message','Product deleted successfully');
    }
    public function update_product($id)
    {
        $product=product::find($id);  
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $category=category::all();

        return view('admin.update_product', compact('product','category'));   
        
    }

    public function update_product_confirm(Request $request,$id)   
    {
        $product=product::find($id);  
        

        $product->Title=$request->title;
        $product->Description=$request->description;
        $product->Price=$request->p_price;
        $product->Quantity=$request->p_quantity;
        $product->Category=$request->category;
        $product->Discount_price=$request->d_price;
        $image=$request->image;
        if($image)
        {
            
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->Image=$imagename;
        }

        $product->save();
        return redirect()->back()->with('message','Product updated successfully');
    }
}
