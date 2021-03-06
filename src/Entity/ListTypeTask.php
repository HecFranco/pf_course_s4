<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ListTypeTask
 *
 * @ORM\Table(name="list_type_task", indexes={@ORM\Index(name="type_project", columns={"type_project_id"})})
 * @ORM\Entity
 */
class ListTypeTask
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
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=false)
     */
    private $note;

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
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="datetime", nullable=true)
     */
    private $createdOn;

    /**
     * @var \ListTypeProject
     *
     * @ORM\ManyToOne(targetEntity="ListTypeProject", inversedBy="tasks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_project_id", referencedColumnName="id")
     * })
     */
    private $typeProject;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Budgets", mappedBy="tasks")
     */
    private $budgets;  

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->budgets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
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

    public function getTypeProject(): ?ListTypeProject
    {
        return $this->typeProject;
    }

    public function setTypeProject(?ListTypeProject $typeProject): self
    {
        $this->typeProject = $typeProject;

        return $this;
    }

    /**
     * @return Collection|Budgets[]
     */
    public function getBudgets(): Collection
    {
        return $this->budgets;
    }


    public function addBudget(Budgets $budget): self
    {
        if (!$this->budgets->contains($budget)) {
            $this->budgets[] = $budget;
            $budget->addTask($this);
        }

        return $this;
    }

    public function removeBudget(Budgets $budget): self
    {
        if ($this->budgets->contains($budget)) {
            $this->budgets->removeElement($budget);
            $budget->removeTask($this);
        }

        return $this;
    }

}
