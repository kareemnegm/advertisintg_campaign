<?php

namespace App\Models;

use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Campaign extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, FileTrait;
    protected $mediaCollection = 'campaign_images';

    protected $fillable = [
        'name',
        'from',
        'to',
        'total',
        'daily_budget',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(600)
            ->sharpen(0);
    }

}
