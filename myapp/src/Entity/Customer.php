<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 * 
 * @ORM\Table(name="customer", indexes={@ORM\Index(name="c_fsd", columns={"c_first_sales_date_sk"}), @ORM\Index(name="c_hd", columns={"c_current_hdemo_sk"}), @ORM\Index(name="c_fsd2", columns={"c_first_shipto_date_sk"}), @ORM\Index(name="c_cd", columns={"c_current_cdemo_sk"}), @ORM\Index(name="c_a", columns={"c_current_addr_sk"})})
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="c_customer_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="customer_c_customer_sk_seq", allocationSize=1, initialValue=1)
     */
    private $cCustomerSk;

    /**
     * @var string
     *
     * @ORM\Column(name="c_customer_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $cCustomerId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="c_salutation", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $cSalutation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="c_first_name", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $cFirstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="c_last_name", type="string", length=30, nullable=true, options={"fixed"=true})
     */
    private $cLastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="c_preferred_cust_flag", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $cPreferredCustFlag;

    /**
     * @var int|null
     *
     * @ORM\Column(name="c_birth_day", type="integer", nullable=true)
     */
    private $cBirthDay;

    /**
     * @var int|null
     *
     * @ORM\Column(name="c_birth_month", type="integer", nullable=true)
     */
    private $cBirthMonth;

    /**
     * @var int|null
     *
     * @ORM\Column(name="c_birth_year", type="integer", nullable=true)
     */
    private $cBirthYear;

    /**
     * @var string|null
     *
     * @ORM\Column(name="c_birth_country", type="string", length=20, nullable=true)
     */
    private $cBirthCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="c_login", type="string", length=13, nullable=true, options={"fixed"=true})
     */
    private $cLogin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="c_email_address", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $cEmailAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="c_last_review_date", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $cLastReviewDate;

    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="CustomerAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="c_current_addr_sk", referencedColumnName="ca_address_sk")
     * })
     */
    private $cCurrentAddrSk;

    /**
     * @var CustomerDemographics
     *
     * @ORM\ManyToOne(targetEntity="CustomerDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="c_current_cdemo_sk", referencedColumnName="cd_demo_sk")
     * })
     */
    private $cCurrentCdemoSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="c_first_sales_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $cFirstSalesDateSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="c_first_shipto_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $cFirstShiptoDateSk;

    /**
     * @var HouseholdDemographics
     *
     * @ORM\ManyToOne(targetEntity="HouseholdDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="c_current_hdemo_sk", referencedColumnName="hd_demo_sk")
     * })
     */
    private $cCurrentHdemoSk;

    public function getCCustomerSk(): ?int
    {
        return $this->cCustomerSk;
    }

    public function getCCustomerId(): ?string
    {
        return $this->cCustomerId;
    }

    public function setCCustomerId(string $cCustomerId): self
    {
        $this->cCustomerId = $cCustomerId;

        return $this;
    }

    public function getCSalutation(): ?string
    {
        return $this->cSalutation;
    }

    public function setCSalutation(?string $cSalutation): self
    {
        $this->cSalutation = $cSalutation;

        return $this;
    }

    public function getCFirstName(): ?string
    {
        return $this->cFirstName;
    }

    public function setCFirstName(?string $cFirstName): self
    {
        $this->cFirstName = $cFirstName;

        return $this;
    }

    public function getCLastName(): ?string
    {
        return $this->cLastName;
    }

    public function setCLastName(?string $cLastName): self
    {
        $this->cLastName = $cLastName;

        return $this;
    }

    public function getCPreferredCustFlag(): ?string
    {
        return $this->cPreferredCustFlag;
    }

    public function setCPreferredCustFlag(?string $cPreferredCustFlag): self
    {
        $this->cPreferredCustFlag = $cPreferredCustFlag;

        return $this;
    }

    public function getCBirthDay(): ?int
    {
        return $this->cBirthDay;
    }

    public function setCBirthDay(?int $cBirthDay): self
    {
        $this->cBirthDay = $cBirthDay;

        return $this;
    }

    public function getCBirthMonth(): ?int
    {
        return $this->cBirthMonth;
    }

    public function setCBirthMonth(?int $cBirthMonth): self
    {
        $this->cBirthMonth = $cBirthMonth;

        return $this;
    }

    public function getCBirthYear(): ?int
    {
        return $this->cBirthYear;
    }

    public function setCBirthYear(?int $cBirthYear): self
    {
        $this->cBirthYear = $cBirthYear;

        return $this;
    }

    public function getCBirthCountry(): ?string
    {
        return $this->cBirthCountry;
    }

    public function setCBirthCountry(?string $cBirthCountry): self
    {
        $this->cBirthCountry = $cBirthCountry;

        return $this;
    }

    public function getCLogin(): ?string
    {
        return $this->cLogin;
    }

    public function setCLogin(?string $cLogin): self
    {
        $this->cLogin = $cLogin;

        return $this;
    }

    public function getCEmailAddress(): ?string
    {
        return $this->cEmailAddress;
    }

    public function setCEmailAddress(?string $cEmailAddress): self
    {
        $this->cEmailAddress = $cEmailAddress;

        return $this;
    }

    public function getCLastReviewDate(): ?string
    {
        return $this->cLastReviewDate;
    }

    public function setCLastReviewDate(?string $cLastReviewDate): self
    {
        $this->cLastReviewDate = $cLastReviewDate;

        return $this;
    }

    public function getCCurrentAddrSk(): ?CustomerAddress
    {
        return $this->cCurrentAddrSk;
    }

    public function setCCurrentAddrSk(?CustomerAddress $cCurrentAddrSk): self
    {
        $this->cCurrentAddrSk = $cCurrentAddrSk;

        return $this;
    }

    public function getCCurrentCdemoSk(): ?CustomerDemographics
    {
        return $this->cCurrentCdemoSk;
    }

    public function setCCurrentCdemoSk(?CustomerDemographics $cCurrentCdemoSk): self
    {
        $this->cCurrentCdemoSk = $cCurrentCdemoSk;

        return $this;
    }

    public function getCFirstSalesDateSk(): ?DateDim
    {
        return $this->cFirstSalesDateSk;
    }

    public function setCFirstSalesDateSk(?DateDim $cFirstSalesDateSk): self
    {
        $this->cFirstSalesDateSk = $cFirstSalesDateSk;

        return $this;
    }

    public function getCFirstShiptoDateSk(): ?DateDim
    {
        return $this->cFirstShiptoDateSk;
    }

    public function setCFirstShiptoDateSk(?DateDim $cFirstShiptoDateSk): self
    {
        $this->cFirstShiptoDateSk = $cFirstShiptoDateSk;

        return $this;
    }

    public function getCCurrentHdemoSk(): ?HouseholdDemographics
    {
        return $this->cCurrentHdemoSk;
    }

    public function setCCurrentHdemoSk(?HouseholdDemographics $cCurrentHdemoSk): self
    {
        $this->cCurrentHdemoSk = $cCurrentHdemoSk;

        return $this;
    }


}
