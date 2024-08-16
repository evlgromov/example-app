<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        $users = User::where('role', 'customer')->get();

        return view('projects.create', compact('users'));
    }

    /**
     * Сохранение созданного проекта
     *
     * POST /projects
     */
    public function store(ProjectStoreRequest $request)
    {
        $data = $request->validated();

        Project::create([
            'name' => $data['name'],
            'assignee_id' => $data['assignee_id'],
            'deadline_date' => $data['deadline_date'],
            'user_id' => auth()->id(),
            'is_active' => (bool) $request->boolean('is_active'),
        ]);

        return Redirect::route('projects.index');
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
        $users = User::where('role', 'customer')->get();

        return view('projects.edit', compact('project', 'users'));
    }

    /**
     * Сохранение редактируемого проекта
     *
     * PUT /users/{username}
     */
    public function update(ProjectUpdateRequest $request, string $id)
    {
        $data = $request->validated();

        Project::find($id)->update([
            'name' => $data['name'],
            'assignee_id' => $data['assignee_id'],
            'deadline_date' => $data['deadline_date'],
            'is_active' => (bool) $request->boolean('is_active'),
        ]);

        return Redirect::route('projects.index');
    }

    /**
     * Удаление проекта
     *
     * DELETE /projects/{id}
     */
    public function destroy(string $id)
    {
        Project::find($id)->delete();

        return Redirect::route('projects.index');
    }
}
