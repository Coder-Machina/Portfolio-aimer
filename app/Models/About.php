<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Laravel\Facades\Image;

class About extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'photo',
        'headline',
        'bio',
        'experiences',
        'educations',
        'certifications',
        'languages',
        'qualities',
        'interests',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'experiences' => 'array',
            'educations' => 'array',
            'certifications' => 'array',
            'languages' => 'array',
            'qualities' => 'array',
            'interests' => 'array',
        ];
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // [WHY] Auto-optimize portrait to WebP on save to ensure rapid loading on mobile networks
        static::saving(function (About $about): void {
            if ($about->isDirty('photo') && $about->photo) {
                $path = storage_path('app/public/'.$about->photo);
                if (file_exists($path)) {
                    Image::read($path)
                        ->scaleDown(width: 1200)
                        ->toWebp(quality: 82)
                        ->save($path);
                }
            }
        });
    }
}
