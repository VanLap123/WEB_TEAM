<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $Pro_Name;

    /**
     * @ORM\Column(type="integer")
     */
    private $Price;

    /**
     * @ORM\Column(type="integer")
     */
    private $OldPrice;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Pro_Desc;

    /**
     * @ORM\Column(type="date")
     */
    private $Pro_Date;

    /**
     * @ORM\Column(type="integer")
     */
    private $Pro_qty;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pro_Image;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     */
    private $Cat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProName(): ?string
    {
        return $this->Pro_Name;
    }

    public function setProName(string $Pro_Name): self
    {
        $this->Pro_Name = $Pro_Name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getOldPrice(): ?int
    {
        return $this->OldPrice;
    }

    public function setOldPrice(int $OldPrice): self
    {
        $this->OldPrice = $OldPrice;

        return $this;
    }

    public function getProDesc(): ?string
    {
        return $this->Pro_Desc;
    }

    public function setProDesc(string $Pro_Desc): self
    {
        $this->Pro_Desc = $Pro_Desc;

        return $this;
    }

    public function getProDate(): ?\DateTimeInterface
    {
        return $this->Pro_Date;
    }

    public function setProDate(\DateTimeInterface $Pro_Date): self
    {
        $this->Pro_Date = $Pro_Date;

        return $this;
    }

    public function getProQty(): ?int
    {
        return $this->Pro_qty;
    }

    public function setProQty(int $Pro_qty): self
    {
        $this->Pro_qty = $Pro_qty;

        return $this;
    }

    public function getProImage(): ?string
    {
        return $this->Pro_Image;
    }

    public function setProImage(string $Pro_Image): self
    {
        $this->Pro_Image = $Pro_Image;

        return $this;
    }

    public function getCat(): ?Category
    {
        return $this->Cat;
    }

    public function setCat(?Category $Cat): self
    {
        $this->Cat = $Cat;

        return $this;
    }
}
