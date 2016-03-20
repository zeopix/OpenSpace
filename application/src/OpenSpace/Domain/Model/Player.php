<?php
namespace OpenSpace\Domain\Model;

use LiteCQRS\DomainEventProvider;
use OpenSpace\Domain\Event\CreatedPlayerEvent;
use Rhumsaa\Uuid\Uuid;

class Player extends DomainEventProvider
{
    private $id;
    private $username;
    private $password;
    private $email;

    /**
     * @param string $id
     * @param string $username
     * @param string $password
     * @param string $email
     */
    public function create($id, $username, $password, $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->password = $email;

        $this->raise(new CreatedPlayerEvent(array(
            'id' => $this->id,
            'username' => $this->username,
            'password' => $this->password,
            'email' => $this->email,
        )));
    }

}