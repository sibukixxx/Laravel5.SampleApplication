<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Services\ContactService;

class ContactController extends Controller
{
    /**
     * @var ContactServiceInterface
     */
    private $contactService;
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function getIndex()
    {
        return view('contact.index');
    }

    public function getForm(Request $request)
    {
        if ($request->input('username') == ''
            && $request->input('email') == '' )
        {
            return view('contact.index');
        }

        $form_contents = $request->all();
        return view('contact.index', compact('form_contents'));
    }

    public function postConfirm(Request $request)
    {
        $form_contents = $request->only(['username', 'email', 'content']);
        // $form_contentsをJSON形式でDBに保存する。
        $this->contactService->createEntity($form_contents);
        //

        return view('contact.thanks');
    }

    public function postApply()
    {

    }

}
