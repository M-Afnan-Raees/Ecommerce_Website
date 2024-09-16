<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">

                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                           Product Details
                           </a>
                           <form action="{{url('add_cart',$products->id)}} " method="POST" >
                              @csrf
                              <div>
                                 <input type="number" name="quantity" value="1" min="1" style="width: 100px" >

                              </div>
                              <div>
                              <input type="submit" value="Add To Cart" >

                              </div>


                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img width="200" height="500" src="/product/{{$products->Image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->Title}}
                        </h5>

                        @if ($products->Discount_price!=null)
                        <h6 style="color: red " >
                        Discount Price
                       
                        <br>
                        ${{$products->Discount_price}}
                        </h6 >

                        <h6 style="text-decoration: line-through blue ;" >
                        Price
                        <br>
                        ${{$products->Price}}
                            
                        </h6>
                        @else
                        <h6 style="color: blue" >
                           Price
                           <br>
                        ${{$products->Price}}
                           
                        </h6>
                        @endif
                       

                        
                     </div>
                  </div>
               </div>
              @endforeach

              <span style="padding-top: 20px " >
              {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
              </span>  
            </div>
         </div>
      </section>