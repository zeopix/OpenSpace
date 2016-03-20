<?php
namespace OpenSpace\Domain\Handler;

use OpenSpace\Command\CreatePlayerCommand;

interface PlayerHandlerInterface
{
    function createPlayer(CreatePlayerCommand $command);
}