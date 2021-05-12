<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoreReturns
 *
 * @ORM\Table(name="store_returns", indexes={@ORM\Index(name="sr_hd", columns={"sr_hdemo_sk"}), @ORM\Index(name="sr_cd", columns={"sr_cdemo_sk"}), @ORM\Index(name="sr_s", columns={"sr_store_sk"}), @ORM\Index(name="sr_ret_d", columns={"sr_returned_date_sk"}), @ORM\Index(name="sr_c", columns={"sr_customer_sk"}), @ORM\Index(name="sr_a", columns={"sr_addr_sk"}), @ORM\Index(name="sr_t", columns={"sr_return_time_sk"}), @ORM\Index(name="sr_r", columns={"sr_reason_sk"}), @ORM\Index(name="IDX_921E6D4233636BE", columns={"sr_item_sk"})})
 * @ORM\Entity
 */
class StoreReturns
{
    /**
     * @var int
     *
     * @ORM\Column(name="sr_ticket_number", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $srTicketNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sr_return_quantity", type="integer", nullable=true)
     */
    private $srReturnQuantity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sr_return_amt", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $srReturnAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sr_return_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $srReturnTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sr_return_amt_inc_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $srReturnAmtIncTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sr_fee", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $srFee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sr_return_ship_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $srReturnShipCost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sr_refunded_cash", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $srRefundedCash;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sr_reversed_charge", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $srReversedCharge;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sr_store_credit", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $srStoreCredit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sr_net_loss", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $srNetLoss;

    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="CustomerAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sr_addr_sk", referencedColumnName="ca_address_sk")
     * })
     */
    private $srAddrSk;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sr_customer_sk", referencedColumnName="c_customer_sk")
     * })
     */
    private $srCustomerSk;

    /**
     * @var CustomerDemographics
     *
     * @ORM\ManyToOne(targetEntity="CustomerDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sr_cdemo_sk", referencedColumnName="cd_demo_sk")
     * })
     */
    private $srCdemoSk;

    /**
     * @var HouseholdDemographics
     *
     * @ORM\ManyToOne(targetEntity="HouseholdDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sr_hdemo_sk", referencedColumnName="hd_demo_sk")
     * })
     */
    private $srHdemoSk;

    /**
     * @var Item
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sr_item_sk", referencedColumnName="i_item_sk")
     * })
     */
    private $srItemSk;

    /**
     * @var Reason
     *
     * @ORM\ManyToOne(targetEntity="Reason")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sr_reason_sk", referencedColumnName="r_reason_sk")
     * })
     */
    private $srReasonSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sr_returned_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $srReturnedDateSk;

    /**
     * @var Store
     *
     * @ORM\ManyToOne(targetEntity="Store")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sr_store_sk", referencedColumnName="s_store_sk")
     * })
     */
    private $srStoreSk;

    /**
     * @var TimeDim
     *
     * @ORM\ManyToOne(targetEntity="TimeDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sr_return_time_sk", referencedColumnName="t_time_sk")
     * })
     */
    private $srReturnTimeSk;

    public function getSrTicketNumber(): ?int
    {
        return $this->srTicketNumber;
    }

    public function getSrReturnQuantity(): ?int
    {
        return $this->srReturnQuantity;
    }

    public function setSrReturnQuantity(?int $srReturnQuantity): self
    {
        $this->srReturnQuantity = $srReturnQuantity;

        return $this;
    }

    public function getSrReturnAmt(): ?string
    {
        return $this->srReturnAmt;
    }

    public function setSrReturnAmt(?string $srReturnAmt): self
    {
        $this->srReturnAmt = $srReturnAmt;

        return $this;
    }

    public function getSrReturnTax(): ?string
    {
        return $this->srReturnTax;
    }

    public function setSrReturnTax(?string $srReturnTax): self
    {
        $this->srReturnTax = $srReturnTax;

        return $this;
    }

    public function getSrReturnAmtIncTax(): ?string
    {
        return $this->srReturnAmtIncTax;
    }

    public function setSrReturnAmtIncTax(?string $srReturnAmtIncTax): self
    {
        $this->srReturnAmtIncTax = $srReturnAmtIncTax;

        return $this;
    }

    public function getSrFee(): ?string
    {
        return $this->srFee;
    }

    public function setSrFee(?string $srFee): self
    {
        $this->srFee = $srFee;

        return $this;
    }

    public function getSrReturnShipCost(): ?string
    {
        return $this->srReturnShipCost;
    }

    public function setSrReturnShipCost(?string $srReturnShipCost): self
    {
        $this->srReturnShipCost = $srReturnShipCost;

        return $this;
    }

    public function getSrRefundedCash(): ?string
    {
        return $this->srRefundedCash;
    }

    public function setSrRefundedCash(?string $srRefundedCash): self
    {
        $this->srRefundedCash = $srRefundedCash;

        return $this;
    }

    public function getSrReversedCharge(): ?string
    {
        return $this->srReversedCharge;
    }

    public function setSrReversedCharge(?string $srReversedCharge): self
    {
        $this->srReversedCharge = $srReversedCharge;

        return $this;
    }

    public function getSrStoreCredit(): ?string
    {
        return $this->srStoreCredit;
    }

    public function setSrStoreCredit(?string $srStoreCredit): self
    {
        $this->srStoreCredit = $srStoreCredit;

        return $this;
    }

    public function getSrNetLoss(): ?string
    {
        return $this->srNetLoss;
    }

    public function setSrNetLoss(?string $srNetLoss): self
    {
        $this->srNetLoss = $srNetLoss;

        return $this;
    }

    public function getSrAddrSk(): ?CustomerAddress
    {
        return $this->srAddrSk;
    }

    public function setSrAddrSk(?CustomerAddress $srAddrSk): self
    {
        $this->srAddrSk = $srAddrSk;

        return $this;
    }

    public function getSrCustomerSk(): ?Customer
    {
        return $this->srCustomerSk;
    }

    public function setSrCustomerSk(?Customer $srCustomerSk): self
    {
        $this->srCustomerSk = $srCustomerSk;

        return $this;
    }

    public function getSrCdemoSk(): ?CustomerDemographics
    {
        return $this->srCdemoSk;
    }

    public function setSrCdemoSk(?CustomerDemographics $srCdemoSk): self
    {
        $this->srCdemoSk = $srCdemoSk;

        return $this;
    }

    public function getSrHdemoSk(): ?HouseholdDemographics
    {
        return $this->srHdemoSk;
    }

    public function setSrHdemoSk(?HouseholdDemographics $srHdemoSk): self
    {
        $this->srHdemoSk = $srHdemoSk;

        return $this;
    }

    public function getSrItemSk(): ?Item
    {
        return $this->srItemSk;
    }

    public function setSrItemSk(?Item $srItemSk): self
    {
        $this->srItemSk = $srItemSk;

        return $this;
    }

    public function getSrReasonSk(): ?Reason
    {
        return $this->srReasonSk;
    }

    public function setSrReasonSk(?Reason $srReasonSk): self
    {
        $this->srReasonSk = $srReasonSk;

        return $this;
    }

    public function getSrReturnedDateSk(): ?DateDim
    {
        return $this->srReturnedDateSk;
    }

    public function setSrReturnedDateSk(?DateDim $srReturnedDateSk): self
    {
        $this->srReturnedDateSk = $srReturnedDateSk;

        return $this;
    }

    public function getSrStoreSk(): ?Store
    {
        return $this->srStoreSk;
    }

    public function setSrStoreSk(?Store $srStoreSk): self
    {
        $this->srStoreSk = $srStoreSk;

        return $this;
    }

    public function getSrReturnTimeSk(): ?TimeDim
    {
        return $this->srReturnTimeSk;
    }

    public function setSrReturnTimeSk(?TimeDim $srReturnTimeSk): self
    {
        $this->srReturnTimeSk = $srReturnTimeSk;

        return $this;
    }


}
