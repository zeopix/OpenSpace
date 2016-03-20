<?php

namespace OpenSpace\Command;

use LiteCQRS\DefaultCommand;

class CreateWorldCommand extends DefaultCommand
{
    public $id;
    public $galaxy;
    public $system;
    public $planet;
    public $user;
}