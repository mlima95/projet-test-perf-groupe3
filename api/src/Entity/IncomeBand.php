<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IncomeBand
 *
 * @ORM\Table(name="income_band")
 * @ORM\Entity
 */
class IncomeBand
{
    /**
     * @var int
     *
     * @ORM\Column(name="ib_income_band_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="income_band_ib_income_band_sk_seq", allocationSize=1, initialValue=1)
     */
    private $ibIncomeBandSk;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ib_lower_bound", type="integer", nullable=true)
     */
    private $ibLowerBound;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ib_upper_bound", type="integer", nullable=true)
     */
    private $ibUpperBound;

    public function getIbIncomeBandSk(): ?int
    {
        return $this->ibIncomeBandSk;
    }

    public function getIbLowerBound(): ?int
    {
        return $this->ibLowerBound;
    }

    public function setIbLowerBound(?int $ibLowerBound): self
    {
        $this->ibLowerBound = $ibLowerBound;

        return $this;
    }

    public function getIbUpperBound(): ?int
    {
        return $this->ibUpperBound;
    }

    public function setIbUpperBound(?int $ibUpperBound): self
    {
        $this->ibUpperBound = $ibUpperBound;

        return $this;
    }


}
