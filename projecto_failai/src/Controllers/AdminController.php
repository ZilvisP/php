<?php

namespace Mod\Controllers;

use Mod\Authenticator;
use Mod\Exceptions\UnauthenticatedException;
use Mod\HtmlRender;
use Mod\Request;
use Mod\Response;

class AdminController extends BaseController
{
    private Authenticator $authenticator;
    // BAD PRACTICE: DI metu priskirti numatytasias (Default) reiksmes
    public function __construct(Authenticator $authenticator = null)
    {
        $this->authenticator = $authenticator ?? new Authenticator();
        parent::__construct();
    }

    /**
     * @throws UnauthenticatedException
     */
    public function index(): Response
    {
        if (!$this->authenticator->isLoggedIn()) {
            throw new UnauthenticatedException();
        }

        return $this->response('ADMIN puslapis');
    }

    /**
     * @throws UnauthenticatedException
     */
    public function login(Request $request): Response
    {
        $userName = $request->get('username');
        $password = $request->get('password');

        if(empty($userName) && empty($password)) {
            return $this->redirect('/', ['message' => 'Nesupildyti prisijungimo duomenys']);
        }

        $this->authenticator->login($userName, $password);
        return $this->redirect('/admin', ['message' => 'Sveikiname prisijungus']);
    }

    public function logout(): Response
    {
        $this->authenticator->logout();
        return $this->redirect('/', ['message' => 'Sveikiname atsijungus']);
    }
}