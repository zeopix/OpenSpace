<?php
namespace OpenSpace\Query\EventHandler;
use OpenSpace\Query\ViewModel\PlayerViewModel;
use OpenSpace\Query\Repository\PlayerViewModelRepositoryInterface;
use OpenSpace\Domain\Event\CreatedPlayerEvent;

class PlayerViewModelUpdateEventHandler
{
    private $playerViewModelRepository;
    /**
     * Constructor
     *
     * @param PlayerViewModelRepositoryInterface $playerViewModelRepository
     */
    public function __construct(PlayerViewModelRepositoryInterface $playerViewModelRepository)
    {
        $this->playerViewModelRepository = $playerViewModelRepository;
    }
    /**
     * CreatedPlayer event handling
     *
     * @param CreatedPlayerEvent $event
     */
    public function onCreatedPlayer(CreatedPlayerEvent $event)
    {
        $playerViewModel = new PlayerViewModel(array(
            'id' => (string) $event->id,
            'username' => $event->username,
            'password' => $event->password,
            'email' => $event->email,
        ));
        $this->playerViewModelRepository->save($playerViewModel);
    }
}
