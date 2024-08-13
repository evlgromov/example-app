@extends('layouts.base')

@section('page.title', 'Редактирование проекта')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <x-card>
                <x-card-header>
                    <x-card-title>Редактирование проекта</x-card-title>
                </x-card-header>

                <x-card-body>
                    <form action="{{ route('projects.store') }}">
                        <label for="name" class="mb-1">Имя проекта</label><br>
                        <input class="form-control" type="text" id="name" name="name" value="{{ $project['name'] }}"><br>
                        <label for="is_active" class="mb-1">Владелец</label><br>
                        <input class="form-control" type="number" id="user_id" name="user_id" value="{{ $project['user_id'] }}"><br>
                        <label for="is_active" class="mb-1">Активность</label><br>
                        <input class="form-control" type="text" id="is_active" name="is_active" value="{{ $project['is_active'] }}"><br>
                        <label for="is_active" class="mb-1">Ответственный</label><br>
                        <input class="form-control" type="number" id="assignee_id" name="assignee_id" value="{{ $project['assignee_id'] }}"><br>
                        <label for="deadline_date" class="mb-1">Дэдлайн</label><br>
                        <input class="form-control" type="number" id="deadline_date" name="deadline_date" value="{{ $project['deadline_date'] }}"><br><br>
                        <input class="btn btn-primary" type="submit" value="Сохранить">
                    </form>
                </x-card-body>
            </x-card>
        </div>
    </div>
@endsection
