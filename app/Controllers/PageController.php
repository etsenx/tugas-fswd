<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public function home()
    {
        $profileModel = new \App\Models\ProfileModel();
        $data['profiles'] = $profileModel->findAll();
        return view('home', $data);
    }
    public function about()
    {
        return view('about');
    }
    public function login()
    {
        return view('login');
    }
    public function test()
    {
        return view('test');
    }
}
