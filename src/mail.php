<?php
/**
* Class Mail
*
*/
class Mail {
    /**
    * Indicates if the connection to the mail server requires authentication
    * @var <boolean>
    */
    private $authentication;

    /**
    * Indicates the host where the connection to the mail server will be made.
    * @var <string>
    */
    private $host;

    /**
    * Specifies the user to be used for authentication with the mail server.
    * @var <string>
    */
    private $user;

    /**
    * Specifies the password to be used for authentication with the mail server.
    * @var <string>
    */
    private $password;

    protected $to;
    protected $subject;
    protected $message;

    public function __construct($authentication, $host, $user = null, $password = null) {
        $this->authentication = $authentication;
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }

    /**
    * Send the email
    * @param <string> $to Is the recipient's email address
    * @param <string> $subject This is the subject of the message.
    * @param <string> $body Is the message body
    * @param <boolean> $is_html Indicates if the message body is in html format
    * @param <array> $para_cc An array of email addresses for Cc copy.
    * @param <array> $para_bcc An array of email addresses for copy Bcc
    * @return <boolean> Returns true if email is sent and throws an exception on failure
    */
    protected function sendEmail($to, $subject, $body, $is_html = false, Array $para_cc = array() , Array $para_bcc = array())
    {
        //... Sends the email and returns true if everything went well or throws an exception if it fails
    }

    protected function print($to, $subject, $body, $is_html = false, Array $para_cc = array() , Array $para_bcc = array()) {
        echo "Email sent to $to";
        echo "<br>";
        echo "Subject: $subject";
        echo "<br>";
        echo "Body: $body";
        echo "<hr><br>";
    }
}

class RegistrationMail extends Mail {
    public function __construct($to, $name) {
        parent::__construct(true, '192.168.1.66', 'registration', 'r3g1str0');
        $this->to = $to;
        $this->subject = 'Registration';
        $this->message = "
            <p>Welcome <strong>$name</strong>,<br>
            your registration has been successfully completed.<p>
            <p>We hope that our services will be to your liking</p>
            <p>Best regards</p>
        ";
    }

    public function send() {
        // parent::print($this->to, $this->subject, $this->message, true); // Uncomment to print out to web page
        parent::sendEmail($this->to, $this->subject, $this->message, true);
    }
}

class UnsubscribeMail extends Mail {
    public function __construct($to) {
        parent::__construct(true, '192.168.33', 'user', 'pAss12345');
        $this->to = $to;
        $this->subject = 'Unsubscribe';
        $this->message = "You have been unsubscribed from our mailing list.\n";
    }

    public function send() {
        // parent::print($this->to, $this->subject, $this->message, true); // Uncomment to print out to web page
        parent::sendEmail($this->to, $this->subject, $this->message, true);
    }
}

class PasswordReminderMail extends Mail {
    public function __construct($to, $username, $password) {
        parent::__construct(false, '192.168.22');
        $this->to = $to;
        $this->subject = 'Password Reminder';
        $this->message = "
            Dear user,\n
            we remind you that your access data are as follows:\n
            user: $username\n
            password: $password\n
            Best regards.\n
        ";
    }

    public function send() {
        // parent::print($this->to, $this->subject, $this->message, false); // Uncomment to print out to web page
        parent::sendEmail($this->to, $this->subject, $this->message, false);
    }
}

$registrationEmail = new RegistrationMail('example@example.com', 'John Doe');
$registrationEmail->send();

$unsubscribeEmail = new UnsubscribeMail('example@example.com');
$unsubscribeEmail->send();

$passwordReminderEmail = new PasswordReminderMail('example@example.com', 'JohnDoe', 'NewPassword123');
$passwordReminderEmail->send();
?>

<div>
    <a href="/">Back</a>
</div>
