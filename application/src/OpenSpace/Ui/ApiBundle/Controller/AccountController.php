<?php

namespace OpenSpace\Ui\ApiBundle\Controller;

use OpenSpace\Command\CreateTaskCommand;
use OpenSpace\Query\Repository\TaskViewModelRepositoryInterface;
use OpenSpace\Ui\SharedBundle\Util\ControllerUtils;
use OpenSpace\Ui\WebBundle\Form\Type\CreateTaskCommandType;
use Symfony\Component\HttpFoundation\Request;

class AccountController
{
    private $utils;
    private $taskViewModelRepository;

    public function __construct(ControllerUtils $utils, TaskViewModelRepositoryInterface $taskViewModelRepository)
    {
        $this->utils = $utils;
        $this->taskViewModelRepository = $taskViewModelRepository;
    }

    public function tasksAction(Request $request)
    {
        $createTaskCommand = new CreateTaskCommand();
        $form = $this->utils->createForm(new CreateTaskCommandType(), $createTaskCommand);

        return $this->utils->render('OpenSpaceUiWebBundle:Task:tasks.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}