<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    // Anyone can read this page
    public function index()
    {
        $model = new TaskModel();
        // Load only unarchived tasks for our public dashboards
        $data['tasks'] = $model->getActiveTasks(); 
        return view('tasks/index', $data);
    }

    // New Task Form Layout - (Protected via AuthFilter)
    public function new()
    {
        return view('tasks/create');
    }

    // Process Form Input Insertion - (Protected via AuthFilter)
    public function create()
    {
        $model = new TaskModel();

        $rules = [
            'title'     => 'required',
            'task_date' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $model->save([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
            'status'      => 'Pending'
        ]);

        return redirect()->to('/tasks')->with('success', 'Task added successfully!');
    }

    public function edit($id)
    {
        $model = new TaskModel();
        $data['task'] = $model->find($id);

        if (!$data['task'] || $data['task']['is_archived'] == 1) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        $model = new TaskModel();

        $rules = [
            'title'     => 'required',
            'task_date' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $model->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('/tasks')->with('success', 'Task updated successfully!');
    }

    public function delete($id)
    {
        $model = new TaskModel();
        
        $model->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks')->with('success', 'Task archived successfully.');
    }
}
