<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcity", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcity;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="weather", type="string", length=50, nullable=false)
     */
    private $weather = '';

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=45, nullable=false)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="nativelanguage", type="string", length=45, nullable=false)
     */
    private $nativelanguage;

    /**
     * @var string
     *
     * @ORM\Column(name="continent", type="string", length=45, nullable=false)
     */
    private $continent;

    /**
     * @var string
     *
     * @ORM\Column(name="nativelanguage_difficulty", type="string", length=45, nullable=false)
     */
    private $nativelanguageDifficulty;

    /**
     * @var string
     *
     * @ORM\Column(name="cost_of_living", type="string", length=45, nullable=false)
     */
    private $costOfLiving;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=45, nullable=false)
     */
    private $role;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img", type="string", length=45, nullable=true)
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=45, nullable=false)
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="video", type="string", length=200, nullable=true)
     */
    private $video;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="idCity")
     */
    private $idUser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUser = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdcity(): ?int
    {
        return $this->idcity;
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

    public function getWeather(): ?string
    {
        return $this->weather;
    }

    public function setWeather(string $weather): self
    {
        $this->weather = $weather;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getNativelanguage(): ?string
    {
        return $this->nativelanguage;
    }

    public function setNativelanguage(string $nativelanguage): self
    {
        $this->nativelanguage = $nativelanguage;

        return $this;
    }

    public function getContinent(): ?string
    {
        return $this->continent;
    }

    public function setContinent(string $continent): self
    {
        $this->continent = $continent;

        return $this;
    }

    public function getNativelanguageDifficulty(): ?string
    {
        return $this->nativelanguageDifficulty;
    }

    public function setNativelanguageDifficulty(string $nativelanguageDifficulty): self
    {
        $this->nativelanguageDifficulty = $nativelanguageDifficulty;

        return $this;
    }

    public function getCostOfLiving(): ?string
    {
        return $this->costOfLiving;
    }

    public function setCostOfLiving(string $costOfLiving): self
    {
        $this->costOfLiving = $costOfLiving;

        return $this;
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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getIdUser(): Collection
    {
        return $this->idUser;
    }

    public function addIdUser(User $idUser): self
    {
        if (!$this->idUser->contains($idUser)) {
            $this->idUser[] = $idUser;
            $idUser->addIdCity($this);
        }

        return $this;
    }

    public function removeIdUser(User $idUser): self
    {
        if ($this->idUser->removeElement($idUser)) {
            $idUser->removeIdCity($this);
        }

        return $this;
    }

}
