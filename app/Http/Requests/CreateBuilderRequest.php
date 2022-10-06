<?php

namespace App\Http\Requests;

use App\Models\Language;
use App\Models\Builder;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Speak;

class CreateBuilderRequest extends FormRequest
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
        $extend_rules=[];

        $id=0;
        return Builder::rules($id, $extend_rules);
    }
}
