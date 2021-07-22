<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 * 
 * @ORM\Table(name="item")
 * @ORM\Entity
 */
class Item
{
    /**
     * @var int
     *
     * @ORM\Column(name="i_item_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="item_i_item_sk_seq", allocationSize=1, initialValue=1)
     */
    private $iItemSk;

    /**
     * @var string
     *
     * @ORM\Column(name="i_item_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $iItemId;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="i_rec_start_date", type="date", nullable=true)
     */
    private $iRecStartDate;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="i_rec_end_date", type="date", nullable=true)
     */
    private $iRecEndDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_item_desc", type="string", length=200, nullable=true)
     */
    private $iItemDesc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_current_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $iCurrentPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_wholesale_cost", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $iWholesaleCost;

    /**
     * @var int|null
     *
     * @ORM\Column(name="i_brand_id", type="integer", nullable=true)
     */
    private $iBrandId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_brand", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $iBrand;

    /**
     * @var int|null
     *
     * @ORM\Column(name="i_class_id", type="integer", nullable=true)
     */
    private $iClassId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_class", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $iClass;

    /**
     * @var int|null
     *
     * @ORM\Column(name="i_category_id", type="integer", nullable=true)
     */
    private $iCategoryId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_category", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $iCategory;

    /**
     * @var int|null
     *
     * @ORM\Column(name="i_manufact_id", type="integer", nullable=true)
     */
    private $iManufactId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_manufact", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $iManufact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_size", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $iSize;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_formulation", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $iFormulation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_color", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $iColor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_units", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $iUnits;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_container", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $iContainer;

    /**
     * @var int|null
     *
     * @ORM\Column(name="i_manager_id", type="integer", nullable=true)
     */
    private $iManagerId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="i_product_name", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $iProductName;

    public function getIItemSk(): ?int
    {
        return $this->iItemSk;
    }

    public function getIItemId(): ?string
    {
        return $this->iItemId;
    }

    public function setIItemId(string $iItemId): self
    {
        $this->iItemId = $iItemId;

        return $this;
    }

    public function getIRecStartDate(): ?\DateTimeInterface
    {
        return $this->iRecStartDate;
    }

    public function setIRecStartDate(?\DateTimeInterface $iRecStartDate): self
    {
        $this->iRecStartDate = $iRecStartDate;

        return $this;
    }

    public function getIRecEndDate(): ?\DateTimeInterface
    {
        return $this->iRecEndDate;
    }

    public function setIRecEndDate(?\DateTimeInterface $iRecEndDate): self
    {
        $this->iRecEndDate = $iRecEndDate;

        return $this;
    }

    public function getIItemDesc(): ?string
    {
        return $this->iItemDesc;
    }

    public function setIItemDesc(?string $iItemDesc): self
    {
        $this->iItemDesc = $iItemDesc;

        return $this;
    }

    public function getICurrentPrice(): ?string
    {
        return $this->iCurrentPrice;
    }

    public function setICurrentPrice(?string $iCurrentPrice): self
    {
        $this->iCurrentPrice = $iCurrentPrice;

        return $this;
    }

    public function getIWholesaleCost(): ?string
    {
        return $this->iWholesaleCost;
    }

    public function setIWholesaleCost(?string $iWholesaleCost): self
    {
        $this->iWholesaleCost = $iWholesaleCost;

        return $this;
    }

    public function getIBrandId(): ?int
    {
        return $this->iBrandId;
    }

    public function setIBrandId(?int $iBrandId): self
    {
        $this->iBrandId = $iBrandId;

        return $this;
    }

    public function getIBrand(): ?string
    {
        return $this->iBrand;
    }

    public function setIBrand(?string $iBrand): self
    {
        $this->iBrand = $iBrand;

        return $this;
    }

    public function getIClassId(): ?int
    {
        return $this->iClassId;
    }

    public function setIClassId(?int $iClassId): self
    {
        $this->iClassId = $iClassId;

        return $this;
    }

    public function getIClass(): ?string
    {
        return $this->iClass;
    }

    public function setIClass(?string $iClass): self
    {
        $this->iClass = $iClass;

        return $this;
    }

    public function getICategoryId(): ?int
    {
        return $this->iCategoryId;
    }

    public function setICategoryId(?int $iCategoryId): self
    {
        $this->iCategoryId = $iCategoryId;

        return $this;
    }

    public function getICategory(): ?string
    {
        return $this->iCategory;
    }

    public function setICategory(?string $iCategory): self
    {
        $this->iCategory = $iCategory;

        return $this;
    }

    public function getIManufactId(): ?int
    {
        return $this->iManufactId;
    }

    public function setIManufactId(?int $iManufactId): self
    {
        $this->iManufactId = $iManufactId;

        return $this;
    }

    public function getIManufact(): ?string
    {
        return $this->iManufact;
    }

    public function setIManufact(?string $iManufact): self
    {
        $this->iManufact = $iManufact;

        return $this;
    }

    public function getISize(): ?string
    {
        return $this->iSize;
    }

    public function setISize(?string $iSize): self
    {
        $this->iSize = $iSize;

        return $this;
    }

    public function getIFormulation(): ?string
    {
        return $this->iFormulation;
    }

    public function setIFormulation(?string $iFormulation): self
    {
        $this->iFormulation = $iFormulation;

        return $this;
    }

    public function getIColor(): ?string
    {
        return $this->iColor;
    }

    public function setIColor(?string $iColor): self
    {
        $this->iColor = $iColor;

        return $this;
    }

    public function getIUnits(): ?string
    {
        return $this->iUnits;
    }

    public function setIUnits(?string $iUnits): self
    {
        $this->iUnits = $iUnits;

        return $this;
    }

    public function getIContainer(): ?string
    {
        return $this->iContainer;
    }

    public function setIContainer(?string $iContainer): self
    {
        $this->iContainer = $iContainer;

        return $this;
    }

    public function getIManagerId(): ?int
    {
        return $this->iManagerId;
    }

    public function setIManagerId(?int $iManagerId): self
    {
        $this->iManagerId = $iManagerId;

        return $this;
    }

    public function getIProductName(): ?string
    {
        return $this->iProductName;
    }

    public function setIProductName(?string $iProductName): self
    {
        $this->iProductName = $iProductName;

        return $this;
    }


}
