<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request)
    {
        $request->validate([
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        $user_id = Auth::user()->id;
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        $comment->save();

        return redirect()->route('image.detail',['id' => $image_id])
                        ->with(['message' => 'Commentario guardado']);
    }

    public function delete($id)
    {
        $user = Auth::user();

        $comment = Comment::find($id);

        if($user && ($comment->user_id === $user->id || $comment->image->user_id == $user->id))
        {
            $comment->delete();

            return redirect()->route('image.detail', ['id' => $comment->image->id])
                            ->with(['message' => 'Comentario Borrado']);
        }
        else
        {
            return redirect()->route('image.detail', ['id' => $comment->image->id])
                            ->with(['message' => 'Comentario no pudo ser Borrado']);
        }
    }


}
