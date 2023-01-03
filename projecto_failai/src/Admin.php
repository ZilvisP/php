<?php
require_once 'EmailClient.php';
class Admin implements EmailClient

{
    use Logger;
    public function sendEmail()
    {
        $this->log("Email sent.");
    }
    public function getInbox() {
        $this->log("Email received");
    }

}
