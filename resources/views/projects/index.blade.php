@extends('layouts.base')

@section('page.title', 'Список проектов')

@section('content')
    <h2>Список проектов</h2>

    @if(empty($projects))
        Нет ни одного проекта
    @else

    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Активность</th>
            <th>Создан</th>
            <th>Ответственный</th>
            <th>Дэдлайн</th>
        </tr>
        @foreach($projects as $project)
            <tr style="cursor: pointer;">
                <td>{{ $project['id'] }}</td>
                <td>{{ $project['name'] }}</td>
                <td>{{ $project['is_active'] ? "Да" : "Нет" }}</td>
                <td>{{ $project['created_at'] }}</td>
                <td>{{ $project['assignee'] !== null ? $project['assignee']->username : 'Нет'}}</td>
                <td>{{ $project['deadline_date'] }}</td>
                <td>
                    <a href="{{ route('projects.show', $project['id']) }}" class="btn btn-primary">Открыть</a>
                </td>
                <td>
                    <a href="{{ route('projects.edit', $project['id']) }}" class="btn btn-primary">Изменить</a>
                </td>
                <td>
                    <form method="POST" action="{{ route('projects.destroy', $project['id']) }}">
                        @csrf
                        @method('DELETE')

                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
@endsection