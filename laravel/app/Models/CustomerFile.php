<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CustomerFile
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $customer_id
 * @property string $filename
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerFile whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerFile whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CustomerFile extends Model
{
    use HasFactory;
}
