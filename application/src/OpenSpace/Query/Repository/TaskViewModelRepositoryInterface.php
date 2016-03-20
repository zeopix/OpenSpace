<?php
namespace OpenSpace\Query\Repository;
use OpenSpace\Query\ViewModel\TaskViewModel;
use OpenSpace\Query\ViewModel\TaskViewModelCollection;
interface TaskViewModelRepositoryInterface
{
    /**
     * Inserts or updates a view in the database
     *
     * @param TaskViewModel $taskViewModel
     * @return void
     */
    function save(TaskViewModel $taskViewModel);
    /**
     * Fetches a TaskViewModel by its Task ID
     *
     * @param string $id
     * @return TaskViewModel|null
     */
    function getByTaskId($id);
    /**
     * Returns a TaskViewModel collection
     *
     * @param int    $offset
     * @param int    $limit
     * @return TaskViewModelCollection
     */
    function getList($offset, $limit);
}