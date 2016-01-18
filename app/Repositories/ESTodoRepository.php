<?php
namespace App\Repositories;

class ESTodoRepository
{
    private $es;
    public function __construct()
    {
        $this->es = new \Elasticsearch\Client([
            'hosts' => ['157.7.236.208:9200']
        ]);
    }

    public function search($index, $type, $q)
    {
        $query = [
            'size' => 100,
            'query' => [
                'multi_match' => [
                    'query' => $q,
                    'fields' => ['title', 'body']
                ]
            ]
        ];
        $params['index'] = $index;
        $params['type']  = $type;
        $params['body'] = $query;
        return $this->es->search($params);
    }



    public function update()
    {

    $updateParams['index']          = 'test_index';
    $updateParams['type']           = 'test_type';
    $updateParams['id']             = rand(1,5);;
    $updateParams['title']['body']    = array('test_key' => 'new_value');

    $retUpdate = $this->es->update($updateParams);
	
    }
}
