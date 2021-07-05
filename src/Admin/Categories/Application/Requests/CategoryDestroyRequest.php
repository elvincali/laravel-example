<?php

namespace Src\Admin\Categories\Application\Requests;

use Src\Admin\Categories\Domain\Models\Category;
use Src\Support\Application\Requests\BaseFormRequest;
use Src\Support\Domain\Traits\ExistResource;

class CategoryDestroyRequest extends BaseFormRequest
{
    use ExistResource;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $id = $this->route('id');
        if (!$this->existResource(Category::class, $id)) return false;

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
