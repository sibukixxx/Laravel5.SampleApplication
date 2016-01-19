<?php

namespace App\Services;

use App\Services\RegisterServiceInterface;
//use App\Repositories\RegisterInterface;
use Illuminate\Validation\Factory as ValidateFactory;
use Illuminate\Support\Facades\Session;


/**
 * Class RegisterService
 * @package Register\Services
 */
class RegisterService implements RegisterServiceInterface
{
    /**
     * @var RegisterInterface
     */
    protected $RegisterInterface;

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
     * @param RegisterInterface $RegisterInterface
     * @param ValidateFactory $validateFactory
     */
    public function __construct(RegisterInterface $RegisterInterface, ValidateFactory $validateFactory)
    {
        $this->RegisterInterface = $RegisterInterface;
        $this->validateFactory = $validateFactory;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->RegisterInterface->get($id);
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        $a = $this->aaa();
        var_dump($a);

        return $this->RegisterInterface->getList();
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
            $id = $this->RegisterInterface->create($input);
        } else {
            $id = $this->RegisterInterface->update($id, $input);
        }
        return $id;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $this->RegisterInterface->delete($id);
        return true;
    }

    /**
     * @return mixed
     */
    public function createEntity()
    {
        return $this->RegisterInterface->createEntity();
    }

    public function aaa()
    {
        return false;
    }

}