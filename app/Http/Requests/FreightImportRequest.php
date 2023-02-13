<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class FreightImportRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * @return void
     * @param \Illuminate\Contracts\Validation\Validator $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $total = count($this->allFiles());
            $customerIds = array_keys($this->allFiles());

            if (count($customerIds) > 0) {
                $result = Arr::flatten(Client::select('client_id')->whereIn('client_id', $customerIds)->get()->toArray());

                if (count($result) == 0) {
                    $validator->errors()->add('clientId', 'ID do cliente é inválido');
                } else {
                    $result = array_diff($customerIds, $result);
                    if (count($result) > 0) {
                        $validator->errors()->add('clientId', 'ID do cliente é inválido');
                    }
                }
            } elseif ($total === 0) {
                $validator->errors()->add('file_csv', 'Arquivo CSV requerido');
            } elseif ($total > 10) {
                $validator->errors()->add('total_csv', 'O número máximo de arquivos csv para upload é 10');
            }
        });
    }
}
