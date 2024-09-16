<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
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
    .Center
    {
        margin:auto;
        width: 50%;
        text-align: center; 
        border: 3px solid white;
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
            <div class="div_center">
                <h2 class="h2_font">Add Category</h2>
                <form action="{{url('/add_category')}}" method="POST">

                @csrf
                    <input type="text" name="Category_name" placeholder="write category name">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add category">

                </form>

                <table class="Center">
                    <tr>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>
                    @foreach($data as $data)

                    <tr>
                        <td>{{$data->Category_name}}</td>
                        <td>
                            <a onclick="return confirm('Are You sure to Delete This?')" class="btn btn-danger" href="{{url('delete_Category',$data->id)}}">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

          
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  
    <!-- End custom js for this page -->

  </body>
</html>