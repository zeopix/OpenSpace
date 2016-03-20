<?php
namespace OpenSpace\Domain\Handler;

use OpenSpace\Command\CreateWorldCommand;

interface WorldHandlerInterface
{
    function createWorld(CreateWorldCommand $command);
}