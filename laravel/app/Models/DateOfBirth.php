<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DateOfBirth
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $customer_id
 * @property string $birth
 * @method static \Illuminate\Database\Eloquent\Builder|DateOfBirth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DateOfBirth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DateOfBirth query()
 * @method static \Illuminate\Database\Eloquent\Builder|DateOfBirth whereBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DateOfBirth whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DateOfBirth whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DateOfBirth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DateOfBirth whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DateOfBirth extends Model
{
    use HasFactory;
}
