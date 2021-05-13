<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * CatalogReturns
 * @ApiResource()
 * @ORM\Table(name="catalog_returns", indexes={@ORM\Index(name="cr_cc", columns={"cr_call_center_sk"}), @ORM\Index(name="cr_a2", columns={"cr_returning_addr_sk"}), @ORM\Index(name="cr_a1", columns={"cr_refunded_addr_sk"}), @ORM\Index(name="cr_hd2", columns={"cr_returning_hdemo_sk"}), @ORM\Index(name="cr_cd1", columns={"cr_refunded_cdemo_sk"}), @ORM\Index(name="cr_d1", columns={"cr_returned_date_sk"}), @ORM\Index(name="cr_hd1", columns={"cr_refunded_hdemo_sk"}), @ORM\Index(name="cr_sm", columns={"cr_ship_mode_sk"}), @ORM\Index(name="cr_r", columns={"cr_reason_sk"}), @ORM\Index(name="cr_c2", columns={"cr_returning_customer_sk"}), @ORM\Index(name="cr_w2", columns={"cr_warehouse_sk"}), @ORM\Index(name="cr_c1", columns={"cr_refunded_customer_sk"}), @ORM\Index(name="cr_t", columns={"cr_returned_time_sk"}), @ORM\Index(name="cr_cp", columns={"cr_catalog_page_sk"}), @ORM\Index(name="cr_cd2", columns={"cr_returning_cdemo_sk"}), @ORM\Index(name="IDX_84A4B1892498B756", columns={"cr_item_sk"})})
 * @ORM\Entity
 */
class CatalogReturns
{
    /**
     * @var int
     *
     * @ORM\Column(name="cr_order_number", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $crOrderNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cr_return_quantity", type="integer", nullable=true)
     */
    private $crReturnQuantity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cr_return_amount", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $crReturnAmount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cr_return_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $crReturnTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cr_return_amt_inc_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $crReturnAmtIncTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cr_fee", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $crFee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cr_return_ship_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $crReturnShipCost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cr_refunded_cash", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $crRefundedCash;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cr_reversed_charge", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $crReversedCharge;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cr_store_credit", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $crStoreCredit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cr_net_loss", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $crNetLoss;

    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="CustomerAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_refunded_addr_sk", referencedColumnName="ca_address_sk")
     * })
     */
    private $crRefundedAddrSk;

    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="CustomerAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_returning_addr_sk", referencedColumnName="ca_address_sk")
     * })
     */
    private $crReturningAddrSk;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_refunded_customer_sk", referencedColumnName="c_customer_sk")
     * })
     */
    private $crRefundedCustomerSk;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_returning_customer_sk", referencedColumnName="c_customer_sk")
     * })
     */
    private $crReturningCustomerSk;

    /**
     * @var CallCenter
     *
     * @ORM\ManyToOne(targetEntity="CallCenter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_call_center_sk", referencedColumnName="cc_call_center_sk")
     * })
     */
    private $crCallCenterSk;

    /**
     * @var CustomerDemographics
     *
     * @ORM\ManyToOne(targetEntity="CustomerDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_refunded_cdemo_sk", referencedColumnName="cd_demo_sk")
     * })
     */
    private $crRefundedCdemoSk;

    /**
     * @var CustomerDemographics
     *
     * @ORM\ManyToOne(targetEntity="CustomerDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_returning_cdemo_sk", referencedColumnName="cd_demo_sk")
     * })
     */
    private $crReturningCdemoSk;

    /**
     * @var CatalogPage
     *
     * @ORM\ManyToOne(targetEntity="CatalogPage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_catalog_page_sk", referencedColumnName="cp_catalog_page_sk")
     * })
     */
    private $crCatalogPageSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_returned_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $crReturnedDateSk;

    /**
     * @var HouseholdDemographics
     *
     * @ORM\ManyToOne(targetEntity="HouseholdDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_refunded_hdemo_sk", referencedColumnName="hd_demo_sk")
     * })
     */
    private $crRefundedHdemoSk;

    /**
     * @var HouseholdDemographics
     *
     * @ORM\ManyToOne(targetEntity="HouseholdDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_returning_hdemo_sk", referencedColumnName="hd_demo_sk")
     * })
     */
    private $crReturningHdemoSk;

    /**
     * @var Item
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_item_sk", referencedColumnName="i_item_sk")
     * })
     */
    private $crItemSk;

    /**
     * @var Reason
     *
     * @ORM\ManyToOne(targetEntity="Reason")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_reason_sk", referencedColumnName="r_reason_sk")
     * })
     */
    private $crReasonSk;

    /**
     * @var ShipMode
     *
     * @ORM\ManyToOne(targetEntity="ShipMode")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_ship_mode_sk", referencedColumnName="sm_ship_mode_sk")
     * })
     */
    private $crShipModeSk;

    /**
     * @var TimeDim
     *
     * @ORM\ManyToOne(targetEntity="TimeDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_returned_time_sk", referencedColumnName="t_time_sk")
     * })
     */
    private $crReturnedTimeSk;

    /**
     * @var Warehouse
     *
     * @ORM\ManyToOne(targetEntity="Warehouse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cr_warehouse_sk", referencedColumnName="w_warehouse_sk")
     * })
     */
    private $crWarehouseSk;

    public function getCrOrderNumber(): ?int
    {
        return $this->crOrderNumber;
    }

    public function getCrReturnQuantity(): ?int
    {
        return $this->crReturnQuantity;
    }

    public function setCrReturnQuantity(?int $crReturnQuantity): self
    {
        $this->crReturnQuantity = $crReturnQuantity;

        return $this;
    }

    public function getCrReturnAmount(): ?string
    {
        return $this->crReturnAmount;
    }

    public function setCrReturnAmount(?string $crReturnAmount): self
    {
        $this->crReturnAmount = $crReturnAmount;

        return $this;
    }

    public function getCrReturnTax(): ?string
    {
        return $this->crReturnTax;
    }

    public function setCrReturnTax(?string $crReturnTax): self
    {
        $this->crReturnTax = $crReturnTax;

        return $this;
    }

    public function getCrReturnAmtIncTax(): ?string
    {
        return $this->crReturnAmtIncTax;
    }

    public function setCrReturnAmtIncTax(?string $crReturnAmtIncTax): self
    {
        $this->crReturnAmtIncTax = $crReturnAmtIncTax;

        return $this;
    }

    public function getCrFee(): ?string
    {
        return $this->crFee;
    }

    public function setCrFee(?string $crFee): self
    {
        $this->crFee = $crFee;

        return $this;
    }

    public function getCrReturnShipCost(): ?string
    {
        return $this->crReturnShipCost;
    }

    public function setCrReturnShipCost(?string $crReturnShipCost): self
    {
        $this->crReturnShipCost = $crReturnShipCost;

        return $this;
    }

    public function getCrRefundedCash(): ?string
    {
        return $this->crRefundedCash;
    }

    public function setCrRefundedCash(?string $crRefundedCash): self
    {
        $this->crRefundedCash = $crRefundedCash;

        return $this;
    }

    public function getCrReversedCharge(): ?string
    {
        return $this->crReversedCharge;
    }

    public function setCrReversedCharge(?string $crReversedCharge): self
    {
        $this->crReversedCharge = $crReversedCharge;

        return $this;
    }

    public function getCrStoreCredit(): ?string
    {
        return $this->crStoreCredit;
    }

    public function setCrStoreCredit(?string $crStoreCredit): self
    {
        $this->crStoreCredit = $crStoreCredit;

        return $this;
    }

    public function getCrNetLoss(): ?string
    {
        return $this->crNetLoss;
    }

    public function setCrNetLoss(?string $crNetLoss): self
    {
        $this->crNetLoss = $crNetLoss;

        return $this;
    }

    public function getCrRefundedAddrSk(): ?CustomerAddress
    {
        return $this->crRefundedAddrSk;
    }

    public function setCrRefundedAddrSk(?CustomerAddress $crRefundedAddrSk): self
    {
        $this->crRefundedAddrSk = $crRefundedAddrSk;

        return $this;
    }

    public function getCrReturningAddrSk(): ?CustomerAddress
    {
        return $this->crReturningAddrSk;
    }

    public function setCrReturningAddrSk(?CustomerAddress $crReturningAddrSk): self
    {
        $this->crReturningAddrSk = $crReturningAddrSk;

        return $this;
    }

    public function getCrRefundedCustomerSk(): ?Customer
    {
        return $this->crRefundedCustomerSk;
    }

    public function setCrRefundedCustomerSk(?Customer $crRefundedCustomerSk): self
    {
        $this->crRefundedCustomerSk = $crRefundedCustomerSk;

        return $this;
    }

    public function getCrReturningCustomerSk(): ?Customer
    {
        return $this->crReturningCustomerSk;
    }

    public function setCrReturningCustomerSk(?Customer $crReturningCustomerSk): self
    {
        $this->crReturningCustomerSk = $crReturningCustomerSk;

        return $this;
    }

    public function getCrCallCenterSk(): ?CallCenter
    {
        return $this->crCallCenterSk;
    }

    public function setCrCallCenterSk(?CallCenter $crCallCenterSk): self
    {
        $this->crCallCenterSk = $crCallCenterSk;

        return $this;
    }

    public function getCrRefundedCdemoSk(): ?CustomerDemographics
    {
        return $this->crRefundedCdemoSk;
    }

    public function setCrRefundedCdemoSk(?CustomerDemographics $crRefundedCdemoSk): self
    {
        $this->crRefundedCdemoSk = $crRefundedCdemoSk;

        return $this;
    }

    public function getCrReturningCdemoSk(): ?CustomerDemographics
    {
        return $this->crReturningCdemoSk;
    }

    public function setCrReturningCdemoSk(?CustomerDemographics $crReturningCdemoSk): self
    {
        $this->crReturningCdemoSk = $crReturningCdemoSk;

        return $this;
    }

    public function getCrCatalogPageSk(): ?CatalogPage
    {
        return $this->crCatalogPageSk;
    }

    public function setCrCatalogPageSk(?CatalogPage $crCatalogPageSk): self
    {
        $this->crCatalogPageSk = $crCatalogPageSk;

        return $this;
    }

    public function getCrReturnedDateSk(): ?DateDim
    {
        return $this->crReturnedDateSk;
    }

    public function setCrReturnedDateSk(?DateDim $crReturnedDateSk): self
    {
        $this->crReturnedDateSk = $crReturnedDateSk;

        return $this;
    }

    public function getCrRefundedHdemoSk(): ?HouseholdDemographics
    {
        return $this->crRefundedHdemoSk;
    }

    public function setCrRefundedHdemoSk(?HouseholdDemographics $crRefundedHdemoSk): self
    {
        $this->crRefundedHdemoSk = $crRefundedHdemoSk;

        return $this;
    }

    public function getCrReturningHdemoSk(): ?HouseholdDemographics
    {
        return $this->crReturningHdemoSk;
    }

    public function setCrReturningHdemoSk(?HouseholdDemographics $crReturningHdemoSk): self
    {
        $this->crReturningHdemoSk = $crReturningHdemoSk;

        return $this;
    }

    public function getCrItemSk(): ?Item
    {
        return $this->crItemSk;
    }

    public function setCrItemSk(?Item $crItemSk): self
    {
        $this->crItemSk = $crItemSk;

        return $this;
    }

    public function getCrReasonSk(): ?Reason
    {
        return $this->crReasonSk;
    }

    public function setCrReasonSk(?Reason $crReasonSk): self
    {
        $this->crReasonSk = $crReasonSk;

        return $this;
    }

    public function getCrShipModeSk(): ?ShipMode
    {
        return $this->crShipModeSk;
    }

    public function setCrShipModeSk(?ShipMode $crShipModeSk): self
    {
        $this->crShipModeSk = $crShipModeSk;

        return $this;
    }

    public function getCrReturnedTimeSk(): ?TimeDim
    {
        return $this->crReturnedTimeSk;
    }

    public function setCrReturnedTimeSk(?TimeDim $crReturnedTimeSk): self
    {
        $this->crReturnedTimeSk = $crReturnedTimeSk;

        return $this;
    }

    public function getCrWarehouseSk(): ?Warehouse
    {
        return $this->crWarehouseSk;
    }

    public function setCrWarehouseSk(?Warehouse $crWarehouseSk): self
    {
        $this->crWarehouseSk = $crWarehouseSk;

        return $this;
    }


}
