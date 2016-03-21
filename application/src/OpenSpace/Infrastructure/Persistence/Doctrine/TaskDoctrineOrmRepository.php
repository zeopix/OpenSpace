<?php

namespace OpenSpace\Infrastructure\Persistence\Doctrine;

use OpenSpace\Domain\Model\Task;
use OpenSpace\Domain\Repository\TaskRepositoryInterface;
use Doctrine\ORM\EntityManager;

class TaskDoctrineOrmRepository implements TaskRepositoryInterface
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
    public function add(Task $task)
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