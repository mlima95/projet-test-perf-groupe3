<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * CatalogPage
 * @ApiResource()
 * @ORM\Table(name="catalog_page", indexes={@ORM\Index(name="cp_d2", columns={"cp_start_date_sk"}), @ORM\Index(name="cp_d1", columns={"cp_end_date_sk"})})
 * @ORM\Entity
 */
class CatalogPage
{
    /**
     * @var int
     *
     * @ORM\Column(name="cp_catalog_page_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="catalog_page_cp_catalog_page_sk_seq", allocationSize=1, initialValue=1)
     */
    private $cpCatalogPageSk;

    /**
     * @var string
     *
     * @ORM\Column(name="cp_catalog_page_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $cpCatalogPageId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cp_department", type="string", length=50, nullable=true)
     */
    private $cpDepartment;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cp_catalog_number", type="integer", nullable=true)
     */
    private $cpCatalogNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cp_catalog_page_number", type="integer", nullable=true)
     */
    private $cpCatalogPageNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cp_description", type="string", length=100, nullable=true)
     */
    private $cpDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cp_type", type="string", length=100, nullable=true)
     */
    private $cpType;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cp_end_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $cpEndDateSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cp_start_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $cpStartDateSk;

    public function getCpCatalogPageSk(): ?int
    {
        return $this->cpCatalogPageSk;
    }

    public function getCpCatalogPageId(): ?string
    {
        return $this->cpCatalogPageId;
    }

    public function setCpCatalogPageId(string $cpCatalogPageId): self
    {
        $this->cpCatalogPageId = $cpCatalogPageId;

        return $this;
    }

    public function getCpDepartment(): ?string
    {
        return $this->cpDepartment;
    }

    public function setCpDepartment(?string $cpDepartment): self
    {
        $this->cpDepartment = $cpDepartment;

        return $this;
    }

    public function getCpCatalogNumber(): ?int
    {
        return $this->cpCatalogNumber;
    }

    public function setCpCatalogNumber(?int $cpCatalogNumber): self
    {
        $this->cpCatalogNumber = $cpCatalogNumber;

        return $this;
    }

    public function getCpCatalogPageNumber(): ?int
    {
        return $this->cpCatalogPageNumber;
    }

    public function setCpCatalogPageNumber(?int $cpCatalogPageNumber): self
    {
        $this->cpCatalogPageNumber = $cpCatalogPageNumber;

        return $this;
    }

    public function getCpDescription(): ?string
    {
        return $this->cpDescription;
    }

    public function setCpDescription(?string $cpDescription): self
    {
        $this->cpDescription = $cpDescription;

        return $this;
    }

    public function getCpType(): ?string
    {
        return $this->cpType;
    }

    public function setCpType(?string $cpType): self
    {
        $this->cpType = $cpType;

        return $this;
    }

    public function getCpEndDateSk(): ?DateDim
    {
        return $this->cpEndDateSk;
    }

    public function setCpEndDateSk(?DateDim $cpEndDateSk): self
    {
        $this->cpEndDateSk = $cpEndDateSk;

        return $this;
    }

    public function getCpStartDateSk(): ?DateDim
    {
        return $this->cpStartDateSk;
    }

    public function setCpStartDateSk(?DateDim $cpStartDateSk): self
    {
        $this->cpStartDateSk = $cpStartDateSk;

        return $this;
    }


}
