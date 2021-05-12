<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warehouse
 *
 * @ORM\Table(name="warehouse")
 * @ORM\Entity
 */
class Warehouse
{
    /**
     * @var int
     *
     * @ORM\Column(name="w_warehouse_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="warehouse_w_warehouse_sk_seq", allocationSize=1, initialValue=1)
     */
    private $wWarehouseSk;

    /**
     * @var string
     *
     * @ORM\Column(name="w_warehouse_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $wWarehouseId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="w_warehouse_name", type="string", length=20, nullable=true)
     */
    private $wWarehouseName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="w_warehouse_sq_ft", type="integer", nullable=true)
     */
    private $wWarehouseSqFt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="w_street_number", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $wStreetNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="w_street_name", type="string", length=60, nullable=true)
     */
    private $wStreetName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="w_street_type", type="string", length=15, nullable=true, options={"fixed"=true})
     */
    private $wStreetType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="w_suite_number", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $wSuiteNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="w_city", type="string", length=60, nullable=true)
     */
    private $wCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="w_county", type="string", length=30, nullable=true)
     */
    private $wCounty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="w_state", type="string", length=2, nullable=true, options={"fixed"=true})
     */
    private $wState;

    /**
     * @var string|null
     *
     * @ORM\Column(name="w_zip", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $wZip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="w_country", type="string", length=20, nullable=true)
     */
    private $wCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="w_gmt_offset", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $wGmtOffset;

    public function getWWarehouseSk(): ?int
    {
        return $this->wWarehouseSk;
    }

    public function getWWarehouseId(): ?string
    {
        return $this->wWarehouseId;
    }

    public function setWWarehouseId(string $wWarehouseId): self
    {
        $this->wWarehouseId = $wWarehouseId;

        return $this;
    }

    public function getWWarehouseName(): ?string
    {
        return $this->wWarehouseName;
    }

    public function setWWarehouseName(?string $wWarehouseName): self
    {
        $this->wWarehouseName = $wWarehouseName;

        return $this;
    }

    public function getWWarehouseSqFt(): ?int
    {
        return $this->wWarehouseSqFt;
    }

    public function setWWarehouseSqFt(?int $wWarehouseSqFt): self
    {
        $this->wWarehouseSqFt = $wWarehouseSqFt;

        return $this;
    }

    public function getWStreetNumber(): ?string
    {
        return $this->wStreetNumber;
    }

    public function setWStreetNumber(?string $wStreetNumber): self
    {
        $this->wStreetNumber = $wStreetNumber;

        return $this;
    }

    public function getWStreetName(): ?string
    {
        return $this->wStreetName;
    }

    public function setWStreetName(?string $wStreetName): self
    {
        $this->wStreetName = $wStreetName;

        return $this;
    }

    public function getWStreetType(): ?string
    {
        return $this->wStreetType;
    }

    public function setWStreetType(?string $wStreetType): self
    {
        $this->wStreetType = $wStreetType;

        return $this;
    }

    public function getWSuiteNumber(): ?string
    {
        return $this->wSuiteNumber;
    }

    public function setWSuiteNumber(?string $wSuiteNumber): self
    {
        $this->wSuiteNumber = $wSuiteNumber;

        return $this;
    }

    public function getWCity(): ?string
    {
        return $this->wCity;
    }

    public function setWCity(?string $wCity): self
    {
        $this->wCity = $wCity;

        return $this;
    }

    public function getWCounty(): ?string
    {
        return $this->wCounty;
    }

    public function setWCounty(?string $wCounty): self
    {
        $this->wCounty = $wCounty;

        return $this;
    }

    public function getWState(): ?string
    {
        return $this->wState;
    }

    public function setWState(?string $wState): self
    {
        $this->wState = $wState;

        return $this;
    }

    public function getWZip(): ?string
    {
        return $this->wZip;
    }

    public function setWZip(?string $wZip): self
    {
        $this->wZip = $wZip;

        return $this;
    }

    public function getWCountry(): ?string
    {
        return $this->wCountry;
    }

    public function setWCountry(?string $wCountry): self
    {
        $this->wCountry = $wCountry;

        return $this;
    }

    public function getWGmtOffset(): ?string
    {
        return $this->wGmtOffset;
    }

    public function setWGmtOffset(?string $wGmtOffset): self
    {
        $this->wGmtOffset = $wGmtOffset;

        return $this;
    }


}
