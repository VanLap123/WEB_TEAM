<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
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
    private $Cust_Name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Gender;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="date")
     */
    private $Birthday;

    /**
     * @ORM\OneToMany(targetEntity=Orders::class, mappedBy="Cus")
     */
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustName(): ?string
    {
        return $this->Cust_Name;
    }

    public function setCustName(string $Cust_Name): self
    {
        $this->Cust_Name = $Cust_Name;

        return $this;
    }

    public function isGender(): ?bool
    {
        return $this->Gender;
    }

    public function setGender(bool $Gender): self
    {
        $this->Gender = $Gender;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->Birthday;
    }

    public function setBirthday(\DateTimeInterface $Birthday): self
    {
        $this->Birthday = $Birthday;

        return $this;
    }

    /**
     * @return Collection<int, Orders>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Orders $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setCus($this);
        }

        return $this;
    }

    public function removeOrder(Orders $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getCus() === $this) {
                $order->setCus(null);
            }
        }

        return $this;
    }
}
