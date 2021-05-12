<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HouseholdDemographics
 *
 * @ORM\Table(name="household_demographics", indexes={@ORM\Index(name="hd_ib", columns={"hd_income_band_sk"})})
 * @ORM\Entity
 */
class HouseholdDemographics
{
    /**
     * @var int
     *
     * @ORM\Column(name="hd_demo_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="household_demographics_hd_demo_sk_seq", allocationSize=1, initialValue=1)
     */
    private $hdDemoSk;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hd_buy_potential", type="string", length=15, nullable=true, options={"fixed"=true})
     */
    private $hdBuyPotential;

    /**
     * @var int|null
     *
     * @ORM\Column(name="hd_dep_count", type="integer", nullable=true)
     */
    private $hdDepCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="hd_vehicle_count", type="integer", nullable=true)
     */
    private $hdVehicleCount;

    /**
     * @var IncomeBand
     *
     * @ORM\ManyToOne(targetEntity="IncomeBand")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hd_income_band_sk", referencedColumnName="ib_income_band_sk")
     * })
     */
    private $hdIncomeBandSk;

    public function getHdDemoSk(): ?int
    {
        return $this->hdDemoSk;
    }

    public function getHdBuyPotential(): ?string
    {
        return $this->hdBuyPotential;
    }

    public function setHdBuyPotential(?string $hdBuyPotential): self
    {
        $this->hdBuyPotential = $hdBuyPotential;

        return $this;
    }

    public function getHdDepCount(): ?int
    {
        return $this->hdDepCount;
    }

    public function setHdDepCount(?int $hdDepCount): self
    {
        $this->hdDepCount = $hdDepCount;

        return $this;
    }

    public function getHdVehicleCount(): ?int
    {
        return $this->hdVehicleCount;
    }

    public function setHdVehicleCount(?int $hdVehicleCount): self
    {
        $this->hdVehicleCount = $hdVehicleCount;

        return $this;
    }

    public function getHdIncomeBandSk(): ?IncomeBand
    {
        return $this->hdIncomeBandSk;
    }

    public function setHdIncomeBandSk(?IncomeBand $hdIncomeBandSk): self
    {
        $this->hdIncomeBandSk = $hdIncomeBandSk;

        return $this;
    }


}
