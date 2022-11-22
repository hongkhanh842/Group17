<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin.faq.index',);
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $data= new Faq();
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->status = $request->status;
        $data->save();
        return redirect(route('admin.faq.index'));
    }
    public function edit($id)
    {
        return view('admin.faq.edit', [
           'id' => $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data= Faq::find($id);
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->status = $request->status;
        $data->save();
        return redirect(route('admin.faq.index'));
    }

    public function destroy($id)
    {
        $data = Faq::find($id);
        $data->delete();
        return redirect('admin/faq');
    }
}
