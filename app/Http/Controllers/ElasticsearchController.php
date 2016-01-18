<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ESTodoRepository;

class ElasticsearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
$es = new ESTodoRepository;
$es->update();
	return view('elasticsearch.index');
    }

    // Elasticsearch用に追加
    public function searchOnES()
    {
	$docs = [];
        $query = \Input::get('q');
        $es = new ESTodoRepository;
        $result = $es->search('test_index', 'test_type', $query);
        
        if($result['hits']['total'] > 0) {
            $docs = $result['hits']['hits'];
            return view('elasticsearch.search', compact('docs'));//PHPの配列省略記法 
        }


        $docs = $result['hits']['total'];
        return view('elasticsearch.search', compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
	$es = new ESTodoRepository;
        $es->index([
            'index' => 'test_index',
            'type' => 'test_type',
            'title' => 'aa',
            'body' => 'bb'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
