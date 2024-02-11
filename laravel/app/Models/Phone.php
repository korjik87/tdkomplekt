<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Phone
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $customer_id
 * @property string $phone
 * @method static Builder|Phone newModelQuery()
 * @method static Builder|Phone newQuery()
 * @method static Builder|Phone query()
 * @method static Builder|Phone whereCreatedAt($value)
 * @method static Builder|Phone whereCustomerId($value)
 * @method static Builder|Phone whereId($value)
 * @method static Builder|Phone wherePhone($value)
 * @method static Builder|Phone whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Phone extends Model
{
    use HasFactory;

    protected $fillable = ['phone'];
}
