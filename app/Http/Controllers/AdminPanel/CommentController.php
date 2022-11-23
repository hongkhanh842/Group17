<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.comment.index');
    }

    public function show($id)
    {
        return view('admin.comment.show', [
           'id' => $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Comment::find($id);
        $data->status = $request->status;
        $data->save();
        return redirect(route('admin.comment.index'));
    }

    public function destroy($id)
    {
        $data = Comment::find($id);
        $data->delete();
        return redirect('admin/comment');
    }
}
