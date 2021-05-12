<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerAddress
 *
 * @ORM\Table(name="customer_address")
 * @ORM\Entity
 */
class CustomerAddress
{
    /**
     * @var int
     *
     * @ORM\Column(name="ca_address_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="customer_address_ca_address_sk_seq", allocationSize=1, initialValue=1)
     */
    private $caAddressSk;

    /**
     * @var string
     *
     * @ORM\Column(name="ca_address_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $caAddressId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_street_number", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $caStreetNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_street_name", type="string", length=60, nullable=true)
     */
    private $caStreetName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_street_type", type="string", length=15, nullable=true, options={"fixed"=true})
     */
    private $caStreetType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_suite_number", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $caSuiteNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_city", type="string", length=60, nullable=true)
     */
    private $caCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_county", type="string", length=30, nullable=true)
     */
    private $caCounty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_state", type="string", length=2, nullable=true, options={"fixed"=true})
     */
    private $caState;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_zip", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $caZip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_country", type="string", length=20, nullable=true)
     */
    private $caCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_gmt_offset", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $caGmtOffset;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ca_location_type", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $caLocationType;

    public function getCaAddressSk(): ?int
    {
        return $this->caAddressSk;
    }

    public function getCaAddressId(): ?string
    {
        return $this->caAddressId;
    }

    public function setCaAddressId(string $caAddressId): self
    {
        $this->caAddressId = $caAddressId;

        return $this;
    }

    public function getCaStreetNumber(): ?string
    {
        return $this->caStreetNumber;
    }

    public function setCaStreetNumber(?string $caStreetNumber): self
    {
        $this->caStreetNumber = $caStreetNumber;

        return $this;
    }

    public function getCaStreetName(): ?string
    {
        return $this->caStreetName;
    }

    public function setCaStreetName(?string $caStreetName): self
    {
        $this->caStreetName = $caStreetName;

        return $this;
    }

    public function getCaStreetType(): ?string
    {
        return $this->caStreetType;
    }

    public function setCaStreetType(?string $caStreetType): self
    {
        $this->caStreetType = $caStreetType;

        return $this;
    }

    public function getCaSuiteNumber(): ?string
    {
        return $this->caSuiteNumber;
    }

    public function setCaSuiteNumber(?string $caSuiteNumber): self
    {
        $this->caSuiteNumber = $caSuiteNumber;

        return $this;
    }

    public function getCaCity(): ?string
    {
        return $this->caCity;
    }

    public function setCaCity(?string $caCity): self
    {
        $this->caCity = $caCity;

        return $this;
    }

    public function getCaCounty(): ?string
    {
        return $this->caCounty;
    }

    public function setCaCounty(?string $caCounty): self
    {
        $this->caCounty = $caCounty;

        return $this;
    }

    public function getCaState(): ?string
    {
        return $this->caState;
    }

    public function setCaState(?string $caState): self
    {
        $this->caState = $caState;

        return $this;
    }

    public function getCaZip(): ?string
    {
        return $this->caZip;
    }

    public function setCaZip(?string $caZip): self
    {
        $this->caZip = $caZip;

        return $this;
    }

    public function getCaCountry(): ?string
    {
        return $this->caCountry;
    }

    public function setCaCountry(?string $caCountry): self
    {
        $this->caCountry = $caCountry;

        return $this;
    }

    public function getCaGmtOffset(): ?string
    {
        return $this->caGmtOffset;
    }

    public function setCaGmtOffset(?string $caGmtOffset): self
    {
        $this->caGmtOffset = $caGmtOffset;

        return $this;
    }

    public function getCaLocationType(): ?string
    {
        return $this->caLocationType;
    }

    public function setCaLocationType(?string $caLocationType): self
    {
        $this->caLocationType = $caLocationType;

        return $this;
    }


}
