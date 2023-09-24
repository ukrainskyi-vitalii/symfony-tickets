<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'schedules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?RouteStation $routeStation = null;

    #[ORM\ManyToOne(inversedBy: 'schedules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DepartureTime $departureTime = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRouteStation(): ?RouteStation
    {
        return $this->routeStation;
    }

    public function setRouteStation(?RouteStation $routeStation): static
    {
        $this->routeStation = $routeStation;

        return $this;
    }

    public function getDepartureTime(): ?DepartureTime
    {
        return $this->departureTime;
    }

    public function setDepartureTime(?DepartureTime $departureTime): static
    {
        $this->departureTime = $departureTime;

        return $this;
    }
}
