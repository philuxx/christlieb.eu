<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $articles
 */
class Tag extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($article) {
            $article->slug = str_slug($article->name);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    /**
     * Add tags from the list.
     *
     * @param array $tags List of tags to check/add
     */
    public static function addNeededTags(array $tags)
    {
        if (count($tags) === 0) {
            return;
        }
        $found = static::whereIn('name', $tags)->pluck('name')->all();
        foreach (array_diff($tags, $found) as $tag) {
            static::create([
                'name' => $tag,
                'slug' => str_slug($tag),
            ]);
        }
    }
}
