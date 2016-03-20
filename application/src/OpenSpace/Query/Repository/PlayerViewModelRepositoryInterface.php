<?php
namespace OpenSpace\Query\Repository;
use OpenSpace\Query\ViewModel\PlayerViewModel;
use OpenSpace\Query\ViewModel\PlayerViewModelCollection;
interface PlayerViewModelRepositoryInterface
{
    /**
     * Inserts or updates a view in the database
     *
     * @param PlayerViewModel $playerViewModel
     * @return void
     */
    function save(PlayerViewModel $playerViewModel);
    /**
     * Fetches a PlayerViewModel by its Player ID
     *
     * @param string $id
     * @return PlayerViewModel|null
     */
    function getByPlayerId($id);
    /**
     * Returns a PlayerViewModel collection
     *
     * @param int    $offset
     * @param int    $limit
     * @return PlayerViewModelCollection
     */
    function getList($offset, $limit);
}