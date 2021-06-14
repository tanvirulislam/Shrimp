<div class="modal-header">
    <h2 class="modal-title" id="exampleModalLabel">Product Information</h2>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<div class="modal-body"> 
    <div class="row">
    <div class="col-md-3">
    <center>
        <img style="box-shadow: 0px 0px 9px 0px grey;border-radius: 5px;" src="{{asset('/')}}{{$product->image}}" width="70px" height="70px">
    </center>
    </div>
    <div class="col-md-9">
        <p>Name: {{$product->name}}</p>
        <p>Description: {{$product->desp}}</p>
        <p>Weight: {{$product->weight}} kg</p>
        <p>Purchase price: {{$product->purchase_price}} TK</p>
        <p>Sell price: {{$product->sell_price}} TK</p>
        <p>Stock: {{$product->stock}} KG</p>
        <!-- <p>Store description: {{$product->store_id}} </p> -->
        <p>Store : 
        @foreach($store as $stores)
        @if($stores->slug == $product->store_id)
        {{$stores->name}}
        @endif
        @endforeach
        </p>

    </div>
    </div>
</div>