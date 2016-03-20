<?php

namespace OpenSpace\Ui\CliBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTaskCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('openspace:create-task')
            ->setHelp(<<<EOT
The <info>acme:demo:invent-a-joke</info> create a CreateTaskCommand and ask the command bus to handle it.
EOT
        )
            ->setDescription('Create a CreateTaskCommand and ask the command bus to handle it')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dialog = $this->getHelperSet()->get('dialog');


        $output->writeln('Your task was submitted.');
    }
}
