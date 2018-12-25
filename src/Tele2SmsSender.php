<?php


class Tele2SmsSender
{

    private const API_URL = 'http://newbsms.tele2.ru/api/send?';
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $sender;
    /**
     * @var string
     */
    private $login;

    public function __construct(string $login, string $password, string $sender)
    {

        $this->password = $password;
        $this->sender = $sender;
        $this->login = $login;
    }

    /**
     * @param string $receiver
     * @param string $text
     * @return string
     * @throws \Tele2SmsSender\Exceptions\NotSent
     */
    public function message(string  $receiver, string $text): string
    {
        return $this->requestToTele2(
            [
                'msisdn' => $receiver,
                'text' => $text,
                'shortcode' => $this->sender,
                'login' => $this->login,
                'password' => $this->password,
                'operation' => 'send'
            ]
        );
    }

    /**
     * @param array $query
     * @return string
     * @throws \Tele2SmsSender\Exceptions\NotSent
     */
    private function requestToTele2(array $query): string
    {
        $response = file_get_contents(
            self::API_URL . http_build_query($query),
            false
        );

        if(strlen($response) !== 36 || substr_count($response, '-') !== 4){
            throw new Tele2SmsSender\Exceptions\NotSent($response);
        }

        return $response;
    }
}
