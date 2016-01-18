<?php
namespace App\Repositories;

use App\Repositories\CompanyInterface;
use App\Eloquent\Company;

class CompanyRepository implements CompanyInterface
{
    /**
     * @var Company
     */
    protected $company;

    /**
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * 取得
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->company->find($id);
    }

    /**
     * 一覧取得
     * @return mixed
     */
    public function getList()
    {
        return $this->company->all();
    }

    /**
     * 更新
     */
    public function update($id, $data)
    {
        if ($this->company->find($id)->update($data)) {
            return $id;
        }
        return null;
    }

    /**
     * 新規登録
     */
    public function create($data)
    {
        $model = $this->company->create($data);
        if (isset($model->id)) {
            return $model->id;
        }
        return null;
    }

    /**
     * 削除
     * @param $id
     * @return $id
     */
    public function delete($id)
    {
        return $this->company->find($id)->delete();
    }

    /**
     * エンティティ作成
     * @return mixed
     */
    public function createEntity()
    {
        return $this->company->newInstance();
    }

}
