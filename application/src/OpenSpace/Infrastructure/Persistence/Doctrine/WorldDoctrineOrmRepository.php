<?php

namespace OpenSpace\Infrastructure\Persistence\Doctrine;

use OpenSpace\Domain\Model\World;
use OpenSpace\Domain\Repository\WorldRepositoryInterface;
use Doctrine\ORM\EntityManager;

class WorldDoctrineOrmRepository implements WorldRepositoryInterface
{
    /**
     * @var string
     */
    protected $class;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * Constructor
     *
     * @param EntityManager $entityManager
     * @param string        $class         User model class
     */
    public function __construct(EntityManager $entityManager, $class)
    {
        $this->em = $entityManager;
        $this->class = $class;
    }

    /**
     * {@inheritDoc}
     */
    public function add(World $task)
    {
        $this->em->persist($task);
        $this->em->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function get($id)
    {
        return $this->em->getRepository($this->class)->find($id);
    }
}