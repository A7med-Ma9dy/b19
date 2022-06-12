<?php

class chat {
    public $text;

    public function openChat()
    {
        echo "open chat<br>";
        return $this;
    }
    public function send()
    {
        echo "{$this->text}<br>";
        return $this;
    }
    public function closeChat()
    {
        echo "close chat<br>";
        return $this;
    }
}


$message = new chat;
$message->text = "Sorry!";

$message->openChat()->send()->closeChat()->openChat();
// $message->send();
// $message->closeChat();

// $message2 = new chat;
// $message2->openChat();
// $message2->text = "ok!";
// $message2->send();
// $message2->closeChat();

?>