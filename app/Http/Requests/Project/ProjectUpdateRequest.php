<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'assignee_id' => 'sometimes|integer|nullable',
            'deadline_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Не заполнено имя',
            'deadline_date.required' => 'Не заполнено поле дэдлайн',
            'deadline_date.date' => 'Не правильный формат даты',
        ];
    }
}
