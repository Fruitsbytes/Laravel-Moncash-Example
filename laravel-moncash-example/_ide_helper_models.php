<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\MonCashModel
 *
 * @method static Builder|MonCashModel newModelQuery()
 * @method static Builder|MonCashModel newQuery()
 * @method static Builder|MonCashModel query()
 * @mixin Eloquent
 */
	class IdeHelperMonCashModel {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property string $redirectionUrl
 * @property mixed $cart
 * @property string $orderID
 * @property string $transactionID
 * @property string $expiration
 * @property float $amount
 * @property float $cost
 * @property string $message
 * @property string $payer
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Payment newModelQuery()
 * @method static Builder|Payment newQuery()
 * @method static Builder|Payment query()
 * @method static Builder|Payment whereAmount($value)
 * @method static Builder|Payment whereCart($value)
 * @method static Builder|Payment whereCost($value)
 * @method static Builder|Payment whereCreatedAt($value)
 * @method static Builder|Payment whereExpiration($value)
 * @method static Builder|Payment whereId($value)
 * @method static Builder|Payment whereMessage($value)
 * @method static Builder|Payment whereOrderID($value)
 * @method static Builder|Payment wherePayer($value)
 * @method static Builder|Payment whereRedirectionUrl($value)
 * @method static Builder|Payment whereTransactionID($value)
 * @method static Builder|Payment whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperPayment {}
}

namespace App\Models{
/**
 * App\Models\Token
 *
 * @property int $id
 * @property string $accessToken
 * @property string $expiration
 * @property string $mode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Token newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token query()
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperToken {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperUser {}
}

