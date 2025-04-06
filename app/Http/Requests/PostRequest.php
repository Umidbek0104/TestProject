<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'slug' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer',
            'video_url' => 'nullable|string',
        ];
    }
}
