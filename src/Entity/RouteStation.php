<?php

namespace App\Entity;

use App\Repository\RouteStationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RouteStationRepository::class)]
class RouteStation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'routeStations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Route $route = null;

    #[ORM\ManyToOne(inversedBy: 'routeStations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Station $station = null;

    #[ORM\Column]
    private ?int $routeOrder = null;

    #[ORM\OneToMany(mappedBy: 'routeStation', targetEntity: Schedule::class, orphanRemoval: true)]
    private Collection $schedules;

    public function __construct()
    {
        $this->schedules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoute(): ?Route
    {
        return $this->route;
    }

    public function setRoute(?Route $route): static
    {
        $this->route = $route;

        return $this;
    }

    public function getStation(): ?Station
    {
        return $this->station;
    }

    public function setStation(?Station $station): static
    {
        $this->station = $station;

        return $this;
    }

    public function getRouteOrder(): ?int
    {
        return $this->routeOrder;
    }

    public function setRouteOrder(int $routeOrder): static
    {
        $this->routeOrder = $routeOrder;

        return $this;
    }

    /**
     * @return Collection<int, Schedule>
     */
    public function getSchedules(): Collection
    {
        return $this->schedules;
    }

    public function addSchedule(Schedule $schedule): static
    {
        if (!$this->schedules->contains($schedule)) {
            $this->schedules->add($schedule);
            $schedule->setRouteStation($this);
        }

        return $this;
    }

    public function removeSchedule(Schedule $schedule): static
    {
        if ($this->schedules->removeElement($schedule)) {
            // set the owning side to null (unless already changed)
            if ($schedule->getRouteStation() === $this) {
                $schedule->setRouteStation(null);
            }
        }

        return $this;
    }
}
