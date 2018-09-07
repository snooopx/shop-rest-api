<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    protected $primaryKey = 'id';


    public function brand(): HasOne {
        return $this->hasOne(Brands::class,'id', 'brand_id');
    }

    public function size(): HasOne {
        return $this->hasOne(Size::class,'id', 'size_id');
    }

    public function categories(): HasMany {
        return $this->hasMany(ProductCategory::class, 'product_id', 'id');
    }

}
