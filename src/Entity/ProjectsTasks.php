<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectsTasks
 *
 * @ORM\Table(name="projects_tasks", indexes={@ORM\Index(name="IDX_C5D931A91EDE0F55", columns={"projects_id"}), @ORM\Index(name="IDX_C5D931A98DB60186", columns={"task_id"}), @ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class ProjectsTasks
{
    /**
     * @var string
     *
     * @ORM\Column(name="state_task", type="string", length=40, nullable=false)
     */
    private $stateTask;

    /**
     * @var \Projects
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Projects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_id", referencedColumnName="id")
     * })
     */
    private $projects;

    /**
     * @var \ListTypeTask
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="ListTypeTask")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     * })
     */
    private $task;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    public function getStateTask(): ?string
    {
        return $this->stateTask;
    }

    public function setStateTask(string $stateTask): self
    {
        $this->stateTask = $stateTask;

        return $this;
    }

    public function getProjects(): ?Projects
    {
        return $this->projects;
    }

    public function setProjects(?Projects $projects): self
    {
        $this->projects = $projects;

        return $this;
    }

    public function getTask(): ?ListTypeTask
    {
        return $this->task;
    }

    public function setTask(?ListTypeTask $task): self
    {
        $this->task = $task;

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


}
