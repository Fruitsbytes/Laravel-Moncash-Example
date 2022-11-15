<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Token
 *
 * @mixin IdeHelperToken
 * @property int $id
 * @property string $accessToken
 * @property string $expiration
 * @property string $mode
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Token newModelQuery()
 * @method static Builder|Token newQuery()
 * @method static Builder|Token query()
 * @method static Builder|Token whereAccessToken($value)
 * @method static Builder|Token whereCreatedAt($value)
 * @method static Builder|Token whereExpiration($value)
 * @method static Builder|Token whereId($value)
 * @method static Builder|Token whereMode($value)
 * @method static Builder|Token whereUpdatedAt($value)
 */
class Token extends Model
{
    use HasFactory;
}
