<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Illuminate\Database\Eloquent\Casts\Attribute;



/**
 * App\Models\CustomerFile
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $customer_id
 * @property string $filename
 * @method static Builder|CustomerFile newModelQuery()
 * @method static Builder|CustomerFile newQuery()
 * @method static Builder|CustomerFile query()
 * @method static Builder|CustomerFile whereCreatedAt($value)
 * @method static Builder|CustomerFile whereCustomerId($value)
 * @method static Builder|CustomerFile whereFilename($value)
 * @method static Builder|CustomerFile whereId($value)
 * @method static Builder|CustomerFile whereUpdatedAt($value)
 * @mixin Eloquent
 */
class CustomerFile extends Model
{
    use HasFactory;
    protected $fillable = ['filename', 'customer_id'];
    private UploadedFile|TemporaryUploadedFile|null $uploadedFile = null;
    private Storage|Filesystem|null $disk = null;


    public function __construct($attributes = [], UploadedFile|TemporaryUploadedFile $uploadedFile = null, $disk = 'customer_file')
    {
        parent::__construct($attributes);

        $this->uploadedFile = $uploadedFile;
        if($uploadedFile) {
            $this->filename = $uploadedFile->getClientOriginalName();
        }
        $this->disk = Storage::disk($disk);

    }


    public static function boot()
    {
        parent::boot();
        static::created(function(CustomerFile $item) {
            $item->storeToDisk();
        });
    }


    #[NoReturn] protected function storeToDisk()
    {
        $out = $this->pathToFile;
        $this->disk->put(
            $out,
            file_get_contents($this->uploadedFile->getRealPath())
        );
    }

    protected function pathToFile(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value,  array $attributes) => $attributes['customer_id'] . '/' .  $attributes['filename'],
        );
    }

    protected function getDisc(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value,  array $attributes) => $this->disk,
        );
    }



}
