<!DOCTYPE html>
<html lang="en">
  <head>
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

         <h1 class="font_size">Add Product</h1>

         <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">

         @csrf
         <div class="div_design">
            <label>Product Title: </label>
            <input type="text" name="title" placeholder=" Write a title" required="">
        </div>

        <div class="div_design">
            <label>Product Description: </label>
            <input type="text" name="description" placeholder=" Write a description"required="" >
        </div>

        <div class="div_design">
            <label>Product Price: </label>
            <input type="number" name="p_price" placeholder=" Write a price" required="">
        </div>

        <div class="div_design">
            <label>Discount Price: </label>
            <input type="number" name="d_price" placeholder=" Dicount price if any" >
        </div>

        <div class="div_design">
            <label>Product Quantity: </label>
            <input type="number" name="p_quantity" min="0" placeholder=" Write a quantity"required="" >
        </div>
        <div class="div_design">
            <label>Product Category: </label>
            <select name="category" required="">
            <option value="" selected="" >Add a category here </option>
            @foreach ($category as $category)
            <option value="{{$category->Category_name}}" >
            <option>{{$category->Category_name}}</option>
            @endforeach
                
                
            </select>
        </div>

        <div class="div_design">
            <label>Product Image: </label>
            <input type="file" name="image" required="" >
        </div>
        
        <div class="div_design">
            
            <input type="submit" value="Add product" class="btn btn-primary" >
        </div>

        </form>
         </div>

         </div>
        
        </div>
    

  
    <!-- End custom js for this page -->
  </body>
</html>