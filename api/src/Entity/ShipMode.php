<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShipMode
 *
 * @ORM\Table(name="ship_mode")
 * @ORM\Entity
 */
class ShipMode
{
    /**
     * @var int
     *
     * @ORM\Column(name="sm_ship_mode_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ship_mode_sm_ship_mode_sk_seq", allocationSize=1, initialValue=1)
     */
    private $smShipModeSk;

    /**
     * @var string
     *
     * @ORM\Column(name="sm_ship_mode_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $smShipModeId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sm_type", type="string", length=30, nullable=true, options={"fixed"=true})
     */
    private $smType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sm_code", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $smCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sm_carrier", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $smCarrier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sm_contract", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $smContract;

    public function getSmShipModeSk(): ?int
    {
        return $this->smShipModeSk;
    }

    public function getSmShipModeId(): ?string
    {
        return $this->smShipModeId;
    }

    public function setSmShipModeId(string $smShipModeId): self
    {
        $this->smShipModeId = $smShipModeId;

        return $this;
    }

    public function getSmType(): ?string
    {
        return $this->smType;
    }

    public function setSmType(?string $smType): self
    {
        $this->smType = $smType;

        return $this;
    }

    public function getSmCode(): ?string
    {
        return $this->smCode;
    }

    public function setSmCode(?string $smCode): self
    {
        $this->smCode = $smCode;

        return $this;
    }

    public function getSmCarrier(): ?string
    {
        return $this->smCarrier;
    }

    public function setSmCarrier(?string $smCarrier): self
    {
        $this->smCarrier = $smCarrier;

        return $this;
    }

    public function getSmContract(): ?string
    {
        return $this->smContract;
    }

    public function setSmContract(?string $smContract): self
    {
        $this->smContract = $smContract;

        return $this;
    }


}
