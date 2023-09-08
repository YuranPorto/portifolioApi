<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;
use App\Models\technologies;

class TechnologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return technologies::orderBy('id', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationResult = $this->validator($request->all());

        if ($validationResult !== true) {
            return response()->json(['Error' => $validationResult], 500);
        }

        try {
            technologies::create($request->all());
            return response()->json(["Success" => "tecnoligia inserida com sucesso"]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
           return technologies::find($id);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $technologies = technologies::find($id);
        $technologies->update($request->all());

        return $technologies;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $getTechnologies = technologies::find($id);
            $tecName = $getTechnologies->name;
            technologies::destroy($id);

            return response()->json(["success" => "Tecnologia $tecName excluidas com sucesso"], 204);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function validator($data)
    {
        $validator = Validator::make($data, [
            "title" => "required|string|min:3|max:10",
            "description" => "required|string|min:5|max:300",
            'icon' => 'file',
        ]);

        if ($validator->fails()) {
            return ["Erros" => $validator->errors()];
        }

        return true;
    }
}
