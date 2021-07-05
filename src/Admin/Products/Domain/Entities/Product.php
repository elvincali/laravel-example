<?php

namespace Src\Admin\Products\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table("products")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public int $id;

    /**
     * @ORM\Column(type="string")
     */
    public string $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public string $description;

    /**
     * @ORM\Column(type="string")
     */
    public string $code;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    public float $price;

    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(nullable=false)
     */
    public Category $category;

    /**
     * @ORM\ManyToOne(targetEntity="UnitMeasure")
     * @ORM\JoinColumn(nullable=false)
     */
    public UnitMeasure $unitMeasure;

}
