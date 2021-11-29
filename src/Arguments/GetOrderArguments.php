<?php
declare(strict_types=1);

namespace Stellion\Vidaxl\Arguments;

class GetOrderArguments implements ArgumentsInterface
{
    use ArgumentsTrait;
    /**
     * @var string|null
     */
    private ?string $orderReference = null;
    /**
     * Order id
     * @var string|null
     */
    private ?string $idEq = null;

    /**
     * Order status id
     * @var int|null
     */
    private ?int $statusOrderIdEq = null;

    /**
     * Submitted at exact date
     * @var \DateTimeInterface|null
     */
    private ?\DateTimeInterface $submittedAtGteq = null;

    /**
     * Submitted at later than
     * @var \DateTimeInterface|null
     */
    private ?\DateTimeInterface $submittedAtCastedeq = null;

    /**
     * @return string|null
     */
    public function getOrderReference(): ?string
    {
        return $this->orderReference;
    }

    /**
     * @param string|null $orderReference
     * @return GetOrderArguments
     */
    public function setOrderReference(?string $orderReference): GetOrderArguments
    {
        $this->orderReference = $orderReference;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdEq(): string
    {
        return $this->idEq;
    }

    /**
     * @param string $idEq
     * @return GetOrderArguments
     */
    public function setIdEq(string $idEq): GetOrderArguments
    {
        $this->idEq = $idEq;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStatusOrderIdEq(): ?int
    {
        return $this->statusOrderIdEq;
    }

    /**
     * @param int|null $statusOrderIdEq
     * @return GetOrderArguments
     */
    public function setStatusOrderIdEq(?int $statusOrderIdEq): GetOrderArguments
    {
        $this->statusOrderIdEq = $statusOrderIdEq;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getSubmittedAtGteq(): ?\DateTimeInterface
    {
        return $this->submittedAtGteq;
    }

    /**
     * @param \DateTimeInterface|null $submittedAtGteq
     * @return GetOrderArguments
     */
    public function setSubmittedAtGteq(?\DateTimeInterface $submittedAtGteq): GetOrderArguments
    {
        $this->submittedAtGteq = $submittedAtGteq;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getSubmittedAtCastedeq(): ?\DateTimeInterface
    {
        return $this->submittedAtCastedeq;
    }

    /**
     * @param \DateTimeInterface|null $submittedAtCastedeq
     * @return GetOrderArguments
     */
    public function setSubmittedAtCastedeq(?\DateTimeInterface $submittedAtCastedeq): GetOrderArguments
    {
        $this->submittedAtCastedeq = $submittedAtCastedeq;
        return $this;
    }

    /**
     * @return string
     */
    public function asHttpQuery(): string
    {
        return http_build_query($this->toArray());
    }

    /**
     * @return array
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
                                'customer_order_reference_eq' => $this->orderReference ?? null,
                                'id_eq' => $this->idEq ?? null,
                                'status_order_id_eq' => $this->statusOrderIdEq ?? null,
                                'submitted_at_gteq' => $this->submittedAtGteq?->format('Ymd') ?? null,
                                'submitted_at_casted_eq' => $this->submittedAtCastedeq?->format('Ymd') ?? null,
                            ]);
    }
}