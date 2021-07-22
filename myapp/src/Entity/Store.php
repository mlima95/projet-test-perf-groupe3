<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Store
 * 
 * @ORM\Table(name="store", indexes={@ORM\Index(name="s_close_date", columns={"s_closed_date_sk"})})
 * @ORM\Entity
 */
class Store
{
    /**
     * @var int
     *
     * @ORM\Column(name="s_store_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="store_s_store_sk_seq", allocationSize=1, initialValue=1)
     */
    private $sStoreSk;

    /**
     * @var string
     *
     * @ORM\Column(name="s_store_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $sStoreId;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="s_rec_start_date", type="date", nullable=true)
     */
    private $sRecStartDate;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="s_rec_end_date", type="date", nullable=true)
     */
    private $sRecEndDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_store_name", type="string", length=50, nullable=true)
     */
    private $sStoreName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="s_number_employees", type="integer", nullable=true)
     */
    private $sNumberEmployees;

    /**
     * @var int|null
     *
     * @ORM\Column(name="s_floor_space", type="integer", nullable=true)
     */
    private $sFloorSpace;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_hours", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $sHours;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_manager", type="string", length=40, nullable=true)
     */
    private $sManager;

    /**
     * @var int|null
     *
     * @ORM\Column(name="s_market_id", type="integer", nullable=true)
     */
    private $sMarketId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_geography_class", type="string", length=100, nullable=true)
     */
    private $sGeographyClass;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_market_desc", type="string", length=100, nullable=true)
     */
    private $sMarketDesc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_market_manager", type="string", length=40, nullable=true)
     */
    private $sMarketManager;

    /**
     * @var int|null
     *
     * @ORM\Column(name="s_division_id", type="integer", nullable=true)
     */
    private $sDivisionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_division_name", type="string", length=50, nullable=true)
     */
    private $sDivisionName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="s_company_id", type="integer", nullable=true)
     */
    private $sCompanyId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_company_name", type="string", length=50, nullable=true)
     */
    private $sCompanyName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_street_number", type="string", length=10, nullable=true)
     */
    private $sStreetNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_street_name", type="string", length=60, nullable=true)
     */
    private $sStreetName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_street_type", type="string", length=15, nullable=true, options={"fixed"=true})
     */
    private $sStreetType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_suite_number", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $sSuiteNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_city", type="string", length=60, nullable=true)
     */
    private $sCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_county", type="string", length=30, nullable=true)
     */
    private $sCounty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_state", type="string", length=2, nullable=true, options={"fixed"=true})
     */
    private $sState;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_zip", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $sZip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_country", type="string", length=20, nullable=true)
     */
    private $sCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_gmt_offset", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $sGmtOffset;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_tax_precentage", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $sTaxPrecentage;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="s_closed_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $sClosedDateSk;

    public function getSStoreSk(): ?int
    {
        return $this->sStoreSk;
    }

    public function getSStoreId(): ?string
    {
        return $this->sStoreId;
    }

    public function setSStoreId(string $sStoreId): self
    {
        $this->sStoreId = $sStoreId;

        return $this;
    }

    public function getSRecStartDate(): ?\DateTimeInterface
    {
        return $this->sRecStartDate;
    }

    public function setSRecStartDate(?\DateTimeInterface $sRecStartDate): self
    {
        $this->sRecStartDate = $sRecStartDate;

        return $this;
    }

    public function getSRecEndDate(): ?\DateTimeInterface
    {
        return $this->sRecEndDate;
    }

    public function setSRecEndDate(?\DateTimeInterface $sRecEndDate): self
    {
        $this->sRecEndDate = $sRecEndDate;

        return $this;
    }

    public function getSStoreName(): ?string
    {
        return $this->sStoreName;
    }

    public function setSStoreName(?string $sStoreName): self
    {
        $this->sStoreName = $sStoreName;

        return $this;
    }

    public function getSNumberEmployees(): ?int
    {
        return $this->sNumberEmployees;
    }

    public function setSNumberEmployees(?int $sNumberEmployees): self
    {
        $this->sNumberEmployees = $sNumberEmployees;

        return $this;
    }

    public function getSFloorSpace(): ?int
    {
        return $this->sFloorSpace;
    }

    public function setSFloorSpace(?int $sFloorSpace): self
    {
        $this->sFloorSpace = $sFloorSpace;

        return $this;
    }

    public function getSHours(): ?string
    {
        return $this->sHours;
    }

    public function setSHours(?string $sHours): self
    {
        $this->sHours = $sHours;

        return $this;
    }

    public function getSManager(): ?string
    {
        return $this->sManager;
    }

    public function setSManager(?string $sManager): self
    {
        $this->sManager = $sManager;

        return $this;
    }

    public function getSMarketId(): ?int
    {
        return $this->sMarketId;
    }

    public function setSMarketId(?int $sMarketId): self
    {
        $this->sMarketId = $sMarketId;

        return $this;
    }

    public function getSGeographyClass(): ?string
    {
        return $this->sGeographyClass;
    }

    public function setSGeographyClass(?string $sGeographyClass): self
    {
        $this->sGeographyClass = $sGeographyClass;

        return $this;
    }

    public function getSMarketDesc(): ?string
    {
        return $this->sMarketDesc;
    }

    public function setSMarketDesc(?string $sMarketDesc): self
    {
        $this->sMarketDesc = $sMarketDesc;

        return $this;
    }

    public function getSMarketManager(): ?string
    {
        return $this->sMarketManager;
    }

    public function setSMarketManager(?string $sMarketManager): self
    {
        $this->sMarketManager = $sMarketManager;

        return $this;
    }

    public function getSDivisionId(): ?int
    {
        return $this->sDivisionId;
    }

    public function setSDivisionId(?int $sDivisionId): self
    {
        $this->sDivisionId = $sDivisionId;

        return $this;
    }

    public function getSDivisionName(): ?string
    {
        return $this->sDivisionName;
    }

    public function setSDivisionName(?string $sDivisionName): self
    {
        $this->sDivisionName = $sDivisionName;

        return $this;
    }

    public function getSCompanyId(): ?int
    {
        return $this->sCompanyId;
    }

    public function setSCompanyId(?int $sCompanyId): self
    {
        $this->sCompanyId = $sCompanyId;

        return $this;
    }

    public function getSCompanyName(): ?string
    {
        return $this->sCompanyName;
    }

    public function setSCompanyName(?string $sCompanyName): self
    {
        $this->sCompanyName = $sCompanyName;

        return $this;
    }

    public function getSStreetNumber(): ?string
    {
        return $this->sStreetNumber;
    }

    public function setSStreetNumber(?string $sStreetNumber): self
    {
        $this->sStreetNumber = $sStreetNumber;

        return $this;
    }

    public function getSStreetName(): ?string
    {
        return $this->sStreetName;
    }

    public function setSStreetName(?string $sStreetName): self
    {
        $this->sStreetName = $sStreetName;

        return $this;
    }

    public function getSStreetType(): ?string
    {
        return $this->sStreetType;
    }

    public function setSStreetType(?string $sStreetType): self
    {
        $this->sStreetType = $sStreetType;

        return $this;
    }

    public function getSSuiteNumber(): ?string
    {
        return $this->sSuiteNumber;
    }

    public function setSSuiteNumber(?string $sSuiteNumber): self
    {
        $this->sSuiteNumber = $sSuiteNumber;

        return $this;
    }

    public function getSCity(): ?string
    {
        return $this->sCity;
    }

    public function setSCity(?string $sCity): self
    {
        $this->sCity = $sCity;

        return $this;
    }

    public function getSCounty(): ?string
    {
        return $this->sCounty;
    }

    public function setSCounty(?string $sCounty): self
    {
        $this->sCounty = $sCounty;

        return $this;
    }

    public function getSState(): ?string
    {
        return $this->sState;
    }

    public function setSState(?string $sState): self
    {
        $this->sState = $sState;

        return $this;
    }

    public function getSZip(): ?string
    {
        return $this->sZip;
    }

    public function setSZip(?string $sZip): self
    {
        $this->sZip = $sZip;

        return $this;
    }

    public function getSCountry(): ?string
    {
        return $this->sCountry;
    }

    public function setSCountry(?string $sCountry): self
    {
        $this->sCountry = $sCountry;

        return $this;
    }

    public function getSGmtOffset(): ?string
    {
        return $this->sGmtOffset;
    }

    public function setSGmtOffset(?string $sGmtOffset): self
    {
        $this->sGmtOffset = $sGmtOffset;

        return $this;
    }

    public function getSTaxPrecentage(): ?string
    {
        return $this->sTaxPrecentage;
    }

    public function setSTaxPrecentage(?string $sTaxPrecentage): self
    {
        $this->sTaxPrecentage = $sTaxPrecentage;

        return $this;
    }

    public function getSClosedDateSk(): ?DateDim
    {
        return $this->sClosedDateSk;
    }

    public function setSClosedDateSk(?DateDim $sClosedDateSk): self
    {
        $this->sClosedDateSk = $sClosedDateSk;

        return $this;
    }


}
