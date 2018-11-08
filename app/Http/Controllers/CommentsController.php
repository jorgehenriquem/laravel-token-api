<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;

class CommentsController extends Controller
{
    public function index()
    {
        return Comments::all();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = \Auth::user()->name;
        $data['user_id'] = \Auth::user()->id;
        return Comments::create($data);
    }

    public function update(Request $request, Comments $comments)
    {
        if ($comments->user_id == \Auth::user()->id) {
            $comments->update($request->all());
            return $comments;
        }elseif ($comments->user_id != \Auth::user()->id) {
            return 'ação não permitida';
        }
        
        
    }

    public function show(Comments $comments)
    {
        return $comments;
    }

    public function destroy(Request $request, Comments $comments)
    {
        if ($comments->user_id == \Auth::user()->id || \Auth::user()->admin == 1) {
            $comments->delete();
            return $comments;
        }elseif ($comments->user_id != \Auth::user()->id) {
                return 'ação não permitida';
            }
    }
}
