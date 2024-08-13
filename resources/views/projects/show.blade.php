@extends('layouts.base')

@section('page.title', 'Просмотр проекта')

@section('content')
    <h2>Просмотр проекта</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Активность</th>
            <th>Создан</th>
            <th>Дэдлайн</th>
        </tr>
        <tr>
            <td>{{ $project['id'] }}</td>
            <td>{{ $project['name'] }}</td>
            <td>{{ $project['is_active'] }}</td>
            <td>{{ $project['created_at'] }}</td>
            <td>{{ $project['deadline_date'] }}</td>
        </tr>
    </table>
@endsection