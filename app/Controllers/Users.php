<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || (time() - $session->get('last_activity')) > 300) {
            $session->destroy();
            return redirect()->to('/login');
        }
        $session->set('last_activity', time());

        $model = new UserModel();
        $data['users'] = $model->findAll();
        $data['validation'] = \Config\Services::validation();
//        return view('layout/header');
        return view('users', $data);
    }

    public function save()
    {
        helper(['form']);
        $rules = [
            'tuser_nombre' => 'required|min_length[3]',
            'tuser_email' => 'required|valid_email|is_unique[toper_usuarios.tuser_email]',
            'tuser_pass' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/users')->withInput()->with('validation', $this->validator);
        }

        $model = new UserModel();
        $model->save([
            'tuser_nombre' => $this->request->getPost('tuser_nombre'),
            'tuser_email' => $this->request->getPost('tuser_email'),
            'tuser_pass' => md5($this->request->getPost('tuser_pass'))
        ]);

        return redirect()->to('/users');
    }

    public function update($id)
    {
        helper(['form']);

        $data = [
            'tuser_nombre' => $this->request->getPost('edit_nombre'),
            'tuser_email' => $this->request->getPost('edit_email')
        ];

        if ($this->request->getPost('edit_pass')) {
            $data['tuser_pass'] = md5($this->request->getPost('edit_pass'));
        }

        $model = new UserModel();
        $model->update($id, $data);

        return redirect()->to('/users');
    }
}
