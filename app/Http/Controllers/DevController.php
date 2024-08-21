<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DevController extends Controller
{
    public function index(Request $request, string $action = null)
    {
        if ($action === null) {
            $result = '<p>Available actions:</p><ul>';
            foreach (array_diff(get_class_methods($this), get_class_methods(Controller::class)) as $method) {
                if ($method !== 'index') {
                    $result .= '<li><a href="/dev/' . $method . '">' . $method . '</a></li>';
                }
            }

            return $result . '</ul>';
        }

        if (method_exists($this, $action)) {
            return $this->{$action}($request);
        }

        return null;
    }

    public function test()
    {
    }

    public function getDummyConfig() :array
    {
        return config('services.dummy_json');
    }

    /**
     * Добавляет 5 проектов со случайно сгенерированными данными
     */

    public function addProject(): RedirectResponse
    {
        $allUsersCount = User::count();

        for ($i = 0; $i < 5; $i++) {
            Project::create([
                'name' => fake()->name(),
                'user_id' => fake()->numberBetween(1, $allUsersCount),
                'is_active' => fake()->boolean(),
                'assignee_id' => fake()->numberBetween(1, $allUsersCount),
                'deadline_date' => fake()->date()
            ]);
        }
        return Redirect::route('projects.index');
    }

    /**
     * Получаем проекты админа с их владельцами
     */
    public function getAdminProjects(): array
    {
        $projects = User::where('role', 'admin')
            ->first()
            ->ownedProjects()
            ->with('assignee')
            ->get();

        return $projects;
    }

    /**
     * Все проекты с истекшим дедлайном, упорядоченные по возрастанию дедлайна.
     */
    public function getExpired(): array
    {
        $projects = Project::where('deadline_date', '<', date("Y-m-d"))
            ->orderBy('deadline_date', 'asc')
            ->get();

        return $projects;
    }

    /**
     *  Получаем случайный проект, и обновляем его настройки на случайно сгенерированные
     */

    public function updateRandom(): Project
    {
        $project = Project::inRandomOrder()->first();
        $allUsersCount = User::count();

        $project->update([
            'name' => fake()->name(),
            'user_id' => fake()->numberBetween(1, $allUsersCount),
            'is_active' => fake()->boolean(),
            'assignee_id' => fake()->numberBetween(1, $allUsersCount),
            'deadline_date' => fake()->date()
        ]);

        return $project;
    }

    /**
     *  Получаем три последних проекта; если текущий пользователь авторизован, то те, которые принадлежат текущему пользователю; если не авторизован — то кому-угодно.
     */

    public function getMyLatestThree(): JsonResponse
    {
        $query = Auth::check()
            ? Auth::user()->ownedProjects()
            : Project::all();

        $projects = $query
            ->orderByDesc('id')
            ->limit(3)
            ->get()
            ->toArray();

        return response()->json($projects);
    }

    /**
     *  Получаем список пользователей (их username) и кол-во проектов у каждого.
     */

    public function usersProjects(): JsonResponse
    {
        $projects = User::select('username')
            ->withCount('ownedProjects as projects_count')
            ->get();

        return response()->json($projects);
    }

    /**
     *  Получаем кол-во проектов с истекшим дедлайном.
     */

    public function getExpiredProjectsCount(): JsonResponse
    {
        $projects = Project::expired()->get();

        return response()->json($projects);
    }
}
