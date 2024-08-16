@extends('layouts.base')

@section('page.title', 'Создание проекта')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <x-card>
                <x-card-header>
                    <x-card-title>Создание проекта</x-card-title>
                </x-card-header>
                <x-card-body>
                    <form action="{{ route('projects.store') }}" method="POST">
                        @csrf
                        <label for="name" class="mb-1">Имя проекта</label><br>
                        <input value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name">
                        @error('name')<div class="invalid-feedback">{{ $errors->first('name') }}</div>@enderror
                        <br>

                        <select class="form-select" aria-label="assignee_id" name="assignee_id">
                            <option selected value="">Ответственный</option>
                            @foreach($users as $user)
                                <option {{ old('assignee_id') == $user->id ? "selected" : "" }} value="{{ $user->id }}">{{ $user->username }}</option>
                            @endforeach
                        </select>
                        <br>

                        <label for="deadline_date" class="mb-1">Дэдлайн</label><br>
                        <input class="form-control @error('deadline_date') is-invalid @enderror" value="{{ old('deadline_date') }}" type="date" id="deadline_date" name="deadline_date">
                        @error('deadline_date')<div class="invalid-feedback">{{ $errors->first('deadline_date') }}</div>@enderror
                        <br>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" {{ old('is_active') == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Активность
                            </label>
                        </div>
                        <br><br>
                        <input class="btn btn-primary" type="submit" value="Сохранить">
                    </form>
                </x-card-body>
            </x-card>
        </div>
    </div>
@endsection
