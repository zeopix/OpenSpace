<?php
namespace OpenSpace\Domain\Repository;

use OpenSpace\Domain\Model\Player;

interface PlayerRepositoryInterface
{
    /**
     * Adds one Player to the repository
     *
     * @param Player $task
     * @return void
     */
    function add(Player $task);
    /**
     * Fetch one Player by its ID (Uuid)
     *
     * @param string $id
     * @return Player|null
     */
    function get($id);
}