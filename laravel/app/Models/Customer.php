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
 * @property-read \App\Models\AboutMe|null $aboutMe
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerFile> $customerFiles
 * @property-read int|null $customer_files_count
 * @property-read \App\Models\DateOfBirth|null $dateOfBirth
 * @property-read \App\Models\Email|null $email
 * @property-read \App\Models\FamilyStatus|null $familyStatus
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Phone> $phones
 * @property-read int|null $phones_count
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

    public function phones(): hasMany
    {
        return $this->hasMany(Phone::class);
    }

    public function customerFiles(): hasMany
    {
        return $this->hasMany(CustomerFile::class);
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
