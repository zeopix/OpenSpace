<?php

namespace OpenSpace\Command;

use LiteCQRS\DefaultCommand;

class CreateTaskCommand extends DefaultCommand
{
    public $id;
    public $content;
}