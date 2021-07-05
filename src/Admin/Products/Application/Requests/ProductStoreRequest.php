<?php

namespace Src\Admin\Products\Application\Requests;

use Src\Support\Application\Requests\BaseFormRequest;

class ProductStoreRequest extends BaseFormRequest
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
            "name" => ["required"],
            "code" => ["required"],
            "price" => ["required", "numeric", "gt:0"],
            "comparison_price" => ["numeric", "gt:0"],
            "description" => ["nullable"],
            "unit_measure_id" => ["exists:unit_measure,id"],
            "category_id" => ["exists:categories,id"],
            "files_id" => ["array"],
        ];
    }
}
