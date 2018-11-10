<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\UserInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="users_uniques_fields", columns={"username"}), @ORM\UniqueConstraint(name="UNIQ_1483A5E9CCFA12B8", columns={"profile_id"})})
 * @ORM\Entity
 */
class Users implements UserInterface
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
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=20, nullable=false)
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=250, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=250, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="plain_password", type="text", length=65535, nullable=false)
     */
    private $plainPassword;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modified_on", type="datetime", nullable=true)
     */
    private $modifiedOn;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_on", type="datetime", nullable=true)
     */
    private $createdOn;

    /**
     * @var \Profiles
     *
     * @ORM\OneToOne(targetEntity="Profiles", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     * })
     */
    private $profile;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Emails", mappedBy="user", cascade={"persist"})
     */
    private $emails;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ListRoles", inversedBy="users")
     */
    private $role;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
        $this->emails = new ArrayCollection();
        $this->role = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getModifiedOn(): ?\DateTimeInterface
    {
        return $this->modifiedOn;
    }

    public function setModifiedOn(?\DateTimeInterface $modifiedOn): self
    {
        $this->modifiedOn = $modifiedOn;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(?\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getProfile(): ?Profiles
    {
        return $this->profile;
    }

    public function setProfile(?Profiles $profile): self
    {
        $this->profile = $profile;

        return $this;
    }
    /**
     * @return Collection|Emails[]
     */
    public function getEmails(): Collection
    {
        return $this->emails;
    }

    public function addEmail(Emails $emails): self
    {
        if (!$this->emails->contains($emails)) {
            $this->emails[] = $emails;
            $emails->setUser($this);
        }

        return $this;
    }

    public function removeEmail(Emails $emails): self
    {
        if ($this->emails->contains($emails)) {
            $this->emails->removeElement($emails);
            // set the owning side to null (unless already changed)
            if ($emails->getUser() === $this) {
                $emails->setUser(null);
            }
        }
        return $this;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }
    /**
     * @return Collection|ListRoles[]
     */
    public function getRoles()
    {
        $user_roles_array = $this->role->toArray();
        $roles = [];
        foreach($user_roles_array as $user_role){
            //@var UserRole $user_role
            $roles[] = $user_role->getRole();
        }
        return $roles;
    }
    
    /**
     * @return Collection|ListRoles[]
     */
    public function getRole(): Collection
    {
        return $this->role;
    }

    public function addRole(ListRoles $role): self
    {
        if (!$this->role->contains($role)) {
            $this->role[] = $role;
        }

        return $this;
    }

    public function removeRole(ListRoles $role): self
    {
        if ($this->role->contains($role)) {
            $this->role->removeElement($role);
        }

        return $this;
    }

}
