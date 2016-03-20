<?php
namespace OpenSpace\Query\EventHandler;
use OpenSpace\Query\ViewModel\WorldViewModel;
use OpenSpace\Query\Repository\WorldViewModelRepositoryInterface;
use OpenSpace\Domain\Event\CreatedWorldEvent;

class WorldViewModelUpdateEventHandler
{
    private $worldViewModelRepository;
    /**
     * Constructor
     *
     * @param WorldViewModelRepositoryInterface $worldViewModelRepository
     */
    public function __construct(WorldViewModelRepositoryInterface $worldViewModelRepository)
    {
        $this->worldViewModelRepository = $worldViewModelRepository;
    }
    /**
     * CreatedWorld event handling
     *
     * @param CreatedWorldEvent $event
     */
    public function onCreatedWorld(CreatedWorldEvent $event)
    {
        $worldViewModel = new WorldViewModel(array(
            'id' => (string) $event->id,
            'galaxy' => $event->galaxy,
            'system' => $event->system,
            'planet' => $event->planet,
            'user' => $event->user,
        ));
        $this->worldViewModelRepository->save($worldViewModel);
    }
}
