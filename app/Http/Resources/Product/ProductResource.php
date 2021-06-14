<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            'id'=>$this->id,
            'cat_slug'=>$this->category_slug,
            'item_name'=>$this->name,
            'item_slug'=>$this->product_slug,
            'item_image'=>$this->image,
            'item_weight'=>$this->weight,
            'item_des'=>$this->desp,
            'purchase_price'=>$this->purchase_price,
            'sell_price'=>$this->sell_price,
            'stock'=>$this->stock,
            'item_status'=>$this->status,
            'href'=>[
                
                'link'=>route('product_detail',$this->product_slug)
                
            ]
            
            ];
    }
}
