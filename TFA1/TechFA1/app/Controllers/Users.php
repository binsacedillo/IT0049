<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\HTTP\RedirectResponse;
use Config\Services;
use Throwable;

class Users extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();

        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $userModel->orderBy('id', 'ASC')->findAll(),
        ]);
    }

    public function new(): string
    {
        helper('form');

        return view('users/new', ['title' => 'New User']);
    }

    public function create(): RedirectResponse
    {
        if (! $this->validate($this->userRules())) {
            return $this->redirectTo('/users/new')->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $userModel->insert($this->userData() + ['created_at' => date('Y-m-d H:i:s')]);

        return $this->redirectTo('/users')->with('success', 'User account created.');
    }

    public function edit(int $id): string
    {
        helper('form');

        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        return view('users/edit', [
            'title' => 'Edit User',
            'user'  => $user,
        ]);
    }

    public function update(int $id): RedirectResponse
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        $avatar = $this->request->getFile('avatar');
        $hasAvatar = $avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE;
        $rules = $this->userRules($id);

        if ($hasAvatar) {
            $rules['avatar'] = 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|ext_in[avatar,jpg,jpeg,png]|max_size[avatar,2048]';
        }

        if (! $this->validate($rules)) {
            return $this->redirectTo("/users/{$id}/edit")->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->userData();

        if ($hasAvatar) {
            try {
                $data['avatar'] = $this->prepareAvatar($avatar);
            } catch (Throwable) {
                return $this->redirectTo("/users/{$id}/edit")->withInput()->with('errors', [
                    'avatar' => 'The avatar could not be prepared. Please try another JPG or PNG image.',
                ]);
            }
        }

        $userModel->update($id, $data);

        return $this->redirectTo('/users')->with('success', 'User account updated.');
    }

    /** @return array<string, string> */
    private function userRules(?int $id = null): array
    {
        $usernameRule = 'required|max_length[50]|is_unique[users.username]';

        if ($id !== null) {
            $usernameRule = "required|max_length[50]|is_unique[users.username,id,{$id}]";
        }

        return [
            'username'  => $usernameRule,
            'full_name' => 'required|max_length[100]',
            'role'      => 'required|max_length[50]',
        ];
    }

    /** @return array<string, string> */
    private function userData(): array
    {
        return [
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'role'      => trim((string) $this->request->getPost('role')),
        ];
    }

    private function prepareAvatar(UploadedFile $avatar): string
    {
        $uploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars';

        if (! is_dir($uploadPath) && ! mkdir($uploadPath, 0775, true) && ! is_dir($uploadPath)) {
            throw new \RuntimeException('Unable to create the avatar upload directory.');
        }

        $filename = $avatar->getRandomName();

        Services::image()
            ->withFile($avatar->getTempName())
            ->fit(300, 300, 'center')
            ->save($uploadPath . DIRECTORY_SEPARATOR . $filename, 85);

        return $filename;
    }

    private function redirectTo(string $path): RedirectResponse
    {
        $response = redirect();
        $response->setHeader('Location', $path);
        $response->setStatusCode(303);

        return $response;
    }
}
