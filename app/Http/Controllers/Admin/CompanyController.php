<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\CompanyServiceInterface;
/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    /**
     * @var CompanyServiceInterface
     */
    private $companyService;
    public function __construct(CompanyServiceInterface $companyServiceInterface)
    {
        $this->companyService = $companyServiceInterface;
    }
    /**
     * 一覧
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->companyService->getList();
        return view('admin.company.list', compact('list'));
    }
    /**
     * 新規入力画面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = $this->companyService->createEntity();
        return view('admin.company.edit', compact('company'));
    }
    /**
     * 新規登録処理
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $this->companyService->save($request);
        return $this->show($id);
    }
    /**
     * 詳細
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->companyService->get($id);
        return view('admin.company.detail', compact('company'));
    }
    /**
     * 編集画面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->companyService->get($id);
        return view('admin.company.edit', compact('company'));
    }
    /**
     * 更新処理
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $this->companyService->save($request, $id);
        return $this->show($id);
    }
    /**
     * 削除処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->companyService->delete($id);
        return $this->index();
    }
}