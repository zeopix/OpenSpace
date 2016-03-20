<?php
namespace OpenSpace\Domain\Repository;

use OpenSpace\Domain\Model\World;

interface WorldRepositoryInterface
{
    /**
     * Adds one World to the repository
     *
     * @param World $task
     * @return void
     */
    function add(World $task);
    /**
     * Fetch one World by its ID (Uuid)
     *
     * @param string $id
     * @return World|null
     */
    function get($id);
}