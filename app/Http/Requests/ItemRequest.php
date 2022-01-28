<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

use Illuminate\Validation\Lang;
class ItemRequest extends FormRequest
{
public function authorize()
{
//return false;
// true に変更
return true;
}
public function rules()
{
return [
    'name' => ['required', 'string'],
    'code' => ['required', 'string', Rule::unique('items')->ignore($this->id)],
    'price' => ['required', 'min:0', 'integer'],
    'stock' => ['min:0', 'integer'],
];
}
}