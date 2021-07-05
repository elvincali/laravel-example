<?php

namespace Src\Support\Application\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Src\Support\Response\Domain\BaseResponse;

class BaseFormRequest extends FormRequest
{
    const MSG_CODE_USER = "El usuario no existe en la base de datos.";
    const MSG_CODE_OBJECT = "El recurso que desea acceder no está disponible, fue eliminado o ya no existe en la base de datos.";
    const MSG_CODE_PRIVILEGIO = "Esta acción no está autorizada.";
    const MSG_ERROR_VALIDACION = "Fallo Validación";
    const CODE_PRIVILEGIO = 103;

    public int $code = BaseFormRequest::CODE_PRIVILEGIO;
    public string $message = BaseFormRequest::MSG_CODE_PRIVILEGIO;

    protected function failedValidation(Validator $validator)
    {
        $response = new BaseResponse();
        $errors = (new ValidationException($validator))->errors();

        $response->data = $errors;
        $response->errorResponse(422, self::MSG_ERROR_VALIDACION);
        throw new HttpResponseException(
            response()->json($response, JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    protected function failedAuthorization()
    {
        throw new AuthorizationException($this->message, $this->code);
    }
}
