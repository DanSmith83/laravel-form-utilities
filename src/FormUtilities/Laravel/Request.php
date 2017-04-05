<?php

namespace DanSmith\FormUtilities\Laravel;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest {

    protected $validateForMethods = [
        'patch',
        'post',
        'put',
    ];

    public function validate()
    {
        if (in_array(strtolower($this->getMethod()), $this->validateForMethods))
        {
            parent::validate();
        }
    }
}