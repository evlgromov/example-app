<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
}
