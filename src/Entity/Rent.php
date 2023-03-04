<?php

namespace App\Entity;

use App\Repository\RentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RentRepository::class)
 */
class Rent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Rent_date;

    /**
     * @ORM\Column(type="date")
     */
    private $Return_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $Rent_price;

    /**
     * @ORM\ManyToOne(targetEntity=Member::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Mem;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Book;

    /**
     * @ORM\ManyToOne(targetEntity=member::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $mem_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRentDate(): ?\DateTimeInterface
    {
        return $this->Rent_date;
    }

    public function setRentDate(\DateTimeInterface $Rent_date): self
    {
        $this->Rent_date = $Rent_date;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->Return_date;
    }

    public function setReturnDate(\DateTimeInterface $Return_date): self
    {
        $this->Return_date = $Return_date;

        return $this;
    }

    public function getRentPrice(): ?int
    {
        return $this->Rent_price;
    }

    public function setRentPrice(int $Rent_price): self
    {
        $this->Rent_price = $Rent_price;

        return $this;
    }

    public function getMem(): ?Member
    {
        return $this->Mem;
    }

    public function setMem(?Member $Mem): self
    {
        $this->Mem = $Mem;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->Book;
    }

    public function setBook(?Book $Book): self
    {
        $this->Book = $Book;

        return $this;
    }

    public function getMemId(): ?member
    {
        return $this->mem_id;
    }

    public function setMemId(?member $mem_id): self
    {
        $this->mem_id = $mem_id;

        return $this;
    }
}
