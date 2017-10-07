<?php namespace SendGrid\Helpers\Mail\Model;

class EmailAddress implements \JsonSerializable
{
    public $name;
    public $email;

    public function __construct($name = null, $emailAddress)
    {
        $this->name  = $name;
        $this->email = $emailAddress;
    }

    public function getEmail()
    {
        return $this->getEmailAddress();
    }

    public function getEmailAddress()
    {
        return $this->email;
    }

    public function setEmailAddress($emailAddress)
    {
        $this->email = $emailAddress;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function jsonSerialize()
    {
        return array_filter(
            [
                'name'  => $this->getName(),
                'email' => $this->getEmail()
            ],
            function ($value) {
                return $value !== null;
            }
        ) ?: null;
    }
}
