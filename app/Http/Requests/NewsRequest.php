<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'headline' => 'nullable',
            'title' => 'nullable',
            'service' => 'nullable',
            'tag' => 'nullable',
            'description' => 'nullable',
            'external_link' => 'nullable',
            'content' => 'nullable',
            'voice' => 'nullable',
            'video' => 'nullable',
            'image' => 'nullable',
            'news_type' => 'nullable',
            'news_production_type' => 'nullable',
            'news_source' => 'nullable',
            'news_source_address' => 'nullable',
            'message_end_news' => 'nullable',
            'company' => 'nullable',
            'author' => 'nullable',
            'journalist' => 'nullable',
            'photographer' => 'nullable',
            'translator' => 'nullable',
            'writer' => 'nullable',
            'published_at' => 'nullable',
        ];
    }
}
