<?php

namespace App\Models\Product;

use App\Models\Account\BasicModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Bucket extends Model
{
    use HasFactory;
    use BasicModel;

    protected $casts = [
        'created_at' => 'timestamp',
        'name' => 'string',
        'volume' => 'integer',
    ];

    /**
     * Relationship with Profile
     *
     * @return object
     **/
    public function buckets()
    {
        return $this->hasMany(Bucket::class);
    }

    public function emptyBucket()
    {
        $this->buckets()->delete();
    }

}
