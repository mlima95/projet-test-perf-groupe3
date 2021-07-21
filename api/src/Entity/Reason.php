<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reason
 * @ApiResource()
 * @ORM\Table(name="reason")
 * @ORM\Entity
 */
class Reason
{
    /**
     * @var int
     *
     * @ORM\Column(name="r_reason_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="reason_r_reason_sk_seq", allocationSize=1, initialValue=1)
     */
    private $rReasonSk;

    /**
     * @var string
     *
     * @ORM\Column(name="r_reason_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $rReasonId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="r_reason_desc", type="string", length=100, nullable=true, options={"fixed"=true})
     */
    private $rReasonDesc;

    public function getRReasonSk(): ?int
    {
        return $this->rReasonSk;
    }

    public function getRReasonId(): ?string
    {
        return $this->rReasonId;
    }

    public function setRReasonId(string $rReasonId): self
    {
        $this->rReasonId = $rReasonId;

        return $this;
    }

    public function getRReasonDesc(): ?string
    {
        return $this->rReasonDesc;
    }

    public function setRReasonDesc(?string $rReasonDesc): self
    {
        $this->rReasonDesc = $rReasonDesc;

        return $this;
    }


}
