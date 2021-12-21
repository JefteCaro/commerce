<?php

namespace Jecar\Commerce\Models;

use Jecar\Core\Models\Model;

class Page extends Model
{
    protected $fillable = [
        'name',
        'title',
        'path',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public static function booted()
    {
        parent::booted();

        static::creating(function($data) {
            if(!str_starts_with($data->path, '/')) {
                $data->path = sprintf("/%s", $data->path);
            }
            if($data->meta_title == null) {
                $data->meta_title = $data->title;
            }
        });
    }

}
