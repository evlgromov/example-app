@extends('layouts.base')

@section('page.title', 'Список проектов')

@section('content')
    <h2>Список проектов</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Активность</th>
            <th>Создан</th>
            <th>Дэдлайн</th>
        </tr>
        @foreach($projects as $project)
            <tr>
                <td>{{ $project['id'] }}</td>
                <td>{{ $project['name'] }}</td>
                <td>{{ $project['is_active'] }}</td>
                <td>{{ $project['created_at'] }}</td>
                <td>{{ $project['deadline_date'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection