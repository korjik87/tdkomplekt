<?php

namespace App\Models;

use App\Enums\FamilyStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FamilyStatus
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $status
 * @property int $customer_id
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyStatus whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyStatus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FamilyStatus extends Model
{
    use HasFactory;


    protected $fillable = ['status'];
    protected $casts = [
        'status' => FamilyStatusEnum::class,
    ];
}


