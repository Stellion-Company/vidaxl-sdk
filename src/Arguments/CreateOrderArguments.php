<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Arguments;


use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Stellion\Vidaxl\Model\OrderProduct;

class CreateOrderArguments implements ArgumentsInterface
{
    use ArgumentsTrait;

    /**
     * @var \Stellion\Vidaxl\Model\OrderProduct
     */
    private OrderProduct $row;
    /**
     * @var \Stellion\Vidaxl\Model\OrderProduct[]
     */
    private array $orderProducts;
    private ?string $commentsCustomer;
    private ?string $customerOrderReference;

    #[Pure] public function __construct(
        array   $orderProducts,
        ?string $customerOrderReference = null,
        ?string $commentsCustomer = null
    )
    {
        $this->customerOrderReference = $customerOrderReference;
        $this->commentsCustomer = $commentsCustomer;
        $this->orderProducts = $orderProducts;
    }


    #[ArrayShape(['customer_order_reference' => "null|string", 'comments_customer' => "null|string", 'order_products' => "array|array[]"])]
    public function toArray(): array
    {
        return [
            'customer_order_reference' => $this->customerOrderReference,
            'comments_customer' => $this->commentsCustomer,
            'order_products' => array_map(fn(OrderProduct $orderProduct) => $orderProduct->toArray(),
                $this->orderProducts)
        ];
    }

    /**
     * @return string|null
     */
    public function getCustomerOrderReference(): ?string
    {
        return $this->customerOrderReference;
    }
}