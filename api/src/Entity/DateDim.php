<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DateDim
 *
 * @ORM\Table(name="date_dim")
 * @ORM\Entity
 */
class DateDim
{
    /**
     * @var int
     *
     * @ORM\Column(name="d_date_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="date_dim_d_date_sk_seq", allocationSize=1, initialValue=1)
     */
    private $dDateSk;

    /**
     * @var string
     *
     * @ORM\Column(name="d_date_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $dDateId;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="d_date", type="date", nullable=true)
     */
    private $dDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_month_seq", type="integer", nullable=true)
     */
    private $dMonthSeq;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_week_seq", type="integer", nullable=true)
     */
    private $dWeekSeq;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_quarter_seq", type="integer", nullable=true)
     */
    private $dQuarterSeq;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_year", type="integer", nullable=true)
     */
    private $dYear;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_dow", type="integer", nullable=true)
     */
    private $dDow;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_moy", type="integer", nullable=true)
     */
    private $dMoy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_dom", type="integer", nullable=true)
     */
    private $dDom;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_qoy", type="integer", nullable=true)
     */
    private $dQoy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_fy_year", type="integer", nullable=true)
     */
    private $dFyYear;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_fy_quarter_seq", type="integer", nullable=true)
     */
    private $dFyQuarterSeq;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_fy_week_seq", type="integer", nullable=true)
     */
    private $dFyWeekSeq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_day_name", type="string", length=9, nullable=true, options={"fixed"=true})
     */
    private $dDayName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_quarter_name", type="string", length=6, nullable=true, options={"fixed"=true})
     */
    private $dQuarterName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_holiday", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $dHoliday;

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_weekend", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $dWeekend;

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_following_holiday", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $dFollowingHoliday;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_first_dom", type="integer", nullable=true)
     */
    private $dFirstDom;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_last_dom", type="integer", nullable=true)
     */
    private $dLastDom;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_same_day_ly", type="integer", nullable=true)
     */
    private $dSameDayLy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_same_day_lq", type="integer", nullable=true)
     */
    private $dSameDayLq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_current_day", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $dCurrentDay;

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_current_week", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $dCurrentWeek;

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_current_month", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $dCurrentMonth;

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_current_quarter", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $dCurrentQuarter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="d_current_year", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $dCurrentYear;

    public function getDDateSk(): ?int
    {
        return $this->dDateSk;
    }

    public function getDDateId(): ?string
    {
        return $this->dDateId;
    }

    public function setDDateId(string $dDateId): self
    {
        $this->dDateId = $dDateId;

        return $this;
    }

    public function getDDate(): ?\DateTimeInterface
    {
        return $this->dDate;
    }

    public function setDDate(?\DateTimeInterface $dDate): self
    {
        $this->dDate = $dDate;

        return $this;
    }

    public function getDMonthSeq(): ?int
    {
        return $this->dMonthSeq;
    }

    public function setDMonthSeq(?int $dMonthSeq): self
    {
        $this->dMonthSeq = $dMonthSeq;

        return $this;
    }

    public function getDWeekSeq(): ?int
    {
        return $this->dWeekSeq;
    }

    public function setDWeekSeq(?int $dWeekSeq): self
    {
        $this->dWeekSeq = $dWeekSeq;

        return $this;
    }

    public function getDQuarterSeq(): ?int
    {
        return $this->dQuarterSeq;
    }

    public function setDQuarterSeq(?int $dQuarterSeq): self
    {
        $this->dQuarterSeq = $dQuarterSeq;

        return $this;
    }

    public function getDYear(): ?int
    {
        return $this->dYear;
    }

    public function setDYear(?int $dYear): self
    {
        $this->dYear = $dYear;

        return $this;
    }

    public function getDDow(): ?int
    {
        return $this->dDow;
    }

    public function setDDow(?int $dDow): self
    {
        $this->dDow = $dDow;

        return $this;
    }

    public function getDMoy(): ?int
    {
        return $this->dMoy;
    }

    public function setDMoy(?int $dMoy): self
    {
        $this->dMoy = $dMoy;

        return $this;
    }

    public function getDDom(): ?int
    {
        return $this->dDom;
    }

    public function setDDom(?int $dDom): self
    {
        $this->dDom = $dDom;

        return $this;
    }

    public function getDQoy(): ?int
    {
        return $this->dQoy;
    }

    public function setDQoy(?int $dQoy): self
    {
        $this->dQoy = $dQoy;

        return $this;
    }

    public function getDFyYear(): ?int
    {
        return $this->dFyYear;
    }

    public function setDFyYear(?int $dFyYear): self
    {
        $this->dFyYear = $dFyYear;

        return $this;
    }

    public function getDFyQuarterSeq(): ?int
    {
        return $this->dFyQuarterSeq;
    }

    public function setDFyQuarterSeq(?int $dFyQuarterSeq): self
    {
        $this->dFyQuarterSeq = $dFyQuarterSeq;

        return $this;
    }

    public function getDFyWeekSeq(): ?int
    {
        return $this->dFyWeekSeq;
    }

    public function setDFyWeekSeq(?int $dFyWeekSeq): self
    {
        $this->dFyWeekSeq = $dFyWeekSeq;

        return $this;
    }

    public function getDDayName(): ?string
    {
        return $this->dDayName;
    }

    public function setDDayName(?string $dDayName): self
    {
        $this->dDayName = $dDayName;

        return $this;
    }

    public function getDQuarterName(): ?string
    {
        return $this->dQuarterName;
    }

    public function setDQuarterName(?string $dQuarterName): self
    {
        $this->dQuarterName = $dQuarterName;

        return $this;
    }

    public function getDHoliday(): ?string
    {
        return $this->dHoliday;
    }

    public function setDHoliday(?string $dHoliday): self
    {
        $this->dHoliday = $dHoliday;

        return $this;
    }

    public function getDWeekend(): ?string
    {
        return $this->dWeekend;
    }

    public function setDWeekend(?string $dWeekend): self
    {
        $this->dWeekend = $dWeekend;

        return $this;
    }

    public function getDFollowingHoliday(): ?string
    {
        return $this->dFollowingHoliday;
    }

    public function setDFollowingHoliday(?string $dFollowingHoliday): self
    {
        $this->dFollowingHoliday = $dFollowingHoliday;

        return $this;
    }

    public function getDFirstDom(): ?int
    {
        return $this->dFirstDom;
    }

    public function setDFirstDom(?int $dFirstDom): self
    {
        $this->dFirstDom = $dFirstDom;

        return $this;
    }

    public function getDLastDom(): ?int
    {
        return $this->dLastDom;
    }

    public function setDLastDom(?int $dLastDom): self
    {
        $this->dLastDom = $dLastDom;

        return $this;
    }

    public function getDSameDayLy(): ?int
    {
        return $this->dSameDayLy;
    }

    public function setDSameDayLy(?int $dSameDayLy): self
    {
        $this->dSameDayLy = $dSameDayLy;

        return $this;
    }

    public function getDSameDayLq(): ?int
    {
        return $this->dSameDayLq;
    }

    public function setDSameDayLq(?int $dSameDayLq): self
    {
        $this->dSameDayLq = $dSameDayLq;

        return $this;
    }

    public function getDCurrentDay(): ?string
    {
        return $this->dCurrentDay;
    }

    public function setDCurrentDay(?string $dCurrentDay): self
    {
        $this->dCurrentDay = $dCurrentDay;

        return $this;
    }

    public function getDCurrentWeek(): ?string
    {
        return $this->dCurrentWeek;
    }

    public function setDCurrentWeek(?string $dCurrentWeek): self
    {
        $this->dCurrentWeek = $dCurrentWeek;

        return $this;
    }

    public function getDCurrentMonth(): ?string
    {
        return $this->dCurrentMonth;
    }

    public function setDCurrentMonth(?string $dCurrentMonth): self
    {
        $this->dCurrentMonth = $dCurrentMonth;

        return $this;
    }

    public function getDCurrentQuarter(): ?string
    {
        return $this->dCurrentQuarter;
    }

    public function setDCurrentQuarter(?string $dCurrentQuarter): self
    {
        $this->dCurrentQuarter = $dCurrentQuarter;

        return $this;
    }

    public function getDCurrentYear(): ?string
    {
        return $this->dCurrentYear;
    }

    public function setDCurrentYear(?string $dCurrentYear): self
    {
        $this->dCurrentYear = $dCurrentYear;

        return $this;
    }


}
