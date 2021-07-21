<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\CallCenterController;

/**
 * CallCenter
 * @ApiResource(itemOperations={
 *     "post_callCenter"={
 *         "method"="POST",
 *         "path"="/call_centers/slow_random",
 *         "controller"=CallCenterController::class,
 *     }
 * })
 * @ORM\Table(name="call_center", indexes={@ORM\Index(name="cc_d2", columns={"cc_open_date_sk"}), @ORM\Index(name="cc_d1", columns={"cc_closed_date_sk"})})
 * @ORM\Entity
 */
class CallCenter
{
    /**
     * @var int
     *
     * @ORM\Column(name="cc_call_center_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="call_center_cc_call_center_sk_seq", allocationSize=1, initialValue=1)
     */
    private $ccCallCenterSk;

    /**
     * @var string
     *
     * @ORM\Column(name="cc_call_center_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $ccCallCenterId;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="cc_rec_start_date", type="date", nullable=true)
     */
    private $ccRecStartDate;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="cc_rec_end_date", type="date", nullable=true)
     */
    private $ccRecEndDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_name", type="string", length=50, nullable=true)
     */
    private $ccName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_class", type="string", length=50, nullable=true)
     */
    private $ccClass;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cc_employees", type="integer", nullable=true)
     */
    private $ccEmployees;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cc_sq_ft", type="integer", nullable=true)
     */
    private $ccSqFt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_hours", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $ccHours;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_manager", type="string", length=40, nullable=true)
     */
    private $ccManager;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cc_mkt_id", type="integer", nullable=true)
     */
    private $ccMktId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_mkt_class", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $ccMktClass;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_mkt_desc", type="string", length=100, nullable=true)
     */
    private $ccMktDesc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_market_manager", type="string", length=40, nullable=true)
     */
    private $ccMarketManager;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cc_division", type="integer", nullable=true)
     */
    private $ccDivision;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_division_name", type="string", length=50, nullable=true)
     */
    private $ccDivisionName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cc_company", type="integer", nullable=true)
     */
    private $ccCompany;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_company_name", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $ccCompanyName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_street_number", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $ccStreetNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_street_name", type="string", length=60, nullable=true)
     */
    private $ccStreetName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_street_type", type="string", length=15, nullable=true, options={"fixed"=true})
     */
    private $ccStreetType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_suite_number", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $ccSuiteNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_city", type="string", length=60, nullable=true)
     */
    private $ccCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_county", type="string", length=30, nullable=true)
     */
    private $ccCounty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_state", type="string", length=2, nullable=true, options={"fixed"=true})
     */
    private $ccState;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_zip", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $ccZip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_country", type="string", length=20, nullable=true)
     */
    private $ccCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_gmt_offset", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $ccGmtOffset;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_tax_percentage", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $ccTaxPercentage;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cc_closed_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $ccClosedDateSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cc_open_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $ccOpenDateSk;

    public function getCcCallCenterSk(): ?int
    {
        return $this->ccCallCenterSk;
    }

    public function getCcCallCenterId(): ?string
    {
        return $this->ccCallCenterId;
    }

    public function setCcCallCenterId(string $ccCallCenterId): self
    {
        $this->ccCallCenterId = $ccCallCenterId;

        return $this;
    }

    public function getCcRecStartDate(): ?\DateTimeInterface
    {
        return $this->ccRecStartDate;
    }

    public function setCcRecStartDate(?\DateTimeInterface $ccRecStartDate): self
    {
        $this->ccRecStartDate = $ccRecStartDate;

        return $this;
    }

    public function getCcRecEndDate(): ?\DateTimeInterface
    {
        return $this->ccRecEndDate;
    }

    public function setCcRecEndDate(?\DateTimeInterface $ccRecEndDate): self
    {
        $this->ccRecEndDate = $ccRecEndDate;

        return $this;
    }

    public function getCcName(): ?string
    {
        return $this->ccName;
    }

    public function setCcName(?string $ccName): self
    {
        $this->ccName = $ccName;

        return $this;
    }

    public function getCcClass(): ?string
    {
        return $this->ccClass;
    }

    public function setCcClass(?string $ccClass): self
    {
        $this->ccClass = $ccClass;

        return $this;
    }

    public function getCcEmployees(): ?int
    {
        return $this->ccEmployees;
    }

    public function setCcEmployees(?int $ccEmployees): self
    {
        $this->ccEmployees = $ccEmployees;

        return $this;
    }

    public function getCcSqFt(): ?int
    {
        return $this->ccSqFt;
    }

    public function setCcSqFt(?int $ccSqFt): self
    {
        $this->ccSqFt = $ccSqFt;

        return $this;
    }

    public function getCcHours(): ?string
    {
        return $this->ccHours;
    }

    public function setCcHours(?string $ccHours): self
    {
        $this->ccHours = $ccHours;

        return $this;
    }

    public function getCcManager(): ?string
    {
        return $this->ccManager;
    }

    public function setCcManager(?string $ccManager): self
    {
        $this->ccManager = $ccManager;

        return $this;
    }

    public function getCcMktId(): ?int
    {
        return $this->ccMktId;
    }

    public function setCcMktId(?int $ccMktId): self
    {
        $this->ccMktId = $ccMktId;

        return $this;
    }

    public function getCcMktClass(): ?string
    {
        return $this->ccMktClass;
    }

    public function setCcMktClass(?string $ccMktClass): self
    {
        $this->ccMktClass = $ccMktClass;

        return $this;
    }

    public function getCcMktDesc(): ?string
    {
        return $this->ccMktDesc;
    }

    public function setCcMktDesc(?string $ccMktDesc): self
    {
        $this->ccMktDesc = $ccMktDesc;

        return $this;
    }

    public function getCcMarketManager(): ?string
    {
        return $this->ccMarketManager;
    }

    public function setCcMarketManager(?string $ccMarketManager): self
    {
        $this->ccMarketManager = $ccMarketManager;

        return $this;
    }

    public function getCcDivision(): ?int
    {
        return $this->ccDivision;
    }

    public function setCcDivision(?int $ccDivision): self
    {
        $this->ccDivision = $ccDivision;

        return $this;
    }

    public function getCcDivisionName(): ?string
    {
        return $this->ccDivisionName;
    }

    public function setCcDivisionName(?string $ccDivisionName): self
    {
        $this->ccDivisionName = $ccDivisionName;

        return $this;
    }

    public function getCcCompany(): ?int
    {
        return $this->ccCompany;
    }

    public function setCcCompany(?int $ccCompany): self
    {
        $this->ccCompany = $ccCompany;

        return $this;
    }

    public function getCcCompanyName(): ?string
    {
        return $this->ccCompanyName;
    }

    public function setCcCompanyName(?string $ccCompanyName): self
    {
        $this->ccCompanyName = $ccCompanyName;

        return $this;
    }

    public function getCcStreetNumber(): ?string
    {
        return $this->ccStreetNumber;
    }

    public function setCcStreetNumber(?string $ccStreetNumber): self
    {
        $this->ccStreetNumber = $ccStreetNumber;

        return $this;
    }

    public function getCcStreetName(): ?string
    {
        return $this->ccStreetName;
    }

    public function setCcStreetName(?string $ccStreetName): self
    {
        $this->ccStreetName = $ccStreetName;

        return $this;
    }

    public function getCcStreetType(): ?string
    {
        return $this->ccStreetType;
    }

    public function setCcStreetType(?string $ccStreetType): self
    {
        $this->ccStreetType = $ccStreetType;

        return $this;
    }

    public function getCcSuiteNumber(): ?string
    {
        return $this->ccSuiteNumber;
    }

    public function setCcSuiteNumber(?string $ccSuiteNumber): self
    {
        $this->ccSuiteNumber = $ccSuiteNumber;

        return $this;
    }

    public function getCcCity(): ?string
    {
        return $this->ccCity;
    }

    public function setCcCity(?string $ccCity): self
    {
        $this->ccCity = $ccCity;

        return $this;
    }

    public function getCcCounty(): ?string
    {
        return $this->ccCounty;
    }

    public function setCcCounty(?string $ccCounty): self
    {
        $this->ccCounty = $ccCounty;

        return $this;
    }

    public function getCcState(): ?string
    {
        return $this->ccState;
    }

    public function setCcState(?string $ccState): self
    {
        $this->ccState = $ccState;

        return $this;
    }

    public function getCcZip(): ?string
    {
        return $this->ccZip;
    }

    public function setCcZip(?string $ccZip): self
    {
        $this->ccZip = $ccZip;

        return $this;
    }

    public function getCcCountry(): ?string
    {
        return $this->ccCountry;
    }

    public function setCcCountry(?string $ccCountry): self
    {
        $this->ccCountry = $ccCountry;

        return $this;
    }

    public function getCcGmtOffset(): ?string
    {
        return $this->ccGmtOffset;
    }

    public function setCcGmtOffset(?string $ccGmtOffset): self
    {
        $this->ccGmtOffset = $ccGmtOffset;

        return $this;
    }

    public function getCcTaxPercentage(): ?string
    {
        return $this->ccTaxPercentage;
    }

    public function setCcTaxPercentage(?string $ccTaxPercentage): self
    {
        $this->ccTaxPercentage = $ccTaxPercentage;

        return $this;
    }

    public function getCcClosedDateSk(): ?DateDim
    {
        return $this->ccClosedDateSk;
    }

    public function setCcClosedDateSk(?DateDim $ccClosedDateSk): self
    {
        $this->ccClosedDateSk = $ccClosedDateSk;

        return $this;
    }

    public function getCcOpenDateSk(): ?DateDim
    {
        return $this->ccOpenDateSk;
    }

    public function setCcOpenDateSk(?DateDim $ccOpenDateSk): self
    {
        $this->ccOpenDateSk = $ccOpenDateSk;

        return $this;
    }


}
