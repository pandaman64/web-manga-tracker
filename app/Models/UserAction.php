<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property int $chapter_id
 * @property string $action
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserAction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAction query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAction whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAction whereChapterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAction whereUserId($value)
 * @mixin \Eloquent
 */
class UserAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'chapter_id',
        'action',
    ];
}
