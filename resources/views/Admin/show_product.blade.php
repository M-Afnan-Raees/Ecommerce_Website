<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
   <style>

    .Center
    {
        margin:auto;
        width: 50%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }

    .font_size
    {
        text-align: center;
        padding-top: 20px;
        font-size: 40px;
    }
    .img_size
    {
        width: 150px;
        height: 150px;
    }
    .th_color
    {
        background: skyblue
    }
    .th_des
    {
        padding: 30px;
    }
   </style>
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
         <h2 class="font_size" >All Products</h2>

            <table class="Center" >
                <tr class="th_color" >
                
                <th class="th_des">Product Title</th>
                <th class="th_des">Description</th>
                <th class="th_des">Price</th>
                <th class="th_des">Quantity</th>
                <th class="th_des">Category</th>
                <th class="th_des">Discount Price</th>
                <th class="th_des">Image</th>
                <th class="th_des">Delete</th>
                <th class="th_des">Edit</th>
                </tr>

                @foreach ($product as $pro)
                

                <tr>
                
                <td>{{$pro->Title}}</td>
                <td>{{$pro->Description}}</td>
                <td>{{$pro->Price}}</td>
                <td>{{$pro->Quantity}}</td>   
                <td>{{$pro->Category}}</td>
                <td>{{$pro->Discount_price}}</td>
                <td>
                    <img class="img_size" src="/product/{{$pro->Image}}">
                </td>
                <!--Delete Button-->
                <td>
                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete the data? If yes press OK')" 
                    href="{{url('delete_product',$pro->id)}}">Delete</a>
                </td>

                <!--Edit Button-->

                <td>
                <a class="btn btn-success" href="{{url('update_product',$pro->id)}}">Edit</a>
                
                </td>

                </tr>

                
                @endforeach
            </table>

         </div>

     </div>

        
    @include('admin.script')
  
    <!-- End custom js for this page -->
  </body>
</html>