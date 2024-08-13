@extends('layouts.base')

@section('page.title', 'Список проектов')

@section('content')
    <x-alert type="warning">
        <x-alert-title>Заголовок</x-alert-title>
        <x-alert-body>Текст сообщения</x-alert-body>
    </x-alert>

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
            <th>Дэдлайн</th>
        </tr>
        @foreach($projects as $project)
            <tr style="cursor: pointer;">
                <td>{{ $project['id'] }}</td>
                <td>{{ $project['name'] }}</td>
                <td>{{ $project['is_active'] }}</td>
                <td>{{ $project['created_at'] }}</td>
                <td>{{ $project['deadline_date'] }}</td>
                <td>
                    <a href="{{ route('projects.show', $project['id']) }}">Открыть</a>
                </td>
                <td>
                    <a href="{{ route('projects.edit', $project['id']) }}">Изменить</a>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
@endsection