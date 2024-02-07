<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Customer
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $name
 * @property string $surname
 * @property string $patronymic
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'patronymic'];


    public function email(): hasOne
    {
        return $this->hasOne(Email::class);
    }

    public function phone(): hasMany
    {
        return $this->hasMany(Phone::class);
    }

    public function customerFile(): hasOne
    {
        return $this->hasOne(CustomerFile::class);
    }

    public function dateOfBirth(): hasOne
    {
        return $this->hasOne(DateOfBirth::class);
    }


    public function familyStatus(): hasOne
    {
        return $this->hasOne(FamilyStatus::class);
    }

    public function aboutMe(): hasOne
    {
        return $this->hasOne(AboutMe::class);
    }


}
