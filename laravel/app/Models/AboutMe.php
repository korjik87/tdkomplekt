<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\AboutMe
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $about
 * @property int $customer_id
 * @method static Builder|AboutMe newModelQuery()
 * @method static Builder|AboutMe newQuery()
 * @method static Builder|AboutMe query()
 * @method static Builder|AboutMe whereAbout($value)
 * @method static Builder|AboutMe whereCreatedAt($value)
 * @method static Builder|AboutMe whereCustomerId($value)
 * @method static Builder|AboutMe whereId($value)
 * @method static Builder|AboutMe whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AboutMe extends Model
{
    use HasFactory;
    protected $fillable = ['about'];
}
