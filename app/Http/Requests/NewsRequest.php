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
            'title' => 'nullable|min:3|string',
            'category_id' => 'nullable',
            'tags' => 'nullable|string',
            'description' => 'nullable',
            'external_link' => 'nullable',
            'content' => 'nullable|min:10',
            'voice' => 'nullable|mp3,audio',
            'video' => 'nullable',
            'image' => 'nullable',
            'picture' => 'nullable|mimes:png,jpg,jpeg,svg',            
            'source_address' => 'nullable|string',
            'main_news' => 'nullable|boolean',
            'headline_news' => 'nullable|boolean',
            'magazine' => 'nullable|boolean',
        ];
    }

     /**
     * Prepare inputs for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'main_news' => $this->toBoolean($this->main_news),
            'headline_news' => $this->toBoolean($this->headline_news),
            'magazine' => $this->toBoolean($this->magazine),
        ]);
    }

    /**
     * Convert to boolean
     *
     * @param $booleable
     * @return boolean
     */
    private function toBoolean($booleable)
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}
