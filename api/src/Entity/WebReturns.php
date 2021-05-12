<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebReturns
 *
 * @ORM\Table(name="web_returns", indexes={@ORM\Index(name="wr_ret_t", columns={"wr_returned_time_sk"}), @ORM\Index(name="wr_ret_cd", columns={"wr_returning_cdemo_sk"}), @ORM\Index(name="wr_ret_a", columns={"wr_returning_addr_sk"}), @ORM\Index(name="wr_ref_a", columns={"wr_refunded_addr_sk"}), @ORM\Index(name="wr_ret_c", columns={"wr_returning_customer_sk"}), @ORM\Index(name="wr_ref_c", columns={"wr_refunded_customer_sk"}), @ORM\Index(name="wr_ref_cd", columns={"wr_refunded_cdemo_sk"}), @ORM\Index(name="wr_ret_d", columns={"wr_returned_date_sk"}), @ORM\Index(name="wr_ref_hd", columns={"wr_refunded_hdemo_sk"}), @ORM\Index(name="wr_wp", columns={"wr_web_page_sk"}), @ORM\Index(name="wr_ret_hd", columns={"wr_returning_hdemo_sk"}), @ORM\Index(name="wr_r", columns={"wr_reason_sk"}), @ORM\Index(name="IDX_63B9E23BADD96C4", columns={"wr_item_sk"})})
 * @ORM\Entity
 */
class WebReturns
{
    /**
     * @var int
     *
     * @ORM\Column(name="wr_order_number", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $wrOrderNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(name="wr_return_quantity", type="integer", nullable=true)
     */
    private $wrReturnQuantity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wr_return_amt", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wrReturnAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wr_return_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wrReturnTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wr_return_amt_inc_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wrReturnAmtIncTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wr_fee", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wrFee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wr_return_ship_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wrReturnShipCost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wr_refunded_cash", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wrRefundedCash;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wr_reversed_charge", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wrReversedCharge;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wr_account_credit", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wrAccountCredit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wr_net_loss", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wrNetLoss;

    /**
     * @var Item
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_item_sk", referencedColumnName="i_item_sk")
     * })
     */
    private $wrItemSk;

    /**
     * @var Reason
     *
     * @ORM\ManyToOne(targetEntity="Reason")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_reason_sk", referencedColumnName="r_reason_sk")
     * })
     */
    private $wrReasonSk;

    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="CustomerAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_refunded_addr_sk", referencedColumnName="ca_address_sk")
     * })
     */
    private $wrRefundedAddrSk;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_refunded_customer_sk", referencedColumnName="c_customer_sk")
     * })
     */
    private $wrRefundedCustomerSk;

    /**
     * @var CustomerDemographics
     *
     * @ORM\ManyToOne(targetEntity="CustomerDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_refunded_cdemo_sk", referencedColumnName="cd_demo_sk")
     * })
     */
    private $wrRefundedCdemoSk;

    /**
     * @var HouseholdDemographics
     *
     * @ORM\ManyToOne(targetEntity="HouseholdDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_refunded_hdemo_sk", referencedColumnName="hd_demo_sk")
     * })
     */
    private $wrRefundedHdemoSk;

    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="CustomerAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_returning_addr_sk", referencedColumnName="ca_address_sk")
     * })
     */
    private $wrReturningAddrSk;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_returning_customer_sk", referencedColumnName="c_customer_sk")
     * })
     */
    private $wrReturningCustomerSk;

    /**
     * @var CustomerDemographics
     *
     * @ORM\ManyToOne(targetEntity="CustomerDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_returning_cdemo_sk", referencedColumnName="cd_demo_sk")
     * })
     */
    private $wrReturningCdemoSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_returned_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $wrReturnedDateSk;

    /**
     * @var HouseholdDemographics
     *
     * @ORM\ManyToOne(targetEntity="HouseholdDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_returning_hdemo_sk", referencedColumnName="hd_demo_sk")
     * })
     */
    private $wrReturningHdemoSk;

    /**
     * @var TimeDim
     *
     * @ORM\ManyToOne(targetEntity="TimeDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_returned_time_sk", referencedColumnName="t_time_sk")
     * })
     */
    private $wrReturnedTimeSk;

    /**
     * @var WebPage
     *
     * @ORM\ManyToOne(targetEntity="WebPage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wr_web_page_sk", referencedColumnName="wp_web_page_sk")
     * })
     */
    private $wrWebPageSk;

    public function getWrOrderNumber(): ?int
    {
        return $this->wrOrderNumber;
    }

    public function getWrReturnQuantity(): ?int
    {
        return $this->wrReturnQuantity;
    }

    public function setWrReturnQuantity(?int $wrReturnQuantity): self
    {
        $this->wrReturnQuantity = $wrReturnQuantity;

        return $this;
    }

    public function getWrReturnAmt(): ?string
    {
        return $this->wrReturnAmt;
    }

    public function setWrReturnAmt(?string $wrReturnAmt): self
    {
        $this->wrReturnAmt = $wrReturnAmt;

        return $this;
    }

    public function getWrReturnTax(): ?string
    {
        return $this->wrReturnTax;
    }

    public function setWrReturnTax(?string $wrReturnTax): self
    {
        $this->wrReturnTax = $wrReturnTax;

        return $this;
    }

    public function getWrReturnAmtIncTax(): ?string
    {
        return $this->wrReturnAmtIncTax;
    }

    public function setWrReturnAmtIncTax(?string $wrReturnAmtIncTax): self
    {
        $this->wrReturnAmtIncTax = $wrReturnAmtIncTax;

        return $this;
    }

    public function getWrFee(): ?string
    {
        return $this->wrFee;
    }

    public function setWrFee(?string $wrFee): self
    {
        $this->wrFee = $wrFee;

        return $this;
    }

    public function getWrReturnShipCost(): ?string
    {
        return $this->wrReturnShipCost;
    }

    public function setWrReturnShipCost(?string $wrReturnShipCost): self
    {
        $this->wrReturnShipCost = $wrReturnShipCost;

        return $this;
    }

    public function getWrRefundedCash(): ?string
    {
        return $this->wrRefundedCash;
    }

    public function setWrRefundedCash(?string $wrRefundedCash): self
    {
        $this->wrRefundedCash = $wrRefundedCash;

        return $this;
    }

    public function getWrReversedCharge(): ?string
    {
        return $this->wrReversedCharge;
    }

    public function setWrReversedCharge(?string $wrReversedCharge): self
    {
        $this->wrReversedCharge = $wrReversedCharge;

        return $this;
    }

    public function getWrAccountCredit(): ?string
    {
        return $this->wrAccountCredit;
    }

    public function setWrAccountCredit(?string $wrAccountCredit): self
    {
        $this->wrAccountCredit = $wrAccountCredit;

        return $this;
    }

    public function getWrNetLoss(): ?string
    {
        return $this->wrNetLoss;
    }

    public function setWrNetLoss(?string $wrNetLoss): self
    {
        $this->wrNetLoss = $wrNetLoss;

        return $this;
    }

    public function getWrItemSk(): ?Item
    {
        return $this->wrItemSk;
    }

    public function setWrItemSk(?Item $wrItemSk): self
    {
        $this->wrItemSk = $wrItemSk;

        return $this;
    }

    public function getWrReasonSk(): ?Reason
    {
        return $this->wrReasonSk;
    }

    public function setWrReasonSk(?Reason $wrReasonSk): self
    {
        $this->wrReasonSk = $wrReasonSk;

        return $this;
    }

    public function getWrRefundedAddrSk(): ?CustomerAddress
    {
        return $this->wrRefundedAddrSk;
    }

    public function setWrRefundedAddrSk(?CustomerAddress $wrRefundedAddrSk): self
    {
        $this->wrRefundedAddrSk = $wrRefundedAddrSk;

        return $this;
    }

    public function getWrRefundedCustomerSk(): ?Customer
    {
        return $this->wrRefundedCustomerSk;
    }

    public function setWrRefundedCustomerSk(?Customer $wrRefundedCustomerSk): self
    {
        $this->wrRefundedCustomerSk = $wrRefundedCustomerSk;

        return $this;
    }

    public function getWrRefundedCdemoSk(): ?CustomerDemographics
    {
        return $this->wrRefundedCdemoSk;
    }

    public function setWrRefundedCdemoSk(?CustomerDemographics $wrRefundedCdemoSk): self
    {
        $this->wrRefundedCdemoSk = $wrRefundedCdemoSk;

        return $this;
    }

    public function getWrRefundedHdemoSk(): ?HouseholdDemographics
    {
        return $this->wrRefundedHdemoSk;
    }

    public function setWrRefundedHdemoSk(?HouseholdDemographics $wrRefundedHdemoSk): self
    {
        $this->wrRefundedHdemoSk = $wrRefundedHdemoSk;

        return $this;
    }

    public function getWrReturningAddrSk(): ?CustomerAddress
    {
        return $this->wrReturningAddrSk;
    }

    public function setWrReturningAddrSk(?CustomerAddress $wrReturningAddrSk): self
    {
        $this->wrReturningAddrSk = $wrReturningAddrSk;

        return $this;
    }

    public function getWrReturningCustomerSk(): ?Customer
    {
        return $this->wrReturningCustomerSk;
    }

    public function setWrReturningCustomerSk(?Customer $wrReturningCustomerSk): self
    {
        $this->wrReturningCustomerSk = $wrReturningCustomerSk;

        return $this;
    }

    public function getWrReturningCdemoSk(): ?CustomerDemographics
    {
        return $this->wrReturningCdemoSk;
    }

    public function setWrReturningCdemoSk(?CustomerDemographics $wrReturningCdemoSk): self
    {
        $this->wrReturningCdemoSk = $wrReturningCdemoSk;

        return $this;
    }

    public function getWrReturnedDateSk(): ?DateDim
    {
        return $this->wrReturnedDateSk;
    }

    public function setWrReturnedDateSk(?DateDim $wrReturnedDateSk): self
    {
        $this->wrReturnedDateSk = $wrReturnedDateSk;

        return $this;
    }

    public function getWrReturningHdemoSk(): ?HouseholdDemographics
    {
        return $this->wrReturningHdemoSk;
    }

    public function setWrReturningHdemoSk(?HouseholdDemographics $wrReturningHdemoSk): self
    {
        $this->wrReturningHdemoSk = $wrReturningHdemoSk;

        return $this;
    }

    public function getWrReturnedTimeSk(): ?TimeDim
    {
        return $this->wrReturnedTimeSk;
    }

    public function setWrReturnedTimeSk(?TimeDim $wrReturnedTimeSk): self
    {
        $this->wrReturnedTimeSk = $wrReturnedTimeSk;

        return $this;
    }

    public function getWrWebPageSk(): ?WebPage
    {
        return $this->wrWebPageSk;
    }

    public function setWrWebPageSk(?WebPage $wrWebPageSk): self
    {
        $this->wrWebPageSk = $wrWebPageSk;

        return $this;
    }


}
