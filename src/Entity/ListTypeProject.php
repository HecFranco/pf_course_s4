<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ListTypeProject
 *
 * @ORM\Table(name="list_type_project")
 * @ORM\Entity
 */
class ListTypeProject
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="float")
     */
    private $basePrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="datetime", nullable=false)
     */
    private $createdOn;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="App\Entity\ListTypeTask", cascade={"persist"}, mappedBy="typeProject")
     */
    private $tasks;

    public function __construct() {
        $this->tasks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBasePrice(): ?float
    {
        return $this->basePrice;
    }

    public function setBasePrice(float $basePrice): self
    {
        $this->basePrice = $basePrice;

        return $this;
    }

    /**
     * @return Collection|Tasks[]
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    public function addTask(ListTypeTask $tasks): self
    {
        if (!$this->tasks->contains($tasks)) {
            $this->tasks[] = $tasks;
        }

        return $this;
    }

    public function removeTask(ListTypeTask $tasks): self
    {
        if ($this->tasks->contains($tasks)) {
            $this->tasks->removeElement($tasks);
        }
        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
