<?php
namespace OpenSpace\Domain\Handler;

use OpenSpace\Command\CreateWorldCommand;
use OpenSpace\Domain\Model\World;
use OpenSpace\Domain\Repository\WorldRepositoryInterface;
use LiteCQRS\Bus\IdentityMapInterface;

class WorldHandler implements WorldHandlerInterface
{
    protected $identityMap;
    protected $worldRepository;
    public function __construct(IdentityMapInterface $identityMap, WorldRepositoryInterface $worldRepository)
    {
        $this->identityMap = $identityMap;
        $this->worldRepository = $worldRepository;
    }
    public function createWorld(CreateWorldCommand $command)
    {
        $world = new World();
        $this->identityMap->add($world);

        $world->create(
            $command->id,
            $command->galaxy,
            $command->system,
            $command->planet,
            $command->user
        );

        $this->worldRepository->add($world);
    }
}