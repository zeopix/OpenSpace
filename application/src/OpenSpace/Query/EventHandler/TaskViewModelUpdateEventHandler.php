<?php
namespace OpenSpace\Query\EventHandler;
use OpenSpace\Query\ViewModel\TaskViewModel;
use OpenSpace\Query\Repository\TaskViewModelRepositoryInterface;
use OpenSpace\Domain\Event\CreatedTaskEvent;

class TaskViewModelUpdateEventHandler
{
    private $taskViewModelRepository;
    /**
     * Constructor
     *
     * @param TaskViewModelRepositoryInterface $taskViewModelRepository
     */
    public function __construct(TaskViewModelRepositoryInterface $taskViewModelRepository)
    {
        $this->taskViewModelRepository = $taskViewModelRepository;
    }
    /**
     * CreatedTask event handling
     *
     * @param CreatedTaskEvent $event
     */
    public function onCreatedTask(CreatedTaskEvent $event)
    {
        $taskViewModel = new TaskViewModel(array(
            'id' => (string) $event->id,
            'content' => $event->content,
        ));
        $this->taskViewModelRepository->save($taskViewModel);
    }
}
