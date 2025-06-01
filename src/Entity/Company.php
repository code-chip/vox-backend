<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CompanyRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
#[ApiResource]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull(message: 'The corporate name field cannot be null')]
    private ?string $corporateName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tradeName = null;

    #[ORM\Column(length: 14)]
    private ?string $cnpj = null;

    #[ORM\Column(length: 12)]
    #[Assert\NotNull(message: 'The company field cannot be null')]
    private ?string $companyType = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.',
    )]
    private ?string $email = null;

    #[ORM\Column(length: 8)]
    private ?string $registrationStatus = null;

    #[ORM\Column]
    private ?DateTimeImmutable $openingDate = null;

    #[ORM\Column]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?DateTimeImmutable $updatedAt = null;

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
}
