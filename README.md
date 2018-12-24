# Simple php tele2 newbsms sms sender

Sends sms from tele2 newbsms.tele2.ru

## Usage:
    (new Tele2SmsSender('login', 'password', 'sender'))
        ->message('79999999999', 'text');

## Returns:
    string id - 52c9d69e-078b-11e9-b4cc-0cc47aea8276
    
## Throws
    Tele2SmsSender\Exceptions\NotSent
