<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $persons = Person::all();

            return response()->json([
                'success' => true,
                'data' => $persons
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        try {
            // Validation from CreatePersonRequest
            $req->validate([
                'name' => 'required|string',
            ]);

            $person = new Person();
            $person->name =  $req->input('name');
            $person->save();

            return response()->json([
                'success' => true,
                'data' => $person
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the person by id
        $person = Person::find($id);

        if (!$person) {
            return response()->json([
                'success' => false,
                'data' => 'Person with id not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $person
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        // Find the person by id
        $person = Person::find($id);

        if (!$person) {
            return response()->json([
                    'success' => false,
                    'data' => 'Person with id not found'
            ], 404);
            }

        // Update the person's name
        $person->name = $req->input('name');
        $person->save();

        return response()->json([
            'success' => true,
            'data' => $person
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json([
                    'success' => false,
                    'data' => 'Person with id not found'
            ], 404);
            }

        // Delete the person's name
        $person->delete();

        return response()->json([
            'success' => true,
            'data' => 'Person deleted successful'
        ], 200);
    }
}
