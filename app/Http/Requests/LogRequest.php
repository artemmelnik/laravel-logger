<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function host(): ?string
    {
        return $this->get('host');
    }

    public function date(): ?string
    {
        return $this->get('date');
    }
}
