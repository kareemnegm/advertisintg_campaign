<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignFormRequest extends BaseFormRequest
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
            'name' => 'required',
            'from' => 'required|date_format:Y-m-d|after_or_equal:today',
            'to' => 'required|date_format:Y-m-d|after:from',
            'total' => 'required|numeric',
            'daily_budget' => 'required|numeric',
            'campaign_images.*' => 'required|mimes:jpeg,png,jpg,pdf,gif|max:2048'

        ];
    }
}
