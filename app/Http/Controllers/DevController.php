<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
    /**
     * @var string
     */
    private string $domain;

    /**
     * @var string
     */
    private string $username;

    /**
     * @var string
     */
    private string $token;

    /**
     * @var string
     */
    private string $password;

    public function __construct()
    {
        $this->domain = env('DUMMY_JSON_DOMAIN');
        $this->username = env('DUMMY_JSON_USERNAME');
        $this->password = env('DUMMY_JSON_PASSWORD');
        $this->token = env('DUMMY_JSON_TOKEN');
    }

    public function index(Request $request, string $action = null)
    {
        if ($action === null) {
            $result = '<p>Available actions:</p><ul>';
            foreach (array_diff(get_class_methods($this), get_class_methods(Controller::class)) as $method) {
                if ($method !== 'index') {
                    $result .= '<li><a href="/dev/' . $method . '">' . $method . '</a></li>';
                }
            }

            return $result . '</ul>';
        }

        if (method_exists($this, $action)) {
            return $this->{$action}($request);
        }

        return null;
    }

    public function test()
    {
    }

    public function getDummyConfig() :array
    {
        return [
            'domain' => $this->domain,
            'token' => $this->token,
            'username' => $this->username,
            'password' => $this->password,
        ];
    }
}
