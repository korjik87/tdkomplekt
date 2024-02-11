<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Customer
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property mixed $name
 * @property string $surname
 * @property string $patronymic
 * @method static Builder|Customer newModelQuery()
 * @method static Builder|Customer newQuery()
 * @method static Builder|Customer query()
 * @method static Builder|Customer whereCreatedAt($value)
 * @method static Builder|Customer whereId($value)
 * @method static Builder|Customer whereName($value)
 * @method static Builder|Customer wherePatronymic($value)
 * @method static Builder|Customer whereSurname($value)
 * @method static Builder|Customer whereUpdatedAt($value)
 * @property-read AboutMe|null $aboutMe
 * @property-read Collection<int, CustomerFile> $customerFiles
 * @property-read int|null $customer_files_count
 * @property-read DateOfBirth|null $dateOfBirth
 * @property-read Email|null $email
 * @property-read FamilyStatus|null $familyStatus
 * @property-read Collection<int, \App\Models\Phone> $phones
 * @property-read int|null $phones_count
 * @mixin Eloquent
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
