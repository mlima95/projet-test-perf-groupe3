<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerDemographics
 * 
 * @ORM\Table(name="customer_demographics")
 * @ORM\Entity
 */
class CustomerDemographics
{
    /**
     * @var int
     *
     * @ORM\Column(name="cd_demo_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="customer_demographics_cd_demo_sk_seq", allocationSize=1, initialValue=1)
     */
    private $cdDemoSk;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cd_gender", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $cdGender;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cd_marital_status", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $cdMaritalStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cd_education_status", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $cdEducationStatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cd_purchase_estimate", type="integer", nullable=true)
     */
    private $cdPurchaseEstimate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cd_credit_rating", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $cdCreditRating;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cd_dep_count", type="integer", nullable=true)
     */
    private $cdDepCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cd_dep_employed_count", type="integer", nullable=true)
     */
    private $cdDepEmployedCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cd_dep_college_count", type="integer", nullable=true)
     */
    private $cdDepCollegeCount;

    public function getCdDemoSk(): ?int
    {
        return $this->cdDemoSk;
    }

    public function getCdGender(): ?string
    {
        return $this->cdGender;
    }

    public function setCdGender(?string $cdGender): self
    {
        $this->cdGender = $cdGender;

        return $this;
    }

    public function getCdMaritalStatus(): ?string
    {
        return $this->cdMaritalStatus;
    }

    public function setCdMaritalStatus(?string $cdMaritalStatus): self
    {
        $this->cdMaritalStatus = $cdMaritalStatus;

        return $this;
    }

    public function getCdEducationStatus(): ?string
    {
        return $this->cdEducationStatus;
    }

    public function setCdEducationStatus(?string $cdEducationStatus): self
    {
        $this->cdEducationStatus = $cdEducationStatus;

        return $this;
    }

    public function getCdPurchaseEstimate(): ?int
    {
        return $this->cdPurchaseEstimate;
    }

    public function setCdPurchaseEstimate(?int $cdPurchaseEstimate): self
    {
        $this->cdPurchaseEstimate = $cdPurchaseEstimate;

        return $this;
    }

    public function getCdCreditRating(): ?string
    {
        return $this->cdCreditRating;
    }

    public function setCdCreditRating(?string $cdCreditRating): self
    {
        $this->cdCreditRating = $cdCreditRating;

        return $this;
    }

    public function getCdDepCount(): ?int
    {
        return $this->cdDepCount;
    }

    public function setCdDepCount(?int $cdDepCount): self
    {
        $this->cdDepCount = $cdDepCount;

        return $this;
    }

    public function getCdDepEmployedCount(): ?int
    {
        return $this->cdDepEmployedCount;
    }

    public function setCdDepEmployedCount(?int $cdDepEmployedCount): self
    {
        $this->cdDepEmployedCount = $cdDepEmployedCount;

        return $this;
    }

    public function getCdDepCollegeCount(): ?int
    {
        return $this->cdDepCollegeCount;
    }

    public function setCdDepCollegeCount(?int $cdDepCollegeCount): self
    {
        $this->cdDepCollegeCount = $cdDepCollegeCount;

        return $this;
    }


}
