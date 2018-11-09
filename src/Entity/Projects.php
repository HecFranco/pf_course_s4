<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Projects
 *
 * @ORM\Table(name="projects", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="state_project_id", columns={"state_project_id"}), @ORM\Index(name="type_project_id", columns={"type_project_id"})})
 * @ORM\Entity
 */
class Projects
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdOn = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @var \ListStateProject
     *
     * @ORM\ManyToOne(targetEntity="ListStateProject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="state_project_id", referencedColumnName="id")
     * })
     */
    private $stateProject;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \ListTypeProject
     *
     * @ORM\ManyToOne(targetEntity="ListTypeProject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_project_id", referencedColumnName="id")
     * })
     */
    private $typeProject;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ListTypeTask", inversedBy="projects")
     * @ORM\JoinTable(name="projects_tasks",
     *   joinColumns={
     *     @ORM\JoinColumn(name="projects_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tasks;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getStateProject(): ?ListStateProject
    {
        return $this->stateProject;
    }

    public function setStateProject(?ListStateProject $stateProject): self
    {
        $this->stateProject = $stateProject;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

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
     * @return Collection|ListTypeTask[]
     */
    public function getTasks(): Collection
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

}
