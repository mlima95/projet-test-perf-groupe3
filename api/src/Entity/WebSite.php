<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * WebSite
 * @ApiResource()
 * @ORM\Table(name="web_site", indexes={@ORM\Index(name="web_d2", columns={"web_open_date_sk"}), @ORM\Index(name="web_d1", columns={"web_close_date_sk"})})
 * @ORM\Entity
 */
class WebSite
{
    /**
     * @var int
     *
     * @ORM\Column(name="web_site_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="web_site_web_site_sk_seq", allocationSize=1, initialValue=1)
     */
    private $webSiteSk;

    /**
     * @var string
     *
     * @ORM\Column(name="web_site_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $webSiteId;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="web_rec_start_date", type="date", nullable=true)
     */
    private $webRecStartDate;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="web_rec_end_date", type="date", nullable=true)
     */
    private $webRecEndDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_name", type="string", length=50, nullable=true)
     */
    private $webName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_class", type="string", length=50, nullable=true)
     */
    private $webClass;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_manager", type="string", length=40, nullable=true)
     */
    private $webManager;

    /**
     * @var int|null
     *
     * @ORM\Column(name="web_mkt_id", type="integer", nullable=true)
     */
    private $webMktId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_mkt_class", type="string", length=50, nullable=true)
     */
    private $webMktClass;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_mkt_desc", type="string", length=100, nullable=true)
     */
    private $webMktDesc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_market_manager", type="string", length=40, nullable=true)
     */
    private $webMarketManager;

    /**
     * @var int|null
     *
     * @ORM\Column(name="web_company_id", type="integer", nullable=true)
     */
    private $webCompanyId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_company_name", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $webCompanyName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_street_number", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $webStreetNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_street_name", type="string", length=60, nullable=true)
     */
    private $webStreetName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_street_type", type="string", length=15, nullable=true, options={"fixed"=true})
     */
    private $webStreetType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_suite_number", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $webSuiteNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_city", type="string", length=60, nullable=true)
     */
    private $webCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_county", type="string", length=30, nullable=true)
     */
    private $webCounty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_state", type="string", length=2, nullable=true, options={"fixed"=true})
     */
    private $webState;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_zip", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $webZip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_country", type="string", length=20, nullable=true)
     */
    private $webCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_gmt_offset", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $webGmtOffset;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_tax_percentage", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $webTaxPercentage;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="web_close_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $webCloseDateSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="web_open_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $webOpenDateSk;

    public function getWebSiteSk(): ?int
    {
        return $this->webSiteSk;
    }

    public function getWebSiteId(): ?string
    {
        return $this->webSiteId;
    }

    public function setWebSiteId(string $webSiteId): self
    {
        $this->webSiteId = $webSiteId;

        return $this;
    }

    public function getWebRecStartDate(): ?\DateTimeInterface
    {
        return $this->webRecStartDate;
    }

    public function setWebRecStartDate(?\DateTimeInterface $webRecStartDate): self
    {
        $this->webRecStartDate = $webRecStartDate;

        return $this;
    }

    public function getWebRecEndDate(): ?\DateTimeInterface
    {
        return $this->webRecEndDate;
    }

    public function setWebRecEndDate(?\DateTimeInterface $webRecEndDate): self
    {
        $this->webRecEndDate = $webRecEndDate;

        return $this;
    }

    public function getWebName(): ?string
    {
        return $this->webName;
    }

    public function setWebName(?string $webName): self
    {
        $this->webName = $webName;

        return $this;
    }

    public function getWebClass(): ?string
    {
        return $this->webClass;
    }

    public function setWebClass(?string $webClass): self
    {
        $this->webClass = $webClass;

        return $this;
    }

    public function getWebManager(): ?string
    {
        return $this->webManager;
    }

    public function setWebManager(?string $webManager): self
    {
        $this->webManager = $webManager;

        return $this;
    }

    public function getWebMktId(): ?int
    {
        return $this->webMktId;
    }

    public function setWebMktId(?int $webMktId): self
    {
        $this->webMktId = $webMktId;

        return $this;
    }

    public function getWebMktClass(): ?string
    {
        return $this->webMktClass;
    }

    public function setWebMktClass(?string $webMktClass): self
    {
        $this->webMktClass = $webMktClass;

        return $this;
    }

    public function getWebMktDesc(): ?string
    {
        return $this->webMktDesc;
    }

    public function setWebMktDesc(?string $webMktDesc): self
    {
        $this->webMktDesc = $webMktDesc;

        return $this;
    }

    public function getWebMarketManager(): ?string
    {
        return $this->webMarketManager;
    }

    public function setWebMarketManager(?string $webMarketManager): self
    {
        $this->webMarketManager = $webMarketManager;

        return $this;
    }

    public function getWebCompanyId(): ?int
    {
        return $this->webCompanyId;
    }

    public function setWebCompanyId(?int $webCompanyId): self
    {
        $this->webCompanyId = $webCompanyId;

        return $this;
    }

    public function getWebCompanyName(): ?string
    {
        return $this->webCompanyName;
    }

    public function setWebCompanyName(?string $webCompanyName): self
    {
        $this->webCompanyName = $webCompanyName;

        return $this;
    }

    public function getWebStreetNumber(): ?string
    {
        return $this->webStreetNumber;
    }

    public function setWebStreetNumber(?string $webStreetNumber): self
    {
        $this->webStreetNumber = $webStreetNumber;

        return $this;
    }

    public function getWebStreetName(): ?string
    {
        return $this->webStreetName;
    }

    public function setWebStreetName(?string $webStreetName): self
    {
        $this->webStreetName = $webStreetName;

        return $this;
    }

    public function getWebStreetType(): ?string
    {
        return $this->webStreetType;
    }

    public function setWebStreetType(?string $webStreetType): self
    {
        $this->webStreetType = $webStreetType;

        return $this;
    }

    public function getWebSuiteNumber(): ?string
    {
        return $this->webSuiteNumber;
    }

    public function setWebSuiteNumber(?string $webSuiteNumber): self
    {
        $this->webSuiteNumber = $webSuiteNumber;

        return $this;
    }

    public function getWebCity(): ?string
    {
        return $this->webCity;
    }

    public function setWebCity(?string $webCity): self
    {
        $this->webCity = $webCity;

        return $this;
    }

    public function getWebCounty(): ?string
    {
        return $this->webCounty;
    }

    public function setWebCounty(?string $webCounty): self
    {
        $this->webCounty = $webCounty;

        return $this;
    }

    public function getWebState(): ?string
    {
        return $this->webState;
    }

    public function setWebState(?string $webState): self
    {
        $this->webState = $webState;

        return $this;
    }

    public function getWebZip(): ?string
    {
        return $this->webZip;
    }

    public function setWebZip(?string $webZip): self
    {
        $this->webZip = $webZip;

        return $this;
    }

    public function getWebCountry(): ?string
    {
        return $this->webCountry;
    }

    public function setWebCountry(?string $webCountry): self
    {
        $this->webCountry = $webCountry;

        return $this;
    }

    public function getWebGmtOffset(): ?string
    {
        return $this->webGmtOffset;
    }

    public function setWebGmtOffset(?string $webGmtOffset): self
    {
        $this->webGmtOffset = $webGmtOffset;

        return $this;
    }

    public function getWebTaxPercentage(): ?string
    {
        return $this->webTaxPercentage;
    }

    public function setWebTaxPercentage(?string $webTaxPercentage): self
    {
        $this->webTaxPercentage = $webTaxPercentage;

        return $this;
    }

    public function getWebCloseDateSk(): ?DateDim
    {
        return $this->webCloseDateSk;
    }

    public function setWebCloseDateSk(?DateDim $webCloseDateSk): self
    {
        $this->webCloseDateSk = $webCloseDateSk;

        return $this;
    }

    public function getWebOpenDateSk(): ?DateDim
    {
        return $this->webOpenDateSk;
    }

    public function setWebOpenDateSk(?DateDim $webOpenDateSk): self
    {
        $this->webOpenDateSk = $webOpenDateSk;

        return $this;
    }


}
