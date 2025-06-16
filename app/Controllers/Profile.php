<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use CodeIgniter\Controller;

class Profile extends Controller
{
    protected $profileModel;
    protected $session;
    protected $helpers = ['form', 'url'];
    public function __construct()
    {
        $this->profileModel = new ProfileModel();
        $this->session = session();
    }
    // Tampilkan daftar profile
    public function index()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('/login');
        }
        $data['profiles'] = $this->profileModel->findAll();
        return view('profile/index', $data);
    }
    // Form input profile
    public function create()
    {
        return view('profile/create');
    }

    // Simpan data profile
    public function store()
    {
        $file = $this->request->getFile('photo');
        // Upload foto jika ada
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/photos', $newName);
        } else {
            $newName = null;
        }
        $this->profileModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'study_program' => $this->request->getPost('study_program'),
            'photo' => $newName,
            'instagram' => $this->request->getPost('instagram'),
            'youtube' => $this->request->getPost('youtube'),
            'tiktok' => $this->request->getPost('tiktok'),
        ]);
        return redirect()->to('/profile')->with('success', 'Data berhasil ditambahkan');
    }
    // Form edit
    public function edit($id)
    {
        $data['profile'] = $this->profileModel->find($id);
        return view('profile/edit', $data);
    }
    // Update data
    public function update($id)
    {
        $file = $this->request->getFile('photo');
        $profile = $this->profileModel->find($id);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/photos', $newName);
            if ($profile['photo']) {
                @unlink('uploads/photos/' . $profile['photo']);
            }
        } else {
            $newName = $profile['photo'];
        }
        $this->profileModel->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'study_program' => $this->request->getPost('study_program'),
            'photo' => $newName,
            'instagram' => $this->request->getPost('instagram'),
            'youtube' => $this->request->getPost('youtube'),
            'tiktok' => $this->request->getPost('tiktok'),
        ]);
        return redirect()->to('/profile')->with('success', 'Data berhasil diupdate');
    }
    // Hapus data
    public function delete($id)
    {
        $profile = $this->profileModel->find($id);
        if ($profile && $profile['photo']) {
            @unlink('uploads/photos/' . $profile['photo']);
        }
        $this->profileModel->delete($id);
        return redirect()->to('/profile')->with('success', 'Data berhasil dihapus');
    }
}
