<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ListRoles
 *
 * @ORM\Table(name="list_roles")
 * @ORM\Entity
 */
class ListRoles
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
     * @ORM\Column(name="role", type="string", length=50, nullable=false)
     */
    private $role;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdOn = 'CURRENT_TIMESTAMP';

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Users", mappedBy="role")
     */
    private $yes;

    public function __construct()
    {
        $this->yes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

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

    /**
     * @return Collection|Users[]
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(Users $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->addRole($this);
        }

        return $this;
    }

    public function removeYe(Users $ye): self
    {
        if ($this->yes->contains($ye)) {
            $this->yes->removeElement($ye);
            $ye->removeRole($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getRole();
    }

}
