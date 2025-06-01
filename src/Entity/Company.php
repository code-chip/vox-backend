<?php

/**
 * @copyright  Copyright (c) 2025 Code Chip (https://codechip.com.br)
 * @author     Will <willvix@outlook.com>
 * @Link       https://github.com/code-chip
 */

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CompanyRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
#[ApiResource(
    denormalizationContext: ['groups' => ['company:write']],
    normalizationContext: ['groups' => ['company:read']]
)]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull(message: 'The corporate name field cannot be null')]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?string $corporateName = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?string $tradeName = null;

    #[ORM\Column(length: 14)]
    #[Assert\Regex(
        pattern: '/^\d+$/',
        message: "The CNPJ must not contain '.', '/', '-' or string."
    )]
    #[Assert\Length(
        min: 14,
        max: 14,
        minMessage: 'The cnpj must contain {{ limit }} digits',
        maxMessage: 'The cnpj must contain {{ limit }} digits',
    )]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?string $cnpj = null;

    #[ORM\Column(length: 12)]
    #[Assert\NotNull(message: 'The company field cannot be null')]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?string $companyType = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.',
    )]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?string $email = null;

    #[ORM\Column(length: 9)]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?string $registrationStatus = null;

    #[ORM\Column]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?DateTimeImmutable $openingDate = null;

    #[ORM\Column]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Partner>
     */
    #[ORM\OneToMany(targetEntity: Partner::class, mappedBy: 'company', orphanRemoval: true)]
    #[Groups(groups: ['company:read', 'company:write'])]
    private Collection $partners;

    public function __construct()
    {
        $this->partners = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorporateName(): ?string
    {
        return $this->corporateName;
    }

    public function setCorporateName(string $corporateName): static
    {
        $this->corporateName = $corporateName;

        return $this;
    }

    public function getTradeName(): ?string
    {
        return $this->tradeName;
    }

    public function setTradeName(string $tradeName): static
    {
        $this->tradeName = $tradeName;

        return $this;
    }

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): static
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    public function getcompanyType(): ?string
    {
        return $this->companyType;
    }

    public function setcompanyType(string $companyType): static
    {
        $this->companyType = $companyType;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRegistrationStatus(): ?string
    {
        return $this->registrationStatus;
    }

    public function setRegistrationStatus(string $registrationStatus): static
    {
        $this->registrationStatus = $registrationStatus;

        return $this;
    }

    public function getOpeningDate(): ?DateTimeImmutable
    {
        return $this->openingDate;
    }

    public function setOpeningDate(DateTimeImmutable $openingDate): static
    {
        $this->openingDate = $openingDate;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Partner>
     */
    public function getpartners(): Collection
    {
        return $this->partners;
    }

    public function addPartner(Partner $partner): static
    {
        if (!$this->partners->contains($partner)) {
            $this->partners->add($partner);
            $partner->setCompany($this);
        }

        return $this;
    }

    public function removePartner(Partner $partner): static
    {
        if ($this->partners->removeElement($partner)) {
            // set the owning side to null (unless already changed)
            if ($partner->getCompany() === $this) {
                $partner->setCompany(null);
            }
        }

        return $this;
    }
}
