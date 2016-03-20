<?php
namespace OpenSpace\Query\Repository;
use OpenSpace\Query\ViewModel\WorldViewModel;
use OpenSpace\Query\ViewModel\WorldViewModelCollection;
interface WorldViewModelRepositoryInterface
{
    /**
     * Inserts or updates a view in the database
     *
     * @param WorldViewModel $worldViewModel
     * @return void
     */
    function save(WorldViewModel $worldViewModel);
    /**
     * Fetches a WorldViewModel by its World ID
     *
     * @param string $id
     * @return WorldViewModel|null
     */
    function getByWorldId($id);
    /**
     * Returns a WorldViewModel collection
     *
     * @param int    $offset
     * @param int    $limit
     * @return WorldViewModelCollection
     */
    function getList($offset, $limit);
}