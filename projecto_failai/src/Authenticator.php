<?php

namespace Mod;
use Exception;
use Mod\Exceptions\UnauthenticatedException;

class Authenticator
{
    public function authenticate(string|null $userName, string|null $password): bool
    {
        return $this->isLoggedIn() || !empty($userName) && !empty($password) && $this->login($userName, $password);
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return isset($_SESSION['logged']) && $_SESSION['logged'] === true;
    }

    /**
     * @param string $checkUser
     * @param string $checkPass
     * @return bool
     * @throws UnauthenticatedException
     */
    public function login(string $checkUser, string $checkPass): bool
    {
        $loginsMas = [
            'admin' => 'slapta',
            'tautiz' => 'pass',
        ];

        foreach ($loginsMas as $username => $pass) {
            if ($checkUser === $username && $checkPass === $pass) {
                $_SESSION['logged'] = true;
                $_SESSION['username'] = $checkUser ?? $_SESSION['username'];
                return true;
            }
        }

        throw new UnauthenticatedException();
    }
}

//elseif ($checkUser !== $username || $checkPass !== $pass) {
//$output = new \Mod\Output();
////                $fal = $output->store('Oi nutiko klaida! Bandyk vėliau dar karta.');
//$output->store('Neteisingi prisijungimo duomenys');
//catch (Exception $e) {
//$output->store('Oi nutiko klaida! Bandyk vėliau dar karta.');
//$log->error($e->getMessage());


//class Authenticator
//{
//public function __construct()
//{
//}
//public function authenticate(mixed $userName, mixed $password) {
//    if(isset($_SESSION['logged']) && $_SESSION['logged'] === true
//        ||
//        ($userName === 'admin' && $password === 'slapta')
//        ||
//        ($userName === 'zilvis' && $password === 'pilvis'))
//    {
//        return true;
//    }
//    return false;
//}
//}