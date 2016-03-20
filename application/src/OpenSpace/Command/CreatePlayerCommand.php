<?php

namespace OpenSpace\Command;

use LiteCQRS\DefaultCommand;

class CreatePlayerCommand extends DefaultCommand
{
    public $id;
    public $username;
    public $password;
    public $email;
}