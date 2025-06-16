<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $profileModel = new \App\Models\ProfileModel();
        $data['totalProfiles'] = $profileModel->countAll();
        return view('dashboard/index', $data);
    }
}
