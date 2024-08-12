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
        return "Список проектов";
    }

    /**
    * Форма создания проекта
    *
    * GET /projects/create
    */
    public function create()
    {
        return "Форма создания проекта";
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
        return "Страница проекта";
    }

    /**
     * Форма редактирования проекта
     *
     * GET /projects/{id}/edit
     */
    public function edit(string $id)
    {
        return "Форма редактирования проекта";
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
