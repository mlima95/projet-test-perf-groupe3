<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimeDim
 *
 * @ORM\Table(name="time_dim")
 * @ORM\Entity
 */
class TimeDim
{
    /**
     * @var int
     *
     * @ORM\Column(name="t_time_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="time_dim_t_time_sk_seq", allocationSize=1, initialValue=1)
     */
    private $tTimeSk;

    /**
     * @var string
     *
     * @ORM\Column(name="t_time_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $tTimeId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="t_time", type="integer", nullable=true)
     */
    private $tTime;

    /**
     * @var int|null
     *
     * @ORM\Column(name="t_hour", type="integer", nullable=true)
     */
    private $tHour;

    /**
     * @var int|null
     *
     * @ORM\Column(name="t_minute", type="integer", nullable=true)
     */
    private $tMinute;

    /**
     * @var int|null
     *
     * @ORM\Column(name="t_second", type="integer", nullable=true)
     */
    private $tSecond;

    /**
     * @var string|null
     *
     * @ORM\Column(name="t_am_pm", type="string", length=2, nullable=true, options={"fixed"=true})
     */
    private $tAmPm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="t_shift", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $tShift;

    /**
     * @var string|null
     *
     * @ORM\Column(name="t_sub_shift", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $tSubShift;

    /**
     * @var string|null
     *
     * @ORM\Column(name="t_meal_time", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $tMealTime;

    public function getTTimeSk(): ?int
    {
        return $this->tTimeSk;
    }

    public function getTTimeId(): ?string
    {
        return $this->tTimeId;
    }

    public function setTTimeId(string $tTimeId): self
    {
        $this->tTimeId = $tTimeId;

        return $this;
    }

    public function getTTime(): ?int
    {
        return $this->tTime;
    }

    public function setTTime(?int $tTime): self
    {
        $this->tTime = $tTime;

        return $this;
    }

    public function getTHour(): ?int
    {
        return $this->tHour;
    }

    public function setTHour(?int $tHour): self
    {
        $this->tHour = $tHour;

        return $this;
    }

    public function getTMinute(): ?int
    {
        return $this->tMinute;
    }

    public function setTMinute(?int $tMinute): self
    {
        $this->tMinute = $tMinute;

        return $this;
    }

    public function getTSecond(): ?int
    {
        return $this->tSecond;
    }

    public function setTSecond(?int $tSecond): self
    {
        $this->tSecond = $tSecond;

        return $this;
    }

    public function getTAmPm(): ?string
    {
        return $this->tAmPm;
    }

    public function setTAmPm(?string $tAmPm): self
    {
        $this->tAmPm = $tAmPm;

        return $this;
    }

    public function getTShift(): ?string
    {
        return $this->tShift;
    }

    public function setTShift(?string $tShift): self
    {
        $this->tShift = $tShift;

        return $this;
    }

    public function getTSubShift(): ?string
    {
        return $this->tSubShift;
    }

    public function setTSubShift(?string $tSubShift): self
    {
        $this->tSubShift = $tSubShift;

        return $this;
    }

    public function getTMealTime(): ?string
    {
        return $this->tMealTime;
    }

    public function setTMealTime(?string $tMealTime): self
    {
        $this->tMealTime = $tMealTime;

        return $this;
    }


}
