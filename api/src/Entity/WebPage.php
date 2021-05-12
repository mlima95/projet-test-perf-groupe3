<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebPage
 *
 * @ORM\Table(name="web_page", indexes={@ORM\Index(name="wp_ad", columns={"wp_access_date_sk"}), @ORM\Index(name="wp_cd", columns={"wp_creation_date_sk"})})
 * @ORM\Entity
 */
class WebPage
{
    /**
     * @var int
     *
     * @ORM\Column(name="wp_web_page_sk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="web_page_wp_web_page_sk_seq", allocationSize=1, initialValue=1)
     */
    private $wpWebPageSk;

    /**
     * @var string
     *
     * @ORM\Column(name="wp_web_page_id", type="string", length=16, nullable=false, options={"fixed"=true})
     */
    private $wpWebPageId;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="wp_rec_start_date", type="date", nullable=true)
     */
    private $wpRecStartDate;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="wp_rec_end_date", type="date", nullable=true)
     */
    private $wpRecEndDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wp_autogen_flag", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $wpAutogenFlag;

    /**
     * @var int|null
     *
     * @ORM\Column(name="wp_customer_sk", type="integer", nullable=true)
     */
    private $wpCustomerSk;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wp_url", type="string", length=100, nullable=true)
     */
    private $wpUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wp_type", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $wpType;

    /**
     * @var int|null
     *
     * @ORM\Column(name="wp_char_count", type="integer", nullable=true)
     */
    private $wpCharCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="wp_link_count", type="integer", nullable=true)
     */
    private $wpLinkCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="wp_image_count", type="integer", nullable=true)
     */
    private $wpImageCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="wp_max_ad_count", type="integer", nullable=true)
     */
    private $wpMaxAdCount;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wp_access_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $wpAccessDateSk;

    /**
     * @var DateDim
     *
     * @ORM\ManyToOne(targetEntity="DateDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="wp_creation_date_sk", referencedColumnName="d_date_sk")
     * })
     */
    private $wpCreationDateSk;

    public function getWpWebPageSk(): ?int
    {
        return $this->wpWebPageSk;
    }

    public function getWpWebPageId(): ?string
    {
        return $this->wpWebPageId;
    }

    public function setWpWebPageId(string $wpWebPageId): self
    {
        $this->wpWebPageId = $wpWebPageId;

        return $this;
    }

    public function getWpRecStartDate(): ?\DateTimeInterface
    {
        return $this->wpRecStartDate;
    }

    public function setWpRecStartDate(?\DateTimeInterface $wpRecStartDate): self
    {
        $this->wpRecStartDate = $wpRecStartDate;

        return $this;
    }

    public function getWpRecEndDate(): ?\DateTimeInterface
    {
        return $this->wpRecEndDate;
    }

    public function setWpRecEndDate(?\DateTimeInterface $wpRecEndDate): self
    {
        $this->wpRecEndDate = $wpRecEndDate;

        return $this;
    }

    public function getWpAutogenFlag(): ?string
    {
        return $this->wpAutogenFlag;
    }

    public function setWpAutogenFlag(?string $wpAutogenFlag): self
    {
        $this->wpAutogenFlag = $wpAutogenFlag;

        return $this;
    }

    public function getWpCustomerSk(): ?int
    {
        return $this->wpCustomerSk;
    }

    public function setWpCustomerSk(?int $wpCustomerSk): self
    {
        $this->wpCustomerSk = $wpCustomerSk;

        return $this;
    }

    public function getWpUrl(): ?string
    {
        return $this->wpUrl;
    }

    public function setWpUrl(?string $wpUrl): self
    {
        $this->wpUrl = $wpUrl;

        return $this;
    }

    public function getWpType(): ?string
    {
        return $this->wpType;
    }

    public function setWpType(?string $wpType): self
    {
        $this->wpType = $wpType;

        return $this;
    }

    public function getWpCharCount(): ?int
    {
        return $this->wpCharCount;
    }

    public function setWpCharCount(?int $wpCharCount): self
    {
        $this->wpCharCount = $wpCharCount;

        return $this;
    }

    public function getWpLinkCount(): ?int
    {
        return $this->wpLinkCount;
    }

    public function setWpLinkCount(?int $wpLinkCount): self
    {
        $this->wpLinkCount = $wpLinkCount;

        return $this;
    }

    public function getWpImageCount(): ?int
    {
        return $this->wpImageCount;
    }

    public function setWpImageCount(?int $wpImageCount): self
    {
        $this->wpImageCount = $wpImageCount;

        return $this;
    }

    public function getWpMaxAdCount(): ?int
    {
        return $this->wpMaxAdCount;
    }

    public function setWpMaxAdCount(?int $wpMaxAdCount): self
    {
        $this->wpMaxAdCount = $wpMaxAdCount;

        return $this;
    }

    public function getWpAccessDateSk(): ?DateDim
    {
        return $this->wpAccessDateSk;
    }

    public function setWpAccessDateSk(?DateDim $wpAccessDateSk): self
    {
        $this->wpAccessDateSk = $wpAccessDateSk;

        return $this;
    }

    public function getWpCreationDateSk(): ?DateDim
    {
        return $this->wpCreationDateSk;
    }

    public function setWpCreationDateSk(?DateDim $wpCreationDateSk): self
    {
        $this->wpCreationDateSk = $wpCreationDateSk;

        return $this;
    }


}
