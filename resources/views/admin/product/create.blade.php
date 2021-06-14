@extends('admin.master.master')
@section('title')
Add Product
@endsection


@section('body')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Admin
                <small class="text-muted">Welcome to Admin Panel</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product') }}">Product</a></li>

                    <li class="breadcrumb-item">Create Product</li>
                 
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    	
        
        <div class="row clearfix mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Product</h2>
                       
                    </div>
                    <div class="body">
                         <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlSelect1"><b>Catagory name</b></label>
                            <select name="category_slug" id="prod_cat_id" class="form-control" id="exampleFormControlSelect1" >
                            @foreach($category as $catagories)
                            <option value="{{$catagories->slug}}">{{$catagories->name}}</option>
                            @endforeach
                            </select>
                            </div>
                            
                        </div>

                        <div class="form-row" id="subcategory">
                            <div class="form-group col-md-6 col-sm-12">
                            <label><b>Subcatagory  Name</b></label>
                            <select class="form-control productname" name="subcategory_slug">
                            <option value="0" disabled="true" selected="true">Select Subcategory</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="name"><b>Fish Image</b></label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlInput1" placeholder="fish Image">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Fish name</b></label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Fish name">
                            
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Fish description</b></label>
                            <input type="text" name="desp" class="form-control" id="exampleFormControlInput1" placeholder="Product description">
                            
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Fish weight (kg)</b></label>
                            <input type="number" name="weight" class="form-control" id="exampleFormControlInput1" placeholder="Fish weight">
                            
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Store</b></label>
                            <select name="store_id" class="form-control"id="">
                            @foreach($store as $stores)
                            <option value="{{$stores->slug}}">
                            {{$stores->name}}
                            </option>
                            @endforeach
                            </select>
                            
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Purchase price</b></label>
                            <input type="text" name="purchase_price" placeholder="Purchase price" class="form-control" id="exampleFormControlInput1" >
                            
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>Sell price</b></label>
                            <input type="text" name="sell_price" placeholder="Sell price" class="form-control" id="exampleFormControlInput1" >
                            
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            <label for="exampleFormControlInput1"><b>stock (kg)</b></label>
                            <input type="text" name="stock" placeholder="stock" class="form-control" id="exampleFormControlInput1" >
                            
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="exampleFormControlSelect1"><b>Status</b></label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

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
</section>
 
@endsection

@section('scripts')


    

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

@endsection

 
  

