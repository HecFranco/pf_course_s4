<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profiles
 *
 * @ORM\Table(name="profiles", indexes={@ORM\Index(name="gender", columns={"gender_id"})})
 * @ORM\Entity
 */
class Profiles
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
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=250, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=250, nullable=false)
     */
    private $lastname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nickname", type="string", length=255, nullable=true)
     */
    private $nickname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dni", type="string", length=10, nullable=true)
     */
    private $dni;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="birthdate", type="date", nullable=true)
     */
    private $birthdate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="year_of_birth", type="integer", nullable=true)
     */
    private $yearOfBirth;

    /**
     * @var string|null
     *
     * @ORM\Column(name="timezone", type="string", length=50, nullable=true)
     */
    private $timezone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_on", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $modifiedOn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdOn;

    /**
     * @var \ListGenders
     *
     * @ORM\ManyToOne(targetEntity="ListGenders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gender_id", referencedColumnName="id")
     * })
     */
    private $gender;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(?string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(?\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getYearOfBirth(): ?int
    {
        return $this->yearOfBirth;
    }

    public function setYearOfBirth(?int $yearOfBirth): self
    {
        $this->yearOfBirth = $yearOfBirth;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getModifiedOn(): ?\DateTimeInterface
    {
        return $this->modifiedOn;
    }

    public function setModifiedOn(\DateTimeInterface $modifiedOn): self
    {
        $this->modifiedOn = $modifiedOn;

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

    public function getGender(): ?ListGenders
    {
        return $this->gender;
    }

    public function setGender(?ListGenders $gender): self
    {
        $this->gender = $gender;

        return $this;
    }


}
