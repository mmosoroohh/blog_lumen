<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comments;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    protected $client;
    /**
     * Create Book controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    public function index(Request $request){
        $response = $this->client->request('GET', 'https://anapioficeandfire.com/api/books');

        $data = json_decode(($response->getBody()->getContents()), true);
        $books = collect($data)
            ->map(function ($book){
                $exploded_data = explode('/', $book['url']);
                $book_id = $exploded_data[sizeof($exploded_data)-1];
                $book['comments_count'] = Comments::where('book_id', $book_id)->count();
                return $book;
            })
            ->sortByDesc('released');

        return response()->json([
            'message' => 'Data fetched successfully',
            'data' => $books,
            'status' => \Illuminate\Http\Response::HTTP_OK
        ]);


    }


    public function showSingleBook($id)
    {
        try {
            $response = $this->client->request('GET', 'https://anapioficeandfire.com/api/books/'. $id);

            $book = json_decode(($response->getBody()->getContents()), true);

            return response()->json([
                'message' => 'Data fetched successfully',
                'data' => $book,
                'status' => \Illuminate\Http\Response::HTTP_OK
            ]);
        } catch (ModelNotFoundException $e)
        {
            return response()->json('Book not found!', 404);
        }

    }

}
