<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $publisher_id
 * @property string $feed_id
 * @property string $title
 * @property string $work_title
 * @property string $author
 * @property string $permalink
 * @property string|null $enclosure_url
 * @property \Illuminate\Support\Carbon $feed_updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereEnclosureUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereFeedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereFeedUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter wherePermalink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter wherePublisherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereWorkTitle($value)
 * @mixin \Eloquent
 */
class Chapter extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'feed_updated_at' => 'datetime'
        ];
    }
}
