<?php

namespace App\Services;

/**
 * Interface CompanyServiceInterface
 * @package Company\Services
 */
interface CompanyServiceInterface
{
    /**
     * 単体取得
     * @return mixed
     */
    public function get($id);

    /**
     * 一覧取得
     * @return mixed
     */
    public function getList();

    /**
     * 保存
     * @param $input
     * @param $id | null
     * @return $id | null
     */
    public function save($input, $id = null);

    /**
     * 削除
     * @param $id
     * @return $id
     */
    public function delete($id);

    /**
     * エンティティ作成
     * @return $entity
     */
    public function createEntity();
}