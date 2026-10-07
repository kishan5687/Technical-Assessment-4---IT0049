<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data['users'] = [
            ['username' => 'admin_raina', 'name' => 'Raina Quejada', 'role' => 'Administrator'],
            ['username' => 'cashier_franc', 'name' => 'Franc Huab', 'role' => 'Cashier'],
            ['username' => 'manager_vikki', 'name' => 'Vikki Santiago', 'role' => 'Manager'],
            ['username' => 'cashier_antonio', 'name' => 'Antonio Sta. Ana', 'role' => 'Cashier'],
            ['username' => 'stock_kishan', 'name' => 'Kishan Lazaro', 'role' => 'Inventory Clerk']
        ];

        return view('users/index', $data);
    }
}
