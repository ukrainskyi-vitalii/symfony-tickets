<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StationRepository::class)]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\ManyToOne(inversedBy: 'stations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $city = null;

    #[ORM\OneToMany(mappedBy: 'station', targetEntity: RouteStation::class)]
    private Collection $routeStations;

    #[ORM\OneToMany(mappedBy: 'station', targetEntity: DepartureTime::class, orphanRemoval: true)]
    private Collection $departureTimes;

    public function __construct()
    {
        $this->routeStations = new ArrayCollection();
        $this->departureTimes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): static
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection<int, RouteStation>
     */
    public function getRouteStations(): Collection
    {
        return $this->routeStations;
    }

    public function addRouteStation(RouteStation $routeStation): static
    {
        if (!$this->routeStations->contains($routeStation)) {
            $this->routeStations->add($routeStation);
            $routeStation->setStation($this);
        }

        return $this;
    }

    public function removeRouteStation(RouteStation $routeStation): static
    {
        if ($this->routeStations->removeElement($routeStation)) {
            // set the owning side to null (unless already changed)
            if ($routeStation->getStation() === $this) {
                $routeStation->setStation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DepartureTime>
     */
    public function getDepartureTimes(): Collection
    {
        return $this->departureTimes;
    }

    public function addDepartureTime(DepartureTime $departureTime): static
    {
        if (!$this->departureTimes->contains($departureTime)) {
            $this->departureTimes->add($departureTime);
            $departureTime->setStation($this);
        }

        return $this;
    }

    public function removeDepartureTime(DepartureTime $departureTime): static
    {
        if ($this->departureTimes->removeElement($departureTime)) {
            // set the owning side to null (unless already changed)
            if ($departureTime->getStation() === $this) {
                $departureTime->setStation(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->city . ' - ' . $this->name;
    }
}
