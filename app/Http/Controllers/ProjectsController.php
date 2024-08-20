<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::authorize('view', Project::class);

        $projects = Project::all();

        return view('projects.index', ['projects' => $projects]);
    }

    /**
    * Форма создания проекта
    *
    * GET /projects/create
    */
    public function create()
    {
        Gate::authorize('create', Project::class);

        $users = User::where('role', 'customer')->get();

        return view('projects.create', ['users' => $users]);
    }

    /**
     * Сохранение созданного проекта
     *
     * POST /projects
     */
    public function store(ProjectStoreRequest $request)
    {
        Gate::authorize('create', Project::class);

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
    public function show(Project $project)
    {
        Gate::authorize('view', $project);

        return view('projects.show', ['project' => $project]);
    }

    /**
     * Форма редактирования проекта
     *
     * GET /projects/{id}/edit
     */
    public function edit(Project $project)
    {
        Gate::authorize('update', $project);

        $users = User::where('role', 'customer')->get();

        return view('projects.edit', ['project' => $project, 'users' => $users]);
    }

    /**
     * Сохранение редактируемого проекта
     *
     * PUT /users/{username}
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        Gate::authorize('update', $project);

        $data = $request->validated();

        $project->update([
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
    public function destroy(Project $project)
    {
        Gate::authorize('delete', $project);

        $project->delete();

        return Redirect::route('projects.index');
    }
}
