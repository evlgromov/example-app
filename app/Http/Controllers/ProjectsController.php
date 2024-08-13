<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Список проектов
     *
     * GET /projects
     */
    public function index()
    {
        $projects = [
          [
              'id' => 1,
              'user_id' => 2,
              'name' => 'Project #1',
              'is_active' => true,
              'created_at' => "2024-08-13 08:00:00",
              'assignee_id' => null,
              'deadline_date' => "2024-08-15",
          ], [
                'id' => 2,
                'user_id' => 2,
                'name' => 'Project #2',
                'is_active' => true,
                'created_at' => "2024-08-13 08:00:00",
                'assignee_id' => null,
                'deadline_date' => "2024-08-15",
            ]
        ];
        return view('projects.index', compact('projects'));
    }

    /**
    * Форма создания проекта
    *
    * GET /projects/create
    */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Сохранение созданного проекта
     *
     * POST /projects
     */
    public function store(Request $request)
    {
        return "Сохранение созданного проекта";
    }

    /**
     * Страница проекта
     *
     * GET /projects/{id}
     */
    public function show(string $id)
    {
        $project = [
            'id' => 1,
            'user_id' => 2,
            'name' => 'Project #1',
            'is_active' => true,
            'created_at' => "2024-08-13 08:00:00",
            'assignee_id' => null,
            'deadline_date' => "2024-08-15",
        ];

        return view('projects.show', compact('project'));
    }

    /**
     * Форма редактирования проекта
     *
     * GET /projects/{id}/edit
     */
    public function edit(string $id)
    {
        $project = [
            'id' => 1,
            'user_id' => 2,
            'name' => 'Project #1',
            'is_active' => true,
            'created_at' => "2024-08-13 08:00:00",
            'assignee_id' => null,
            'deadline_date' => "2024-08-15",
        ];

        return view('projects.edit', compact('project'));
    }

    /**
     * Сохранение редактируемого проекта
     *
     * PUT /users/{username}
     */
    public function update(Request $request, string $id)
    {
        return "Сохранение редактируемого проекта";
    }

    /**
     * Удаление проекта
     *
     * DELETE /projects/{id}
     */
    public function destroy(string $id)
    {
        return "Удаление проекта";
    }
}
