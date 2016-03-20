<?php
namespace OpenSpace\Domain\Event;

class CreatedPlayerEvent extends DomainEvent
{
    public $id;
    public $username;
    public $password;
    public $email;

    public function getEventName()
    {
        return 'CreatedPlayer';
    }
}