<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data['customers'] = [
            ['name' => 'Raina Quejada', 'email' => 'raina.quejada@email.com', 'phone' => '0917-123-4567'],
            ['name' => 'Franc Huab', 'email' => 'franc.huab@email.com', 'phone' => '0918-234-5678'],
            ['name' => 'Vikki Santiago', 'email' => 'vikki.santiago@email.com', 'phone' => '0919-345-6789'],
            ['name' => 'Antonio Sta. Ana', 'email' => 'antonio.stana@email.com', 'phone' => '0920-456-7890'],
            ['name' => 'Kishan Lazaro', 'email' => 'kishan.lazaro@email.com', 'phone' => '0921-567-8901']
        ];

        return view('customers/index', $data);
    }
}
