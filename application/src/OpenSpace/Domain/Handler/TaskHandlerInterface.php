<?php
namespace OpenSpace\Domain\Handler;
use OpenSpace\Command\CreateTaskCommand;
interface TaskHandlerInterface
{
    function createTask(CreateTaskCommand $command);
}