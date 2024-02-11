<?php

namespace App\Models;

use App\Enums\FamilyStatusEnum;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\FamilyStatus
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $status
 * @property int $customer_id
 * @method static Builder|FamilyStatus newModelQuery()
 * @method static Builder|FamilyStatus newQuery()
 * @method static Builder|FamilyStatus query()
 * @method static Builder|FamilyStatus whereCreatedAt($value)
 * @method static Builder|FamilyStatus whereCustomerId($value)
 * @method static Builder|FamilyStatus whereId($value)
 * @method static Builder|FamilyStatus whereStatus($value)
 * @method static Builder|FamilyStatus whereUpdatedAt($value)
 * @mixin Eloquent
 */
class FamilyStatus extends Model
{
    use HasFactory;


    protected $fillable = ['status'];
    protected $casts = [
        'status' => FamilyStatusEnum::class,
    ];
}


