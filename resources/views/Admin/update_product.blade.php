<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public" >
  <style type="text/css">
    .div_center
    {
        text-align: center;
        padding-top: 40px;
    }
    .h2_font
    {
        font-size: 30px;
    }
    .font_size
    {
        font-size: 40px;
        padding-bottom: 40px;
    }
    .Center
    {
        margin:auto;
        width: 50%;
        text-align: center; 
        border: 3px solid white;
    }
    label
    {
        display: inline-block;
        width: 200px;
    }

    .div_design
    {
        padding-bottom: 15px;
    }
   
    </style>
    @include('admin.css')
   
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
       
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.header')

     <div class="main-panel">
         <div class="content-wrapper">
         @if(session()->has('message'))

            <div class="alert alert-success">
                
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            x
            </button>
                {{session()->get('message')}}

            </div>
        @endif

         <div class="div_center">

         <h1 class="font_size">Update Product</h1>

         <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">

         @csrf
         <div class="div_design">
            <label>Product Title: </label>
            <input type="text" name="title" placeholder=" Write a title" required="" value="{{$product->Title}}">
        </div>

        <div class="div_design">
            <label>Product Description: </label>
            <input type="text" name="description" placeholder=" Write a description"required="" value="{{$product->Description}}">
        </div>

        <div class="div_design">
            <label>Product Price: </label>
            <input type="number" name="p_price" placeholder=" Write a price" required=""value="{{$product->Price}}">
        </div>

        <div class="div_design">
            <label>Discount Price: </label>
            <input type="number" name="d_price" placeholder=" Dicount price if any" value="{{$product->Discount_price}}">
        </div>

        <div class="div_design">
            <label>Product Quantity: </label>
            <input type="number" name="p_quantity" min="0" placeholder=" Write a quantity"required="" value="{{$product->Quantity}}" >
        </div>
        <div class="div_design">
            <label>Product Category: </label>
            <select name="category" required="" >
            <option value="{{$product->Category}}" selected="" >{{$product->Category}}</option>

            @foreach ($category as $category)
            <option value="{{$category->Category_name}}" >
            <option>{{$category->Category_name}}</option>
            @endforeach

            </select>
        </div>

        <div class="div_design">
            <label>Current Product Image: </label>
            <img style="margin:auto;"  height="150" width="150"  src="/product/{{$product->Image}}" >
        </div>

        <div class="div_design">
            <label>Change Product Image: </label>
            <input type="file" name="image" >
        </div>
        
        <div class="div_design">
            
            <input type="submit" value="Update product" class="btn btn-primary" >
        </div>

        </form>
         </div>

         </div>
        
        </div>
    

  
    <!-- End custom js for this page -->
  </body>
</html>