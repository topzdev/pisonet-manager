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
 * App\Models\CoinsOut
 *
 * @property int $id
 * @property string $title
 * @property int $shop_id
 * @property int|null $saving_fund_id
 * @property int|null $electricity_charge_id
 * @property string|null $description
 * @property string $start_date
 * @property string $end_date
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CoinsOutSale[] $coinsOutSales
 * @property-read int|null $coins_out_sales_count
 * @property-read \App\Models\ElectricityCharge|null $electricityCharge
 * @property-read \App\Models\SavingFund|null $savingFund
 * @property-read \App\Models\Shop $shop
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsOut newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsOut newQuery()
 * @method static \Illuminate\Database\Query\Builder|CoinsOut onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsOut query()
 * @method static \Illuminate\Database\Query\Builder|CoinsOut withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CoinsOut withoutTrashed()
 */
	class CoinsOut extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CoinsOutSale
 *
 * @property int $id
 * @property float $amount
 * @property int $shareholder_id
 * @property float $shareholder_percentage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\CoinsOut|null $coinsOut
 * @property-read \App\Models\Shareholder|null $shareholder
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsOutSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsOutSale newQuery()
 * @method static \Illuminate\Database\Query\Builder|CoinsOutSale onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsOutSale query()
 * @method static \Illuminate\Database\Query\Builder|CoinsOutSale withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CoinsOutSale withoutTrashed()
 */
	class CoinsOutSale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ElectricityCharge
 *
 * @property int $id
 * @property string $start_date
 * @property int $shop_id
 * @property string $end_date
 * @property float $kwh
 * @property float $kwh_charge
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ElectricityCharge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ElectricityCharge newQuery()
 * @method static \Illuminate\Database\Query\Builder|ElectricityCharge onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ElectricityCharge query()
 * @method static \Illuminate\Database\Query\Builder|ElectricityCharge withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ElectricityCharge withoutTrashed()
 */
	class ElectricityCharge extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SavingFund
 *
 * @property int $id
 * @property int $shop_id
 * @property float $percentage
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SavingFund newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SavingFund newQuery()
 * @method static \Illuminate\Database\Query\Builder|SavingFund onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SavingFund query()
 * @method static \Illuminate\Database\Query\Builder|SavingFund withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SavingFund withoutTrashed()
 */
	class SavingFund extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Shareholder
 *
 * @property int $id
 * @property int $shop_id
 * @property float $percentage
 * @property string $username
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Shareholder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shareholder newQuery()
 * @method static \Illuminate\Database\Query\Builder|Shareholder onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Shareholder query()
 * @method static \Illuminate\Database\Query\Builder|Shareholder withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Shareholder withoutTrashed()
 */
	class Shareholder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Shop
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $start_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CoinsOut[] $coinsOut
 * @property-read int|null $coins_out_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElectricityCharge[] $electricityCharges
 * @property-read int|null $electricity_charges_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SavingFund[] $savingFunds
 * @property-read int|null $saving_funds_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shareholder[] $shareholders
 * @property-read int|null $shareholders_count
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newQuery()
 * @method static \Illuminate\Database\Query\Builder|Shop onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop query()
 * @method static \Illuminate\Database\Query\Builder|Shop withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Shop withoutTrashed()
 */
	class Shop extends \Eloquent {}
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
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

