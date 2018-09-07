<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    protected $primaryKey = 'id';

    public function subcategory(): HasMany {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
