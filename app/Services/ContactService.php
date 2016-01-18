<?php

namespace App\Services;

use App\Services\ContactServiceInterface;
use App\Repositories\ContactInterface;
use AMD\Traits\EloquentJSON;
use App\Eloquent\Contact; // Model操作


/**
 * Class ContactService
 * @package Contact\Services
*/
class ContactService
{
    /**
     * @param Contact $company
     */
    public function __construct(Contact $company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function createEntity($form_contents)
    {
        $this->company->content = json_encode($form_contents);
        $this->company->save();
    }
}