<?php
namespace OpenSpace\Domain\Handler;
use OpenSpace\Command\CreateTaskCommand;
use OpenSpace\Domain\Model\Task;
use OpenSpace\Domain\Repository\TaskRepositoryInterface;
use LiteCQRS\Bus\IdentityMapInterface;

class TaskHandler implements TaskHandlerInterface
{
    protected $identityMap;
    protected $taskRepository;
    public function __construct(IdentityMapInterface $identityMap, TaskRepositoryInterface $taskRepository)
    {
        $this->identityMap = $identityMap;
        $this->taskRepository = $taskRepository;
    }
    public function createTask(CreateTaskCommand $command)
    {
        // TODO: Factory ?
        $task = new Task();
        $this->identityMap->add($task);
        $task->invent($command->id, $command->content);
        $this->taskRepository->add($task);
    }
}