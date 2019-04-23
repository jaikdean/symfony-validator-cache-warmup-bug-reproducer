<?php

namespace App\Controller;

use App\Foo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FooController {
    public function foo(ValidatorInterface $validator): Response
    {
        $foo = new Foo();

        /* Validating $foo causes the Foo validation metadata cache to be parsed
           and the validator cache written to, even if it's already been warmed */
        $validator->validate($foo);

        return new Response();
    }
}
