<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=45, nullable=false)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=45, nullable=false)
     */
    private $nickname;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=45, nullable=false)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="number", type="string", length=45, nullable=true)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="favourite_weather", type="string", length=45, nullable=false)
     */
    private $favouriteWeather;

    /**
     * @var string
     *
     * @ORM\Column(name="main_language", type="string", length=45, nullable=false)
     */
    private $mainLanguage;

    /**
     * @var bool
     *
     * @ORM\Column(name="english", type="boolean", nullable=false)
     */
    private $english;

    /**
     * @var string
     *
     * @ORM\Column(name="continent", type="string", length=45, nullable=false)
     */
    private $continent;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=45, nullable=false)
     */
    private $country;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="City", inversedBy="idUser")
     * @ORM\JoinTable(name="travel",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_User", referencedColumnName="iduser")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_City", referencedColumnName="idcity")
     *   }
     * )
     */
    private $idCity;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCity = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
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

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getFavouriteWeather(): ?string
    {
        return $this->favouriteWeather;
    }

    public function setFavouriteWeather(string $favouriteWeather): self
    {
        $this->favouriteWeather = $favouriteWeather;

        return $this;
    }

    public function getMainLanguage(): ?string
    {
        return $this->mainLanguage;
    }

    public function setMainLanguage(string $mainLanguage): self
    {
        $this->mainLanguage = $mainLanguage;

        return $this;
    }

    public function getEnglish(): ?bool
    {
        return $this->english;
    }

    public function setEnglish(bool $english): self
    {
        $this->english = $english;

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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|City[]
     */
    public function getIdCity(): Collection
    {
        return $this->idCity;
    }

    public function addIdCity(City $idCity): self
    {
        if (!$this->idCity->contains($idCity)) {
            $this->idCity[] = $idCity;
        }

        return $this;
    }

    public function removeIdCity(City $idCity): self
    {
        $this->idCity->removeElement($idCity);

        return $this;
    }

}
