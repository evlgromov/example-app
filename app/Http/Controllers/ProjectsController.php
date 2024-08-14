<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
        $projects = auth()->user()->ownedProjects;

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
        $project = Project::find($id);

        return view('projects.show', compact('project'));
    }

    /**
     * Форма редактирования проекта
     *
     * GET /projects/{id}/edit
     */
    public function edit(string $id)
    {
        $project = Project::find($id);

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
