<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
 */
class Orders
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
    private $Order_Date;

    /**
     * @ORM\Column(type="date")
     */
    private $Delivery_Date;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="orders")
     */
    private $Cus;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->Order_Date;
    }

    public function setOrderDate(\DateTimeInterface $Order_Date): self
    {
        $this->Order_Date = $Order_Date;

        return $this;
    }

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->Delivery_Date;
    }

    public function setDeliveryDate(\DateTimeInterface $Delivery_Date): self
    {
        $this->Delivery_Date = $Delivery_Date;

        return $this;
    }

    public function getCus(): ?Customer
    {
        return $this->Cus;
    }

    public function setCus(?Customer $Cus): self
    {
        $this->Cus = $Cus;

        return $this;
    }
}
