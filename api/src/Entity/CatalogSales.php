<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * CatalogSales
 * @ApiResource()
 * @ORM\Table(name="catalog_sales", indexes={@ORM\Index(name="cs_t", columns={"cs_sold_time_sk"}), @ORM\Index(name="cs_s_cd", columns={"cs_ship_cdemo_sk"}), @ORM\Index(name="cs_p", columns={"cs_promo_sk"}), @ORM\Index(name="cs_d2", columns={"cs_sold_date_sk"}), @ORM\Index(name="cs_b_hd", columns={"cs_bill_hdemo_sk"}), @ORM\Index(name="cs_w", columns={"cs_warehouse_sk"}), @ORM\Index(name="cs_b_cd", columns={"cs_bill_cdemo_sk"}), @ORM\Index(name="cs_b_c", columns={"cs_bill_customer_sk"}), @ORM\Index(name="cs_sm", columns={"cs_ship_mode_sk"}), @ORM\Index(name="cs_s_c", columns={"cs_ship_customer_sk"}), @ORM\Index(name="cs_cp", columns={"cs_catalog_page_sk"}), @ORM\Index(name="cs_cc", columns={"cs_call_center_sk"}), @ORM\Index(name="cs_s_a", columns={"cs_ship_addr_sk"}), @ORM\Index(name="cs_s_hd", columns={"cs_ship_hdemo_sk"}), @ORM\Index(name="cs_b_a", columns={"cs_bill_addr_sk"}), @ORM\Index(name="cs_d1", columns={"cs_ship_date_sk"}), @ORM\Index(name="IDX_D29211FD33E3A315", columns={"cs_item_sk"})})
 * @ORM\Entity
 */
class CatalogSales
{
    /**
     * @var int
     *
     * @ORM\Column(name="cs_order_number", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $csOrderNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cs_quantity", type="integer", nullable=true)
     */
    private $csQuantity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_wholesale_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csWholesaleCost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_list_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csListPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_sales_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csSalesPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_ext_discount_amt", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csExtDiscountAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_ext_sales_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csExtSalesPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_ext_wholesale_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csExtWholesaleCost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_ext_list_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csExtListPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_ext_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csExtTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_coupon_amt", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csCouponAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_ext_ship_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csExtShipCost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_net_paid", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csNetPaid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_net_paid_inc_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csNetPaidIncTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_net_paid_inc_ship", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csNetPaidIncShip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_net_paid_inc_ship_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csNetPaidIncShipTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cs_net_profit", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $csNetProfit;

    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="CustomerAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_bill_addr_sk", referencedColumnName="ca_address_sk")
     * })
     */
    private $csBillAddrSk;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_bill_customer_sk", referencedColumnName="c_customer_sk")
     * })
     */
    private $csBillCustomerSk;

    /**
     * @var CustomerDemographics
     *
     * @ORM\ManyToOne(targetEntity="CustomerDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_bill_cdemo_sk", referencedColumnName="cd_demo_sk")
     * })
     */
    private $csBillCdemoSk;

    /**
     * @var HouseholdDemographics
     *
     * @ORM\ManyToOne(targetEntity="HouseholdDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_bill_hdemo_sk", referencedColumnName="hd_demo_sk")
     * })
     */
    private $csBillHdemoSk;

    /**
     * @var CallCenter
     *
     * @ORM\ManyToOne(targetEntity="CallCenter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_call_center_sk", referencedColumnName="cc_call_center_sk")
     * })
     */
    private $csCallCenterSk;

    /**
     * @var CatalogPage
     *
     * @ORM\ManyToOne(targetEntity="CatalogPage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_catalog_page_sk", referencedColumnName="cp_catalog_page_sk")
     * })
     */
    private $csCatalogPageSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_ship_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $csShipDateSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_sold_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $csSoldDateSk;

    /**
     * @var Item
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_item_sk", referencedColumnName="i_item_sk")
     * })
     */
    private $csItemSk;

    /**
     * @var Promotion
     *
     * @ORM\ManyToOne(targetEntity="Promotion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_promo_sk", referencedColumnName="p_promo_sk")
     * })
     */
    private $csPromoSk;

    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="CustomerAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_ship_addr_sk", referencedColumnName="ca_address_sk")
     * })
     */
    private $csShipAddrSk;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_ship_customer_sk", referencedColumnName="c_customer_sk")
     * })
     */
    private $csShipCustomerSk;

    /**
     * @var CustomerDemographics
     *
     * @ORM\ManyToOne(targetEntity="CustomerDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_ship_cdemo_sk", referencedColumnName="cd_demo_sk")
     * })
     */
    private $csShipCdemoSk;

    /**
     * @var HouseholdDemographics
     *
     * @ORM\ManyToOne(targetEntity="HouseholdDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_ship_hdemo_sk", referencedColumnName="hd_demo_sk")
     * })
     */
    private $csShipHdemoSk;

    /**
     * @var ShipMode
     *
     * @ORM\ManyToOne(targetEntity="ShipMode")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_ship_mode_sk", referencedColumnName="sm_ship_mode_sk")
     * })
     */
    private $csShipModeSk;

    /**
     * @var TimeDim
     *
     * @ORM\ManyToOne(targetEntity="TimeDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_sold_time_sk", referencedColumnName="t_time_sk")
     * })
     */
    private $csSoldTimeSk;

    /**
     * @var Warehouse
     *
     * @ORM\ManyToOne(targetEntity="Warehouse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cs_warehouse_sk", referencedColumnName="w_warehouse_sk")
     * })
     */
    private $csWarehouseSk;

    public function getCsOrderNumber(): ?int
    {
        return $this->csOrderNumber;
    }

    public function getCsQuantity(): ?int
    {
        return $this->csQuantity;
    }

    public function setCsQuantity(?int $csQuantity): self
    {
        $this->csQuantity = $csQuantity;

        return $this;
    }

    public function getCsWholesaleCost(): ?string
    {
        return $this->csWholesaleCost;
    }

    public function setCsWholesaleCost(?string $csWholesaleCost): self
    {
        $this->csWholesaleCost = $csWholesaleCost;

        return $this;
    }

    public function getCsListPrice(): ?string
    {
        return $this->csListPrice;
    }

    public function setCsListPrice(?string $csListPrice): self
    {
        $this->csListPrice = $csListPrice;

        return $this;
    }

    public function getCsSalesPrice(): ?string
    {
        return $this->csSalesPrice;
    }

    public function setCsSalesPrice(?string $csSalesPrice): self
    {
        $this->csSalesPrice = $csSalesPrice;

        return $this;
    }

    public function getCsExtDiscountAmt(): ?string
    {
        return $this->csExtDiscountAmt;
    }

    public function setCsExtDiscountAmt(?string $csExtDiscountAmt): self
    {
        $this->csExtDiscountAmt = $csExtDiscountAmt;

        return $this;
    }

    public function getCsExtSalesPrice(): ?string
    {
        return $this->csExtSalesPrice;
    }

    public function setCsExtSalesPrice(?string $csExtSalesPrice): self
    {
        $this->csExtSalesPrice = $csExtSalesPrice;

        return $this;
    }

    public function getCsExtWholesaleCost(): ?string
    {
        return $this->csExtWholesaleCost;
    }

    public function setCsExtWholesaleCost(?string $csExtWholesaleCost): self
    {
        $this->csExtWholesaleCost = $csExtWholesaleCost;

        return $this;
    }

    public function getCsExtListPrice(): ?string
    {
        return $this->csExtListPrice;
    }

    public function setCsExtListPrice(?string $csExtListPrice): self
    {
        $this->csExtListPrice = $csExtListPrice;

        return $this;
    }

    public function getCsExtTax(): ?string
    {
        return $this->csExtTax;
    }

    public function setCsExtTax(?string $csExtTax): self
    {
        $this->csExtTax = $csExtTax;

        return $this;
    }

    public function getCsCouponAmt(): ?string
    {
        return $this->csCouponAmt;
    }

    public function setCsCouponAmt(?string $csCouponAmt): self
    {
        $this->csCouponAmt = $csCouponAmt;

        return $this;
    }

    public function getCsExtShipCost(): ?string
    {
        return $this->csExtShipCost;
    }

    public function setCsExtShipCost(?string $csExtShipCost): self
    {
        $this->csExtShipCost = $csExtShipCost;

        return $this;
    }

    public function getCsNetPaid(): ?string
    {
        return $this->csNetPaid;
    }

    public function setCsNetPaid(?string $csNetPaid): self
    {
        $this->csNetPaid = $csNetPaid;

        return $this;
    }

    public function getCsNetPaidIncTax(): ?string
    {
        return $this->csNetPaidIncTax;
    }

    public function setCsNetPaidIncTax(?string $csNetPaidIncTax): self
    {
        $this->csNetPaidIncTax = $csNetPaidIncTax;

        return $this;
    }

    public function getCsNetPaidIncShip(): ?string
    {
        return $this->csNetPaidIncShip;
    }

    public function setCsNetPaidIncShip(?string $csNetPaidIncShip): self
    {
        $this->csNetPaidIncShip = $csNetPaidIncShip;

        return $this;
    }

    public function getCsNetPaidIncShipTax(): ?string
    {
        return $this->csNetPaidIncShipTax;
    }

    public function setCsNetPaidIncShipTax(?string $csNetPaidIncShipTax): self
    {
        $this->csNetPaidIncShipTax = $csNetPaidIncShipTax;

        return $this;
    }

    public function getCsNetProfit(): ?string
    {
        return $this->csNetProfit;
    }

    public function setCsNetProfit(?string $csNetProfit): self
    {
        $this->csNetProfit = $csNetProfit;

        return $this;
    }

    public function getCsBillAddrSk(): ?CustomerAddress
    {
        return $this->csBillAddrSk;
    }

    public function setCsBillAddrSk(?CustomerAddress $csBillAddrSk): self
    {
        $this->csBillAddrSk = $csBillAddrSk;

        return $this;
    }

    public function getCsBillCustomerSk(): ?Customer
    {
        return $this->csBillCustomerSk;
    }

    public function setCsBillCustomerSk(?Customer $csBillCustomerSk): self
    {
        $this->csBillCustomerSk = $csBillCustomerSk;

        return $this;
    }

    public function getCsBillCdemoSk(): ?CustomerDemographics
    {
        return $this->csBillCdemoSk;
    }

    public function setCsBillCdemoSk(?CustomerDemographics $csBillCdemoSk): self
    {
        $this->csBillCdemoSk = $csBillCdemoSk;

        return $this;
    }

    public function getCsBillHdemoSk(): ?HouseholdDemographics
    {
        return $this->csBillHdemoSk;
    }

    public function setCsBillHdemoSk(?HouseholdDemographics $csBillHdemoSk): self
    {
        $this->csBillHdemoSk = $csBillHdemoSk;

        return $this;
    }

    public function getCsCallCenterSk(): ?CallCenter
    {
        return $this->csCallCenterSk;
    }

    public function setCsCallCenterSk(?CallCenter $csCallCenterSk): self
    {
        $this->csCallCenterSk = $csCallCenterSk;

        return $this;
    }

    public function getCsCatalogPageSk(): ?CatalogPage
    {
        return $this->csCatalogPageSk;
    }

    public function setCsCatalogPageSk(?CatalogPage $csCatalogPageSk): self
    {
        $this->csCatalogPageSk = $csCatalogPageSk;

        return $this;
    }

    public function getCsShipDateSk(): ?DateDim
    {
        return $this->csShipDateSk;
    }

    public function setCsShipDateSk(?DateDim $csShipDateSk): self
    {
        $this->csShipDateSk = $csShipDateSk;

        return $this;
    }

    public function getCsSoldDateSk(): ?DateDim
    {
        return $this->csSoldDateSk;
    }

    public function setCsSoldDateSk(?DateDim $csSoldDateSk): self
    {
        $this->csSoldDateSk = $csSoldDateSk;

        return $this;
    }

    public function getCsItemSk(): ?Item
    {
        return $this->csItemSk;
    }

    public function setCsItemSk(?Item $csItemSk): self
    {
        $this->csItemSk = $csItemSk;

        return $this;
    }

    public function getCsPromoSk(): ?Promotion
    {
        return $this->csPromoSk;
    }

    public function setCsPromoSk(?Promotion $csPromoSk): self
    {
        $this->csPromoSk = $csPromoSk;

        return $this;
    }

    public function getCsShipAddrSk(): ?CustomerAddress
    {
        return $this->csShipAddrSk;
    }

    public function setCsShipAddrSk(?CustomerAddress $csShipAddrSk): self
    {
        $this->csShipAddrSk = $csShipAddrSk;

        return $this;
    }

    public function getCsShipCustomerSk(): ?Customer
    {
        return $this->csShipCustomerSk;
    }

    public function setCsShipCustomerSk(?Customer $csShipCustomerSk): self
    {
        $this->csShipCustomerSk = $csShipCustomerSk;

        return $this;
    }

    public function getCsShipCdemoSk(): ?CustomerDemographics
    {
        return $this->csShipCdemoSk;
    }

    public function setCsShipCdemoSk(?CustomerDemographics $csShipCdemoSk): self
    {
        $this->csShipCdemoSk = $csShipCdemoSk;

        return $this;
    }

    public function getCsShipHdemoSk(): ?HouseholdDemographics
    {
        return $this->csShipHdemoSk;
    }

    public function setCsShipHdemoSk(?HouseholdDemographics $csShipHdemoSk): self
    {
        $this->csShipHdemoSk = $csShipHdemoSk;

        return $this;
    }

    public function getCsShipModeSk(): ?ShipMode
    {
        return $this->csShipModeSk;
    }

    public function setCsShipModeSk(?ShipMode $csShipModeSk): self
    {
        $this->csShipModeSk = $csShipModeSk;

        return $this;
    }

    public function getCsSoldTimeSk(): ?TimeDim
    {
        return $this->csSoldTimeSk;
    }

    public function setCsSoldTimeSk(?TimeDim $csSoldTimeSk): self
    {
        $this->csSoldTimeSk = $csSoldTimeSk;

        return $this;
    }

    public function getCsWarehouseSk(): ?Warehouse
    {
        return $this->csWarehouseSk;
    }

    public function setCsWarehouseSk(?Warehouse $csWarehouseSk): self
    {
        $this->csWarehouseSk = $csWarehouseSk;

        return $this;
    }


}
