<?php
namespace OpenSpace\Domain\Handler;

use OpenSpace\Command\CreatePlayerCommand;
use OpenSpace\Domain\Model\Player;
use OpenSpace\Domain\Repository\PlayerRepositoryInterface;
use LiteCQRS\Bus\IdentityMapInterface;

class PlayerHandler implements PlayerHandlerInterface
{
    protected $identityMap;
    protected $playerRepository;
    public function __construct(IdentityMapInterface $identityMap, PlayerRepositoryInterface $playerRepository)
    {
        $this->identityMap = $identityMap;
        $this->playerRepository = $playerRepository;
    }
    public function createPlayer(CreatePlayerCommand $command)
    {
        // TODO: Factory ?
        $player = new Player();
        $this->identityMap->add($player);
        $player->create($command->id, $command->username, $command->password, $command->email);
        $this->playerRepository->add($player);
    }
}