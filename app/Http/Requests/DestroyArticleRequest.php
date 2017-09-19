<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DestroyArticleRequest
 * @package App\Http\Requests
 * @property int $category
 * @property string $date
 */
class DestroyArticleRequest extends FormRequest
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
            'category' => 'required|numeric|exists:categories,id',
            'date' => 'required|date'
        ];
    }
}
