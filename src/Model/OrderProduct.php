<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Model;

use JetBrains\PhpStorm\ArrayShape;

class OrderProduct
{
    private int $productCode;
    private int $quantity;
    /**
     * @var \Stellion\Vidaxl\Model\ShippingAddress
     */
    private ShippingAddress $address;

    public function __construct(ShippingAddress $address, int $productCode, int $quantity)
    {
        $this->productCode = $productCode;
        $this->quantity = $quantity;
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getProductCode(): int
    {
        return $this->productCode;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return \Stellion\Vidaxl\Model\ShippingAddress
     */
    public function getAddress(): ShippingAddress
    {
        return $this->address;
    }

    #[ArrayShape(['product_code' => "int", 'quantity' => "int", 'addressbook' => "array"])]
    public function toArray(): array
    {
        return [
            'product_code' => $this->productCode,
            'quantity' => $this->quantity,
            'addressbook' => $this->address->toArray(),
        ];
    }

}