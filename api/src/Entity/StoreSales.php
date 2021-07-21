<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * StoreSales
 * @ApiResource()
 * @ORM\Table(name="store_sales", indexes={@ORM\Index(name="ss_d", columns={"ss_sold_date_sk"}), @ORM\Index(name="ss_s", columns={"ss_store_sk"}), @ORM\Index(name="ss_c", columns={"ss_customer_sk"}), @ORM\Index(name="ss_t", columns={"ss_sold_time_sk"}), @ORM\Index(name="ss_cd", columns={"ss_cdemo_sk"}), @ORM\Index(name="ss_p", columns={"ss_promo_sk"}), @ORM\Index(name="ss_hd", columns={"ss_hdemo_sk"}), @ORM\Index(name="ss_a", columns={"ss_addr_sk"}), @ORM\Index(name="IDX_17BF265D144D22FD", columns={"ss_item_sk"})})
 * @ORM\Entity
 */
class StoreSales
{
    /**
     * @var int
     *
     * @ORM\Column(name="ss_ticket_number", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ssTicketNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ss_quantity", type="integer", nullable=true)
     */
    private $ssQuantity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_wholesale_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssWholesaleCost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_list_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssListPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_sales_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssSalesPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_ext_discount_amt", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssExtDiscountAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_ext_sales_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssExtSalesPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_ext_wholesale_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssExtWholesaleCost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_ext_list_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssExtListPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_ext_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssExtTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_coupon_amt", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssCouponAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_net_paid", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssNetPaid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_net_paid_inc_tax", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssNetPaidIncTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ss_net_profit", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $ssNetProfit;

    /**
     * @var CustomerAddress
     *
     * @ORM\ManyToOne(targetEntity="CustomerAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ss_addr_sk", referencedColumnName="ca_address_sk")
     * })
     */
    private $ssAddrSk;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ss_customer_sk", referencedColumnName="c_customer_sk")
     * })
     */
    private $ssCustomerSk;

    /**
     * @var CustomerDemographics
     *
     * @ORM\ManyToOne(targetEntity="CustomerDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ss_cdemo_sk", referencedColumnName="cd_demo_sk")
     * })
     */
    private $ssCdemoSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ss_sold_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $ssSoldDateSk;

    /**
     * @var HouseholdDemographics
     *
     * @ORM\ManyToOne(targetEntity="HouseholdDemographics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ss_hdemo_sk", referencedColumnName="hd_demo_sk")
     * })
     */
    private $ssHdemoSk;

    /**
     * @var Item
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ss_item_sk", referencedColumnName="i_item_sk")
     * })
     */
    private $ssItemSk;

    /**
     * @var Promotion
     *
     * @ORM\ManyToOne(targetEntity="Promotion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ss_promo_sk", referencedColumnName="p_promo_sk")
     * })
     */
    private $ssPromoSk;

    /**
     * @var Store
     *
     * @ORM\ManyToOne(targetEntity="Store")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ss_store_sk", referencedColumnName="s_store_sk")
     * })
     */
    private $ssStoreSk;

    /**
     * @var TimeDim
     *
     * @ORM\ManyToOne(targetEntity="TimeDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ss_sold_time_sk", referencedColumnName="t_time_sk")
     * })
     */
    private $ssSoldTimeSk;

    public function getSsTicketNumber(): ?int
    {
        return $this->ssTicketNumber;
    }

    public function getSsQuantity(): ?int
    {
        return $this->ssQuantity;
    }

    public function setSsQuantity(?int $ssQuantity): self
    {
        $this->ssQuantity = $ssQuantity;

        return $this;
    }

    public function getSsWholesaleCost(): ?string
    {
        return $this->ssWholesaleCost;
    }

    public function setSsWholesaleCost(?string $ssWholesaleCost): self
    {
        $this->ssWholesaleCost = $ssWholesaleCost;

        return $this;
    }

    public function getSsListPrice(): ?string
    {
        return $this->ssListPrice;
    }

    public function setSsListPrice(?string $ssListPrice): self
    {
        $this->ssListPrice = $ssListPrice;

        return $this;
    }

    public function getSsSalesPrice(): ?string
    {
        return $this->ssSalesPrice;
    }

    public function setSsSalesPrice(?string $ssSalesPrice): self
    {
        $this->ssSalesPrice = $ssSalesPrice;

        return $this;
    }

    public function getSsExtDiscountAmt(): ?string
    {
        return $this->ssExtDiscountAmt;
    }

    public function setSsExtDiscountAmt(?string $ssExtDiscountAmt): self
    {
        $this->ssExtDiscountAmt = $ssExtDiscountAmt;

        return $this;
    }

    public function getSsExtSalesPrice(): ?string
    {
        return $this->ssExtSalesPrice;
    }

    public function setSsExtSalesPrice(?string $ssExtSalesPrice): self
    {
        $this->ssExtSalesPrice = $ssExtSalesPrice;

        return $this;
    }

    public function getSsExtWholesaleCost(): ?string
    {
        return $this->ssExtWholesaleCost;
    }

    public function setSsExtWholesaleCost(?string $ssExtWholesaleCost): self
    {
        $this->ssExtWholesaleCost = $ssExtWholesaleCost;

        return $this;
    }

    public function getSsExtListPrice(): ?string
    {
        return $this->ssExtListPrice;
    }

    public function setSsExtListPrice(?string $ssExtListPrice): self
    {
        $this->ssExtListPrice = $ssExtListPrice;

        return $this;
    }

    public function getSsExtTax(): ?string
    {
        return $this->ssExtTax;
    }

    public function setSsExtTax(?string $ssExtTax): self
    {
        $this->ssExtTax = $ssExtTax;

        return $this;
    }

    public function getSsCouponAmt(): ?string
    {
        return $this->ssCouponAmt;
    }

    public function setSsCouponAmt(?string $ssCouponAmt): self
    {
        $this->ssCouponAmt = $ssCouponAmt;

        return $this;
    }

    public function getSsNetPaid(): ?string
    {
        return $this->ssNetPaid;
    }

    public function setSsNetPaid(?string $ssNetPaid): self
    {
        $this->ssNetPaid = $ssNetPaid;

        return $this;
    }

    public function getSsNetPaidIncTax(): ?string
    {
        return $this->ssNetPaidIncTax;
    }

    public function setSsNetPaidIncTax(?string $ssNetPaidIncTax): self
    {
        $this->ssNetPaidIncTax = $ssNetPaidIncTax;

        return $this;
    }

    public function getSsNetProfit(): ?string
    {
        return $this->ssNetProfit;
    }

    public function setSsNetProfit(?string $ssNetProfit): self
    {
        $this->ssNetProfit = $ssNetProfit;

        return $this;
    }

    public function getSsAddrSk(): ?CustomerAddress
    {
        return $this->ssAddrSk;
    }

    public function setSsAddrSk(?CustomerAddress $ssAddrSk): self
    {
        $this->ssAddrSk = $ssAddrSk;

        return $this;
    }

    public function getSsCustomerSk(): ?Customer
    {
        return $this->ssCustomerSk;
    }

    public function setSsCustomerSk(?Customer $ssCustomerSk): self
    {
        $this->ssCustomerSk = $ssCustomerSk;

        return $this;
    }

    public function getSsCdemoSk(): ?CustomerDemographics
    {
        return $this->ssCdemoSk;
    }

    public function setSsCdemoSk(?CustomerDemographics $ssCdemoSk): self
    {
        $this->ssCdemoSk = $ssCdemoSk;

        return $this;
    }

    public function getSsSoldDateSk(): ?DateDim
    {
        return $this->ssSoldDateSk;
    }

    public function setSsSoldDateSk(?DateDim $ssSoldDateSk): self
    {
        $this->ssSoldDateSk = $ssSoldDateSk;

        return $this;
    }

    public function getSsHdemoSk(): ?HouseholdDemographics
    {
        return $this->ssHdemoSk;
    }

    public function setSsHdemoSk(?HouseholdDemographics $ssHdemoSk): self
    {
        $this->ssHdemoSk = $ssHdemoSk;

        return $this;
    }

    public function getSsItemSk(): ?Item
    {
        return $this->ssItemSk;
    }

    public function setSsItemSk(?Item $ssItemSk): self
    {
        $this->ssItemSk = $ssItemSk;

        return $this;
    }

    public function getSsPromoSk(): ?Promotion
    {
        return $this->ssPromoSk;
    }

    public function setSsPromoSk(?Promotion $ssPromoSk): self
    {
        $this->ssPromoSk = $ssPromoSk;

        return $this;
    }

    public function getSsStoreSk(): ?Store
    {
        return $this->ssStoreSk;
    }

    public function setSsStoreSk(?Store $ssStoreSk): self
    {
        $this->ssStoreSk = $ssStoreSk;

        return $this;
    }

    public function getSsSoldTimeSk(): ?TimeDim
    {
        return $this->ssSoldTimeSk;
    }

    public function setSsSoldTimeSk(?TimeDim $ssSoldTimeSk): self
    {
        $this->ssSoldTimeSk = $ssSoldTimeSk;

        return $this;
    }


}
