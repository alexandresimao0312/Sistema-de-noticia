<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class News extends Model
{
    protected $fillable = ["category_id","titulo","subtitulo","text","cover"];

    public function getSummaryAttribute()
    {
        return Str::substr($this->attributes['text'], 0 , 250) . '...';
    }
    public function getSlugTituloAttribute()
    {
        return Str::slug($this->attributes['titulo']);
    }

    public function category()
    {
        return $this->BelongsTo(category::class);
    }
}
