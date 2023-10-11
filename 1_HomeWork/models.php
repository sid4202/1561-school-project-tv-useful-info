<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

require_once "vendor/autoload.php";

class Customer extends Model
{
    public const CREATED_AT = NULL;
    public const UPDATED_AT = NULL;

    protected $fillable = [
        'id',
        'name'
    ];

    public function ProductLink() :HasMany
    {
        return $this->HasMany(ProductCustomerConnection::class);
    }
}

class Product extends Model
{
    public const CREATED_AT = NULL;
    public const UPDATED_AT = NULL;

    protected $fillable = [
        'id',
        'name'
    ];

    public function CustomerLink() :HasMany
    {
        return $this->HasMany(ProductCustomerConnection::class);
    }
}

class ProductCustomerConnection extends Model
{
    public const CREATED_AT = NULL;
    public const UPDATED_AT = NULL;

    protected $fillable = [
    'customer_id',
    'product_id'
];

}