<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukMasukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'gudang_id' => 'required|number',
            'product_id' => 'required|number',
            'kuantitas' => 'required|number',
            'harga_perbarang' => 'required|number',
            'total_harga' => 'required|number',
            'tanggal' => 'required|date',
        ];
    }
}
