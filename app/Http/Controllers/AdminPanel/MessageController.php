<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin/message/index');
    }
    public function show($id)
    {
        $data=Message::find($id);
        $data->status='Read';
        $data->save();
        return view('admin.message.show',[
            'id' => $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data =Message::find($id);
        $data->note= $request->note;
        $data->save();
        return redirect(route('admin.message.index'));
    }

    public function destroy($id)
    {
        $data =Message::find($id);
        $data->delete();
        return redirect(route('admin.message.index'));
    }
}
