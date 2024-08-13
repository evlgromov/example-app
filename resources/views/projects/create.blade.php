@extends('layouts.base')

@section('page.title', 'Создание проекта')

@section('content')
    <h2>Создание проекта</h2>

    <form action="#">
        <label for="name">Имя проекта</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="is_active">Владелец</label><br>
        <input type="number" id="user_id" name="user_id"><br>
        <label for="is_active">Активность</label><br>
        <input type="text" id="is_active" name="is_active"><br>
        <label for="is_active">Ответственный</label><br>
        <input type="number" id="assignee_id" name="assignee_id"><br>
        <label for="deadline_date">Дэдлайн</label><br>
        <input type="number" id="deadline_date" name="deadline_date"><br><br>
        <input type="submit" value="Submit">
    </form>
@endsection
