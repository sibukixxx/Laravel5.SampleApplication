<?php

namespace App\Services;

use App\Services\CompanyServiceInterface;
use App\Repositories\CompanyInterface;
use Illuminate\Validation\Factory as ValidateFactory;
use Illuminate\Support\Facades\Session;


/**
 * Class CompanyService
 * @package Company\Services
 */
class CompanyService implements CompanyServiceInterface
{
    /**
     * @var CompanyInterface
     */
    protected $companyInterface;

    /**
     * @var ValidateFactory
     */
    protected $validateFactory;

    /**
     * @var array
     */
    protected $rules = [
        "title" => "required|max: 100",
        "price" => "required|integer|min:0|max:100000",
        "url" => "required"
    ];

    /**
     * @param CompanyInterface $companyInterface
     * @param ValidateFactory $validateFactory
     */
    public function __construct(CompanyInterface $companyInterface, ValidateFactory $validateFactory)
    {
        $this->companyInterface = $companyInterface;
        $this->validateFactory = $validateFactory;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->companyInterface->get($id);
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        $a = $this->aaa();
        var_dump($a);

        return $this->companyInterface->getList();
    }

    /**
     * @param $request
     * @param $id
     * @return $id
     */
    public function save($request, $id=null)
    {
        $input = $request->only([
            'name'       , 'country',
            'prefecture' , 'address',
            'postal_code', 'telephone']);
        if (!empty($input)) {
            $id = $this->companyInterface->create($input);
        } else {
            $id = $this->companyInterface->update($id, $input);
        }
        return $id;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $this->companyInterface->delete($id);
        return true;
    }

    /**
     * @return mixed
     */
    public function createEntity()
    {
        return $this->companyInterface->createEntity();
    }

    public function aaa()
    {
        return false;
    }

}