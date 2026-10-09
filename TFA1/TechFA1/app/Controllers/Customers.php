<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;

class Customers extends BaseController
{
    public function index(): string
    {
        $customerModel = new CustomerModel();

        return view('customers/index', [
            'title'     => 'Customer Accounts',
            'customers' => $customerModel->orderBy('id', 'ASC')->findAll(),
        ]);
    }

    public function new(): string
    {
        helper('form');

        return view('customers/new', ['title' => 'New Customer']);
    }

    public function create(): RedirectResponse
    {
        if (! $this->validate($this->customerRules())) {
            return $this->redirectTo('/customers/new')->withInput()->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();
        $customerModel->insert($this->customerData() + ['created_at' => date('Y-m-d H:i:s')]);

        return $this->redirectTo('/customers')->with('success', 'Customer account created.');
    }

    public function edit(int $id): string
    {
        helper('form');

        $customerModel = new CustomerModel();
        $customer = $customerModel->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound('Customer not found.');
        }

        return view('customers/edit', [
            'title'    => 'Edit Customer',
            'customer' => $customer,
        ]);
    }

    public function update(int $id): RedirectResponse
    {
        $customerModel = new CustomerModel();

        if ($customerModel->find($id) === null) {
            throw PageNotFoundException::forPageNotFound('Customer not found.');
        }

        if (! $this->validate($this->customerRules())) {
            return $this->redirectTo("/customers/{$id}/edit")->withInput()->with('errors', $this->validator->getErrors());
        }

        $customerModel->update($id, $this->customerData());

        return $this->redirectTo('/customers')->with('success', 'Customer account updated.');
    }

    /** @return array<string, string> */
    private function customerRules(): array
    {
        return [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];
    }

    /** @return array<string, string> */
    private function customerData(): array
    {
        return [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')),
        ];
    }

    private function redirectTo(string $path): RedirectResponse
    {
        $response = redirect();
        $response->setHeader('Location', $path);
        $response->setStatusCode(303);

        return $response;
    }
}
