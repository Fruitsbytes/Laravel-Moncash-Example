<?php

namespace App\Models;

use App\Facades\MonCash\API;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
 * @mixin IdeHelperPayment
 */
class Payment extends Model
{
    use HasFactory;

    protected $casts = [
        'cart' => 'array'
    ];

    public function toUpdateArray(): array
    {
        return [
            "orderID"       => $this->orderID,
            "transactionID" => $this->transactionID,
            "cost"          => $this->cost,
            "payer"         => $this->payer,
            "message"       => $this->message
        ];
    }

    public function merge(Payment $other)
    {

        $cols = [
            'orderID',
            'transactionID',
            'cost',
            'payer',
            'message',
        ];

        foreach ($cols as $col) {
            if(isset($other[$col])){
                $this[$col] = $other[$col];
            }
        }

        $this->update();

    }
}
