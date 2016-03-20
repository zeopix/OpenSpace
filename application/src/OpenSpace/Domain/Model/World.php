<?php

namespace OpenSpace\Domain\Model;

use OpenSpace\Domain\Event\CreatedTaskEvent;
use LiteCQRS\DomainEventProvider;
use OpenSpace\Domain\Event\CreatedWorldEvent;
use Rhumsaa\Uuid\Uuid;

class World extends DomainEventProvider
{
    private $id;
    private $galaxy;
    private $system;
    private $planet;
    private $user;

    public function create($id, $galaxy, $system, $planet, $user)
    {
        $this->id = $id;
        $this->galaxy = $galaxy;
        $this->system = $system;
        $this->planet = $planet;
        $this->user = $user;


        $this->raise(new CreatedWorldEvent(array(
            'id' => $this->id,
            'galaxy' => $this->galaxy,
            'system' => $this->system,
            'planet' => $this->planet,
            'user' => $this->user,
        )));
    }
}