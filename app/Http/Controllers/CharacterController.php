<?php

namespace App\Http\Controllers;

use App\Models\Character;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use GuzzleHttp\Client;


class CharacterController extends Controller
{
    protected $client;
    /**
     * Create Character controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    public function index(Request $request){
        $response = $this->client->request('GET', 'https://anapioficeandfire.com/api/characters');

        $characters = json_decode(($response->getBody()->getContents()), true);

        return response()->json([
            'message' => 'Data fetched successfully',
            'data' => $characters,
            'status' => \Illuminate\Http\Response::HTTP_OK
        ]);
    }


    public function showSingleCharacter($id)
    {
        try {
            $response = $this->client->request('GET', 'https://anapioficeandfire.com/api/characters/'. $id);

            $character = json_decode(($response->getBody()->getContents()), true);
    
            return response()->json([
                'message' => 'Data fetched successfully',
                'data' => $character,
                'status' => \Illuminate\Http\Response::HTTP_OK
            ]);
        } catch (ModelNotFoundException $e)
        {
            return response()->json('Character not found!', 404);
        }

    }

    public function filter(Request $request)
    {
        $response = $this->client->request('GET', 'https://anapioficeandfire.com/api/characters');
        $data = json_decode(($response->getBody()->getContents()), true);
        $characters = collect($data);

        if(!is_null($request->name)) {
            $characters->orWhere('name', "LIKE", "%{$request->name}%");
        }
        if(!is_null($request->gender)) {
            $characters->orWhere('gender', "LIKE", "%{$request->gender}%");
        }
        if(!is_null($request->age)) {
           $characters->orWhere('age', "LIKE", "%{$request->age}%");
        }
        return $characters;
    }

    public function create(Request $request)
    {
        // Validation


        // insert data
        $character = Character::create($request->all());

        return response()->json($character, 201);
    }

    public function update($id, Request $request)
    {
        // Validation

        // update record
        $character = Character::findorFail($id);
        $character->update($request->all());

        return response()->json($character, 200);
    }

    public function delete($id)
    {
        try{
            Character::findorFail($id)->delete();
            return response('Character deleted Successfully', 200);
            //do some stuff
        } catch(ModelNotFoundException $e)
        {
            // Not found
            return response()->json('Character Not Found!', 404);
        }

    }
}
