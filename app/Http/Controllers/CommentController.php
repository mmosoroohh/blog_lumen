<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Create Article controller instance
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'book_id' => 'required',
            'comment' => 'required| max:500 '
        ]);

        // insert data
        $request['date'] = date('Y-m-d H:i:s');
        $request['ip_address'] = $request->ip();
        $comment = Comments::create($request->all());

        return response()->json($comment, 201);
    }

    public function index(Request $request)
    {
        $comments = Comments::whereNull('deleted_at')->orderBy('date', 'desc')->get();
        return response()->json([
            'message' => 'Data fetched successfully',
            'data' => $comments,
            'status' => \Illuminate\Http\Response::HTTP_OK
        ]);        
    }
}
