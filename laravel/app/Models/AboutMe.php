<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AboutMe
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $about
 * @property int $customer_id
 * @method static \Illuminate\Database\Eloquent\Builder|AboutMe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutMe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutMe query()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutMe whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutMe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutMe whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutMe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutMe whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AboutMe extends Model
{
    use HasFactory;
}
