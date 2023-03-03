<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MemberRepository::class)
 */
class Member
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Phone_num;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="date")
     */
    private $Birth_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getPhoneNum(): ?string
    {
        return $this->Phone_num;
    }

    public function setPhoneNum(string $Phone_num): self
    {
        $this->Phone_num = $Phone_num;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->Birth_date;
    }

    public function setBirthDate(\DateTimeInterface $Birth_date): self
    {
        $this->Birth_date = $Birth_date;

        return $this;
    }
}
