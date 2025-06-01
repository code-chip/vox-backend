<?php

/**
 * @copyright  Copyright (c) 2025 Code Chip (https://codechip.com.br)
 * @author     Will <willvix@outlook.com>
 * @Link       https://github.com/code-chip
 */

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PartnerRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PartnerRepository::class)]
#[ApiResource]
class Partner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?string $partnerName = null;

    #[ORM\Column(length: 12)]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?string $partnerType = null;

    #[ORM\Column(length: 13)]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?string $qualification = null;

    #[ORM\Column]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Groups(groups: ['company:read', 'company:write'])]
    private ?DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'Partners')]
    #[ORM\JoinColumn(nullable: false)]
    //#[Groups(groups: ['company:read', 'company:write'])]
    private ?Company $company = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartnerName(): ?string
    {
        return $this->partnerName;
    }

    public function setPartnerName(string $partnerName): static
    {
        $this->partnerName = $partnerName;

        return $this;
    }

    public function getPartnerType(): ?string
    {
        return $this->partnerType;
    }

    public function setPartnerType(string $partnerType): static
    {
        $this->partnerType = $partnerType;

        return $this;
    }

    public function getQualification(): ?string
    {
        return $this->qualification;
    }

    public function setQualification(string $qualification): static
    {
        $this->qualification = $qualification;

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

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): static
    {
        $this->company = $company;

        return $this;
    }
}
