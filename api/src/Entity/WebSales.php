<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * WebSales
 * @ApiResource()
 * @ORM\Table(name="web_sales", indexes={@ORM\Index(name="ws_p", columns={"ws_promo_sk"}), @ORM\Index(name="ws_b_cd", columns={"ws_bill_cdemo_sk"}), @ORM\Index(name="ws_b_c", columns={"ws_bill_customer_sk"}), @ORM\Index(name="ws_t", columns={"ws_sold_time_sk"}), @ORM\Index(name="ws_ws", columns={"ws_web_site_sk"}), @ORM\Index(name="ws_s_hd", columns={"ws_ship_hdemo_sk"}), @ORM\Index(name="ws_s_a", columns={"ws_ship_addr_sk"}), @ORM\Index(name="ws_b_hd", columns={"ws_bill_hdemo_sk"}), @ORM\Index(name="ws_s_cd", columns={"ws_ship_cdemo_sk"}), @ORM\Index(name="ws_wp", columns={"ws_web_page_sk"}), @ORM\Index(name="ws_s_d", columns={"ws_ship_date_sk"}), @ORM\Index(name="ws_w2", columns={"ws_warehouse_sk"}), @ORM\Index(name="ws_s_c", columns={"ws_ship_customer_sk"}), @ORM\Index(name="ws_sm", columns={"ws_ship_mode_sk"}), @ORM\Index(name="ws_b_a", columns={"ws_bill_addr_sk"}), @ORM\Index(name="ws_d2", columns={"ws_sold_date_sk"}), @ORM\Index(name="IDX_A69274DA1DA68287", columns={"ws_item_sk"})})
 * @ORM\Entity
 */
class WebSales
{
    /**
     * @var int
     *
     * @ORM\Column(name="ws_order_number", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $wsOrderNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ws_quantity", type="integer", nullable=true)
     */
    private $wsQuantity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_wholesale_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsWholesaleCost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_list_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsListPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_sales_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsSalesPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_ext_discount_amt", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsExtDiscountAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_ext_sales_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsExtSalesPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_ext_wholesale_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsExtWholesaleCost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_ext_list_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsExtListPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_ext_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsExtTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_coupon_amt", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsCouponAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_ext_ship_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsExtShipCost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_net_paid", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsNetPaid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_net_paid_inc_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsNetPaidIncTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_net_paid_inc_ship", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsNetPaidIncShip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_net_paid_inc_ship_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsNetPaidIncShipTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ws_net_profit", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $wsNetProfit;

    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="CustomerAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_bill_addr_sk", referencedColumnName="ca_address_sk")
     * })
     */
    private $wsBillAddrSk;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_bill_customer_sk", referencedColumnName="c_customer_sk")
     * })
     */
    private $wsBillCustomerSk;

    /**
     * @var CustomerDemographics
     *
     * @ORM\ManyToOne(targetEntity="CustomerDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_bill_cdemo_sk", referencedColumnName="cd_demo_sk")
     * })
     */
    private $wsBillCdemoSk;

    /**
     * @var HouseholdDemographics
     *
     * @ORM\ManyToOne(targetEntity="HouseholdDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_bill_hdemo_sk", referencedColumnName="hd_demo_sk")
     * })
     */
    private $wsBillHdemoSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_sold_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $wsSoldDateSk;

    /**
     * @var Item
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_item_sk", referencedColumnName="i_item_sk")
     * })
     */
    private $wsItemSk;

    /**
     * @var Promotion
     *
     * @ORM\ManyToOne(targetEntity="Promotion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_promo_sk", referencedColumnName="p_promo_sk")
     * })
     */
    private $wsPromoSk;

    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="CustomerAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_ship_addr_sk", referencedColumnName="ca_address_sk")
     * })
     */
    private $wsShipAddrSk;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_ship_customer_sk", referencedColumnName="c_customer_sk")
     * })
     */
    private $wsShipCustomerSk;

    /**
     * @var CustomerDemographics
     *
     * @ORM\ManyToOne(targetEntity="CustomerDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_ship_cdemo_sk", referencedColumnName="cd_demo_sk")
     * })
     */
    private $wsShipCdemoSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_ship_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $wsShipDateSk;

    /**
     * @var HouseholdDemographics
     *
     * @ORM\ManyToOne(targetEntity="HouseholdDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_ship_hdemo_sk", referencedColumnName="hd_demo_sk")
     * })
     */
    private $wsShipHdemoSk;

    /**
     * @var ShipMode
     *
     * @ORM\ManyToOne(targetEntity="ShipMode")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_ship_mode_sk", referencedColumnName="sm_ship_mode_sk")
     * })
     */
    private $wsShipModeSk;

    /**
     * @var TimeDim
     *
     * @ORM\ManyToOne(targetEntity="TimeDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_sold_time_sk", referencedColumnName="t_time_sk")
     * })
     */
    private $wsSoldTimeSk;

    /**
     * @var Warehouse
     *
     * @ORM\ManyToOne(targetEntity="Warehouse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_warehouse_sk", referencedColumnName="w_warehouse_sk")
     * })
     */
    private $wsWarehouseSk;

    /**
     * @var WebPage
     *
     * @ORM\ManyToOne(targetEntity="WebPage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_web_page_sk", referencedColumnName="wp_web_page_sk")
     * })
     */
    private $wsWebPageSk;

    /**
     * @var WebSite
     *
     * @ORM\ManyToOne(targetEntity="WebSite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ws_web_site_sk", referencedColumnName="web_site_sk")
     * })
     */
    private $wsWebSiteSk;

    public function getWsOrderNumber(): ?int
    {
        return $this->wsOrderNumber;
    }

    public function getWsQuantity(): ?int
    {
        return $this->wsQuantity;
    }

    public function setWsQuantity(?int $wsQuantity): self
    {
        $this->wsQuantity = $wsQuantity;

        return $this;
    }

    public function getWsWholesaleCost(): ?string
    {
        return $this->wsWholesaleCost;
    }

    public function setWsWholesaleCost(?string $wsWholesaleCost): self
    {
        $this->wsWholesaleCost = $wsWholesaleCost;

        return $this;
    }

    public function getWsListPrice(): ?string
    {
        return $this->wsListPrice;
    }

    public function setWsListPrice(?string $wsListPrice): self
    {
        $this->wsListPrice = $wsListPrice;

        return $this;
    }

    public function getWsSalesPrice(): ?string
    {
        return $this->wsSalesPrice;
    }

    public function setWsSalesPrice(?string $wsSalesPrice): self
    {
        $this->wsSalesPrice = $wsSalesPrice;

        return $this;
    }

    public function getWsExtDiscountAmt(): ?string
    {
        return $this->wsExtDiscountAmt;
    }

    public function setWsExtDiscountAmt(?string $wsExtDiscountAmt): self
    {
        $this->wsExtDiscountAmt = $wsExtDiscountAmt;

        return $this;
    }

    public function getWsExtSalesPrice(): ?string
    {
        return $this->wsExtSalesPrice;
    }

    public function setWsExtSalesPrice(?string $wsExtSalesPrice): self
    {
        $this->wsExtSalesPrice = $wsExtSalesPrice;

        return $this;
    }

    public function getWsExtWholesaleCost(): ?string
    {
        return $this->wsExtWholesaleCost;
    }

    public function setWsExtWholesaleCost(?string $wsExtWholesaleCost): self
    {
        $this->wsExtWholesaleCost = $wsExtWholesaleCost;

        return $this;
    }

    public function getWsExtListPrice(): ?string
    {
        return $this->wsExtListPrice;
    }

    public function setWsExtListPrice(?string $wsExtListPrice): self
    {
        $this->wsExtListPrice = $wsExtListPrice;

        return $this;
    }

    public function getWsExtTax(): ?string
    {
        return $this->wsExtTax;
    }

    public function setWsExtTax(?string $wsExtTax): self
    {
        $this->wsExtTax = $wsExtTax;

        return $this;
    }

    public function getWsCouponAmt(): ?string
    {
        return $this->wsCouponAmt;
    }

    public function setWsCouponAmt(?string $wsCouponAmt): self
    {
        $this->wsCouponAmt = $wsCouponAmt;

        return $this;
    }

    public function getWsExtShipCost(): ?string
    {
        return $this->wsExtShipCost;
    }

    public function setWsExtShipCost(?string $wsExtShipCost): self
    {
        $this->wsExtShipCost = $wsExtShipCost;

        return $this;
    }

    public function getWsNetPaid(): ?string
    {
        return $this->wsNetPaid;
    }

    public function setWsNetPaid(?string $wsNetPaid): self
    {
        $this->wsNetPaid = $wsNetPaid;

        return $this;
    }

    public function getWsNetPaidIncTax(): ?string
    {
        return $this->wsNetPaidIncTax;
    }

    public function setWsNetPaidIncTax(?string $wsNetPaidIncTax): self
    {
        $this->wsNetPaidIncTax = $wsNetPaidIncTax;

        return $this;
    }

    public function getWsNetPaidIncShip(): ?string
    {
        return $this->wsNetPaidIncShip;
    }

    public function setWsNetPaidIncShip(?string $wsNetPaidIncShip): self
    {
        $this->wsNetPaidIncShip = $wsNetPaidIncShip;

        return $this;
    }

    public function getWsNetPaidIncShipTax(): ?string
    {
        return $this->wsNetPaidIncShipTax;
    }

    public function setWsNetPaidIncShipTax(?string $wsNetPaidIncShipTax): self
    {
        $this->wsNetPaidIncShipTax = $wsNetPaidIncShipTax;

        return $this;
    }

    public function getWsNetProfit(): ?string
    {
        return $this->wsNetProfit;
    }

    public function setWsNetProfit(?string $wsNetProfit): self
    {
        $this->wsNetProfit = $wsNetProfit;

        return $this;
    }

    public function getWsBillAddrSk(): ?CustomerAddress
    {
        return $this->wsBillAddrSk;
    }

    public function setWsBillAddrSk(?CustomerAddress $wsBillAddrSk): self
    {
        $this->wsBillAddrSk = $wsBillAddrSk;

        return $this;
    }

    public function getWsBillCustomerSk(): ?Customer
    {
        return $this->wsBillCustomerSk;
    }

    public function setWsBillCustomerSk(?Customer $wsBillCustomerSk): self
    {
        $this->wsBillCustomerSk = $wsBillCustomerSk;

        return $this;
    }

    public function getWsBillCdemoSk(): ?CustomerDemographics
    {
        return $this->wsBillCdemoSk;
    }

    public function setWsBillCdemoSk(?CustomerDemographics $wsBillCdemoSk): self
    {
        $this->wsBillCdemoSk = $wsBillCdemoSk;

        return $this;
    }

    public function getWsBillHdemoSk(): ?HouseholdDemographics
    {
        return $this->wsBillHdemoSk;
    }

    public function setWsBillHdemoSk(?HouseholdDemographics $wsBillHdemoSk): self
    {
        $this->wsBillHdemoSk = $wsBillHdemoSk;

        return $this;
    }

    public function getWsSoldDateSk(): ?DateDim
    {
        return $this->wsSoldDateSk;
    }

    public function setWsSoldDateSk(?DateDim $wsSoldDateSk): self
    {
        $this->wsSoldDateSk = $wsSoldDateSk;

        return $this;
    }

    public function getWsItemSk(): ?Item
    {
        return $this->wsItemSk;
    }

    public function setWsItemSk(?Item $wsItemSk): self
    {
        $this->wsItemSk = $wsItemSk;

        return $this;
    }

    public function getWsPromoSk(): ?Promotion
    {
        return $this->wsPromoSk;
    }

    public function setWsPromoSk(?Promotion $wsPromoSk): self
    {
        $this->wsPromoSk = $wsPromoSk;

        return $this;
    }

    public function getWsShipAddrSk(): ?CustomerAddress
    {
        return $this->wsShipAddrSk;
    }

    public function setWsShipAddrSk(?CustomerAddress $wsShipAddrSk): self
    {
        $this->wsShipAddrSk = $wsShipAddrSk;

        return $this;
    }

    public function getWsShipCustomerSk(): ?Customer
    {
        return $this->wsShipCustomerSk;
    }

    public function setWsShipCustomerSk(?Customer $wsShipCustomerSk): self
    {
        $this->wsShipCustomerSk = $wsShipCustomerSk;

        return $this;
    }

    public function getWsShipCdemoSk(): ?CustomerDemographics
    {
        return $this->wsShipCdemoSk;
    }

    public function setWsShipCdemoSk(?CustomerDemographics $wsShipCdemoSk): self
    {
        $this->wsShipCdemoSk = $wsShipCdemoSk;

        return $this;
    }

    public function getWsShipDateSk(): ?DateDim
    {
        return $this->wsShipDateSk;
    }

    public function setWsShipDateSk(?DateDim $wsShipDateSk): self
    {
        $this->wsShipDateSk = $wsShipDateSk;

        return $this;
    }

    public function getWsShipHdemoSk(): ?HouseholdDemographics
    {
        return $this->wsShipHdemoSk;
    }

    public function setWsShipHdemoSk(?HouseholdDemographics $wsShipHdemoSk): self
    {
        $this->wsShipHdemoSk = $wsShipHdemoSk;

        return $this;
    }

    public function getWsShipModeSk(): ?ShipMode
    {
        return $this->wsShipModeSk;
    }

    public function setWsShipModeSk(?ShipMode $wsShipModeSk): self
    {
        $this->wsShipModeSk = $wsShipModeSk;

        return $this;
    }

    public function getWsSoldTimeSk(): ?TimeDim
    {
        return $this->wsSoldTimeSk;
    }

    public function setWsSoldTimeSk(?TimeDim $wsSoldTimeSk): self
    {
        $this->wsSoldTimeSk = $wsSoldTimeSk;

        return $this;
    }

    public function getWsWarehouseSk(): ?Warehouse
    {
        return $this->wsWarehouseSk;
    }

    public function setWsWarehouseSk(?Warehouse $wsWarehouseSk): self
    {
        $this->wsWarehouseSk = $wsWarehouseSk;

        return $this;
    }

    public function getWsWebPageSk(): ?WebPage
    {
        return $this->wsWebPageSk;
    }

    public function setWsWebPageSk(?WebPage $wsWebPageSk): self
    {
        $this->wsWebPageSk = $wsWebPageSk;

        return $this;
    }

    public function getWsWebSiteSk(): ?WebSite
    {
        return $this->wsWebSiteSk;
    }

    public function setWsWebSiteSk(?WebSite $wsWebSiteSk): self
    {
        $this->wsWebSiteSk = $wsWebSiteSk;

        return $this;
    }


}
