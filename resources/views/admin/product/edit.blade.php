<!-- @extends('admin.master.master') -->

<div class="modal-header">
    <h2 class="modal-title" id="exampleModalLabel">Edit product Information</h2>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<div class="modal-body"> 
    <div class="container-fluid">
        <div class="row clearfix mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Product</h2>
                       
                    </div>
                    <div class="body">
                         <form action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{$product->id}}" class="form-control" id="name" name="id" placeholder="Enter Name">

                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlSelect1"><b>Category name</b></label>
                            <select name="category_slug" class="form-control" id="prod_cat_id" >
                            @foreach($category as $categories)
                            <option value="{{$categories->slug}}" {{$categories->slug == $product->category_slug ? 'selected' : '' }}>
                            {{$categories->name}}
                            </option>
                            @endforeach
                            </select>
                            </div>

                            <div class="col-md-6 col-sm-12" id="subcategory">
                            <div class="form-group ">
                                <label for="name"><b>Subcategory</b></label>
                                <select class="form-control productname" name="subcategory_slug">
                                @foreach($subcategory as $subcategories)
                                <option value="{{ $subcategories->slug }}" {{ $subcategories->slug == $product->subcatagory_slug ? 'selected' : '' }}>
                                {{ $subcategories->name }}
                                </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                            
                        </div>

                     

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="name"><b>Fish Image</b></label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlInput1" placeholder="fish Image">
                                <img src="{{asset('/')}}{{$product->image}}" width="70px" height="70px">

                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Fish name</b></label>
                            <input type="text" name="name" value="{{$product->name}}" class="form-control" id="exampleFormControlInput1" placeholder="Fish name">
                            
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Fish description</b></label>
                            <input type="text" name="desp" value="{{$product->desp}}"  class="form-control" id="exampleFormControlInput1" placeholder="Product description">
                            
                            </div>
                        
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Fish weight (kg)</b></label>
                            <input type="number" name="weight" value="{{$product->weight}}" class="form-control" id="exampleFormControlInput1" placeholder="Fish weight">
                            
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Purchase price (TK)</b></label>
                            <input type="text" name="purchase_price" value="{{$product->purchase_price}}"  placeholder="Purchase price" class="form-control" id="exampleFormControlInput1" >
                            
                            </div>
                        
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Sell price (TK)</b></label>
                            <input type="text" name="sell_price" value="{{$product->sell_price}}"  placeholder="Sell price" class="form-control" id="exampleFormControlInput1" >
                            
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>stock (kg)</b></label>
                            <input type="text" name="stock" value="{{$product->stock}}" placeholder="stock" class="form-control" id="exampleFormControlInput1" >
                            
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="exampleFormControlSelect1"><b>Store</b></label>
                                <select name="store_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach($store as $stores)
                                <option value="{{ $stores->slug }} {{$stores->slug == $product->store_id ? 'selected' : '' }}">
                                {{$stores->name}}
                                </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                        
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="exampleFormControlSelect1"><b>Status</b></label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">
                                
                                <option value="1" {{$product->status == 1 ? 'selected' : ''}} >Active</option>
                                <option value="0" {{$product->status == 0 ? 'selected' : ''}} >Inactive</option>

                                </select>
                            </div>
                           
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$('#prod_cat_id').on('change',function(){
            //console.log("hmm its change");
            var cat_id=$(this).val();
             //console.log(cat_id);
             var div=$(this).parent();
             var op=`<label>Subcatagory  Name</label>
                            <select class="form-control productname" name="subcategory_slug">`;
             $.ajax({
              type:'get',
              url:'{!!URL::to('admin/findProductName')!!}',
              data:{'id':cat_id},
              success:function(data){
                  //console.log('success');
                    //console.log(data);
                    //console.log(data.length);
                   // op+='<option value="0" selected disabled>choose sub-category</option>';
                   for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].slug+'">'+data[i].name+'</option>';
                  }
                  // console.log(op)
                  op+= `</select>`
                  $('#subcategory').html(op);
                  // div.find('#subcategory').append(op);
                },
                error:function(){
 
                }
              });
           });    
</script>





 
  