<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Inventory
 * 
 * @ORM\Table(name="inventory", indexes={@ORM\Index(name="inv_i", columns={"inv_item_sk"}), @ORM\Index(name="inv_w", columns={"inv_warehouse_sk"}), @ORM\Index(name="IDX_B12D4A3685E678F8", columns={"inv_date_sk"})})
 * @ORM\Entity(repositoryClass="App\Repository\InventoryRepository")
 */
class Inventory
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="inv_quantity_on_hand", type="integer", nullable=true)
     */
    private $invQuantityOnHand;

    /**
     * @var DateDim
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inv_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $invDateSk;

    /**
     * @var Item
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inv_item_sk", referencedColumnName="i_item_sk")
     * })
     */
    private $invItemSk;

    /**
     * @var Warehouse
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Warehouse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inv_warehouse_sk", referencedColumnName="w_warehouse_sk")
     * })
     */
    private $invWarehouseSk;

    public function getInvQuantityOnHand(): ?int
    {
        return $this->invQuantityOnHand;
    }

    public function setInvQuantityOnHand(?int $invQuantityOnHand): self
    {
        $this->invQuantityOnHand = $invQuantityOnHand;

        return $this;
    }

    public function getInvDateSk(): ?DateDim
    {
        return $this->invDateSk;
    }

    public function setInvDateSk(?DateDim $invDateSk): self
    {
        $this->invDateSk = $invDateSk;

        return $this;
    }

    public function getInvItemSk(): ?Item
    {
        return $this->invItemSk;
    }

    public function setInvItemSk(?Item $invItemSk): self
    {
        $this->invItemSk = $invItemSk;

        return $this;
    }

    public function getInvWarehouseSk(): ?Warehouse
    {
        return $this->invWarehouseSk;
    }

    public function setInvWarehouseSk(?Warehouse $invWarehouseSk): self
    {
        $this->invWarehouseSk = $invWarehouseSk;

        return $this;
    }


}
