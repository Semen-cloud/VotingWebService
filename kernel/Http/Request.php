<?php

namespace App\kernel\Http;


include_once (APP_PATH . '/kernel/Validator/ValidatorInterface.php');
include_once (APP_PATH . '/kernel/Validator/Validator.php');
include_once (APP_PATH . '/kernel/Http/RequestInterface.php');

use App\kernel\Validator\ValidatorInterface;

class Request implements RequestInterface
{
    private ValidatorInterface $validator;

    public function __construct(
        public readonly array $get,
        public readonly array $post,
        public readonly array $server,
        public readonly array $files,
        public readonly array $cookies,
    )
    {}

    public static function createFromGlobals() : static {
        return new static($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE);
    }

    public function uri() : string {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function method() : string {
        return $this->server['REQUEST_METHOD'];
    }

    public function input(string $key, $default = null) : mixed{
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function setValidator(ValidatorInterface $validator) : void{
        $this->validator = $validator;
    }

    public function validate(array $rules) : bool {
        $data = [];

        foreach ($rules as $field => $rule) {
            $data[$field] = $this->input($field);
        }

        return $this->validator->validate($data, $rules);
    }

    public function errors() : array {
        return $this->validator->errors();
    }
}