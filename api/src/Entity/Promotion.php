<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 * @ApiResource()
 * @ORM\Table(name="promotion", indexes={@ORM\Index(name="p_start_date", columns={"p_start_date_sk"}), @ORM\Index(name="p_i", columns={"p_item_sk"}), @ORM\Index(name="p_end_date", columns={"p_end_date_sk"})})
 * @ORM\Entity
 */
class Promotion
{
    /**
     * @var int
     *
     * @ORM\Column(name="p_promo_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="promotion_p_promo_sk_seq", allocationSize=1, initialValue=1)
     */
    private $pPromoSk;

    /**
     * @var string
     *
     * @ORM\Column(name="p_promo_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $pPromoId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_cost", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $pCost;

    /**
     * @var int|null
     *
     * @ORM\Column(name="p_response_target", type="integer", nullable=true)
     */
    private $pResponseTarget;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_promo_name", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $pPromoName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_channel_dmail", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $pChannelDmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_channel_email", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $pChannelEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_channel_catalog", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $pChannelCatalog;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_channel_tv", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $pChannelTv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_channel_radio", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $pChannelRadio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_channel_press", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $pChannelPress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_channel_event", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $pChannelEvent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_channel_demo", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $pChannelDemo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_channel_details", type="string", length=100, nullable=true)
     */
    private $pChannelDetails;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_purpose", type="string", length=15, nullable=true, options={"fixed"=true})
     */
    private $pPurpose;

    /**
     * @var string|null
     *
     * @ORM\Column(name="p_discount_active", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $pDiscountActive;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="p_end_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $pEndDateSk;

    /**
     * @var Item
     *
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="p_item_sk", referencedColumnName="i_item_sk")
     * })
     */
    private $pItemSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="p_start_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $pStartDateSk;

    public function getPPromoSk(): ?int
    {
        return $this->pPromoSk;
    }

    public function getPPromoId(): ?string
    {
        return $this->pPromoId;
    }

    public function setPPromoId(string $pPromoId): self
    {
        $this->pPromoId = $pPromoId;

        return $this;
    }

    public function getPCost(): ?string
    {
        return $this->pCost;
    }

    public function setPCost(?string $pCost): self
    {
        $this->pCost = $pCost;

        return $this;
    }

    public function getPResponseTarget(): ?int
    {
        return $this->pResponseTarget;
    }

    public function setPResponseTarget(?int $pResponseTarget): self
    {
        $this->pResponseTarget = $pResponseTarget;

        return $this;
    }

    public function getPPromoName(): ?string
    {
        return $this->pPromoName;
    }

    public function setPPromoName(?string $pPromoName): self
    {
        $this->pPromoName = $pPromoName;

        return $this;
    }

    public function getPChannelDmail(): ?string
    {
        return $this->pChannelDmail;
    }

    public function setPChannelDmail(?string $pChannelDmail): self
    {
        $this->pChannelDmail = $pChannelDmail;

        return $this;
    }

    public function getPChannelEmail(): ?string
    {
        return $this->pChannelEmail;
    }

    public function setPChannelEmail(?string $pChannelEmail): self
    {
        $this->pChannelEmail = $pChannelEmail;

        return $this;
    }

    public function getPChannelCatalog(): ?string
    {
        return $this->pChannelCatalog;
    }

    public function setPChannelCatalog(?string $pChannelCatalog): self
    {
        $this->pChannelCatalog = $pChannelCatalog;

        return $this;
    }

    public function getPChannelTv(): ?string
    {
        return $this->pChannelTv;
    }

    public function setPChannelTv(?string $pChannelTv): self
    {
        $this->pChannelTv = $pChannelTv;

        return $this;
    }

    public function getPChannelRadio(): ?string
    {
        return $this->pChannelRadio;
    }

    public function setPChannelRadio(?string $pChannelRadio): self
    {
        $this->pChannelRadio = $pChannelRadio;

        return $this;
    }

    public function getPChannelPress(): ?string
    {
        return $this->pChannelPress;
    }

    public function setPChannelPress(?string $pChannelPress): self
    {
        $this->pChannelPress = $pChannelPress;

        return $this;
    }

    public function getPChannelEvent(): ?string
    {
        return $this->pChannelEvent;
    }

    public function setPChannelEvent(?string $pChannelEvent): self
    {
        $this->pChannelEvent = $pChannelEvent;

        return $this;
    }

    public function getPChannelDemo(): ?string
    {
        return $this->pChannelDemo;
    }

    public function setPChannelDemo(?string $pChannelDemo): self
    {
        $this->pChannelDemo = $pChannelDemo;

        return $this;
    }

    public function getPChannelDetails(): ?string
    {
        return $this->pChannelDetails;
    }

    public function setPChannelDetails(?string $pChannelDetails): self
    {
        $this->pChannelDetails = $pChannelDetails;

        return $this;
    }

    public function getPPurpose(): ?string
    {
        return $this->pPurpose;
    }

    public function setPPurpose(?string $pPurpose): self
    {
        $this->pPurpose = $pPurpose;

        return $this;
    }

    public function getPDiscountActive(): ?string
    {
        return $this->pDiscountActive;
    }

    public function setPDiscountActive(?string $pDiscountActive): self
    {
        $this->pDiscountActive = $pDiscountActive;

        return $this;
    }

    public function getPEndDateSk(): ?DateDim
    {
        return $this->pEndDateSk;
    }

    public function setPEndDateSk(?DateDim $pEndDateSk): self
    {
        $this->pEndDateSk = $pEndDateSk;

        return $this;
    }

    public function getPItemSk(): ?Item
    {
        return $this->pItemSk;
    }

    public function setPItemSk(?Item $pItemSk): self
    {
        $this->pItemSk = $pItemSk;

        return $this;
    }

    public function getPStartDateSk(): ?DateDim
    {
        return $this->pStartDateSk;
    }

    public function setPStartDateSk(?DateDim $pStartDateSk): self
    {
        $this->pStartDateSk = $pStartDateSk;

        return $this;
    }


}
