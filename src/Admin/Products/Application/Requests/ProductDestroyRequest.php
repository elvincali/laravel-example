<?php

namespace Src\Admin\Products\Application\Requests;

use Src\Admin\Products\Domain\Models\Product;
use Src\Support\Application\Requests\BaseFormRequest;
use Src\Support\Domain\Traits\ExistResource;

class ProductDestroyRequest extends BaseFormRequest
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
        if (!$this->existResource(Product::class, $id)) return false;

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
