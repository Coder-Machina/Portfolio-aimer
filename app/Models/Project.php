<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intervention\Image\Laravel\Facades\Image;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'specialty_id',
        'title',
        'slug',
        'description',
        'thumbnail',
        'tiktok_url',
        'project_url',
        'tags',
        'is_published',
        'is_featured',
        'order',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // [WHY] Auto-optimize every uploaded image to WebP on save to ensure fast loading on mobile networks
        static::saving(function (Project $project): void {
            if ($project->isDirty('thumbnail') && $project->thumbnail) {
                $path = storage_path('app/public/'.$project->thumbnail);
                if (file_exists($path)) {
                    Image::read($path)
                        ->scaleDown(width: 1200)
                        ->toWebp(quality: 82)
                        ->save($path);
                }
            }
        });
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'order' => 'integer',
        ];
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    /**
     * Specialty this project belongs to.
     *
     * @return BelongsTo<Specialty, $this>
     */
    public function specialty(): BelongsTo
    {
        return $this->belongsTo(Specialty::class);
    }
}
