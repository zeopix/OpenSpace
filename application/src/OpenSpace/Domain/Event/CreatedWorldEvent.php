<?php
namespace OpenSpace\Domain\Event;

class CreatedWorldEvent extends DomainEvent
{
    public $id;
    public $galaxy;
    public $system;
    public $planet;
    public $user;

    public function getEventName()
    {
        return 'CreatedWorld';
    }
}