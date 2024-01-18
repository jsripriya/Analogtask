<?php

namespace App\Models\Product;

use App\Models\Account\BasicModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ball extends Model
{
    use HasFactory;
    use BasicModel;

    protected $casts = [
        'created_at' => 'timestamp',
        'name' => 'string',
        'volume' => 'interger',
    ];

    /**
     * Relationship with Profile
     *
     * @return object
     **/

    public function ball()
    {
        return $this->belongsTo(Bucket::class);
    }
}
