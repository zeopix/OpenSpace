<?php
namespace OpenSpace\Domain\Event;

class CreatedTaskEvent extends DomainEvent
{
    public $id;
    public $content;
    public function getEventName()
    {
        return 'CreatedTask';
    }
}