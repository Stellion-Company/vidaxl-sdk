<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Model;

/**
 * Class Address
 */
class ShippingAddress
{
    private string $city;
    private string $country;
    private string $postalCode;
    private string $province;
    private string $address;
    private ?string $address2;
    private string $clientName;
    private ?string $phone;
    private ?string $comments;

    public function __construct(
        string  $clientName,
        string  $address,
        string  $city,
        string  $country,
        string  $postalCode,
        string  $province,
        string  $phone,
        ?string $address2 = null,
        ?string $comments = null
    )
    {
        $this->address = $address;
        $this->city = $city;
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->province = $province;
        $this->address2 = $address2;
        $this->clientName = $clientName;
        $this->phone = $phone;
        $this->comments = $comments;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getProvince(): string
    {
        return $this->province;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }


    /**
     * @return string
     */
    public function getClientName(): string
    {
        return $this->clientName;
    }

    /**
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }


    public function toArray(): array
    {
        return array_filter([
                                'name' => $this->clientName,
                                'address' => $this->address,
                                'address2' => $this->address2,
                                'city' => $this->city,
                                'country' => $this->country,
                                'postal_code' => $this->postalCode,
                                'province' => $this->province,
                                'phone' => $this->phone,
                                'comments' => $this->comments
                            ]);
    }
}