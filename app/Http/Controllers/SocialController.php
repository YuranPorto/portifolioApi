<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresocialRequest;
use App\Http\Requests\UpdatesocialRequest;
use App\Models\social;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return social::orderBy('id', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validator($request->all());

        try {
            social::create($request->all());
            return response()->json(['Success' => "Criado com sucesso"], 200);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            return social::find($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        try {
            $social = social::find($id);
            $social->update($request->all());
            return $social;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $getSocial = social::find($id);
            $socialName = $getSocial->name;
            social::destroy($id);
            return response()->json(["success" => "Rede social $socialName excluidas com sucesso"], 204);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function validator($data)
    {
        $validator = Validator::make($data, [
            "Name" => "required|string|min:3|max:10",
            'icon' => 'file',
            "link" => "required|string|min:5|max:300",
        ]);

        if ($validator->fails()) {
            return ["Erros" => $validator->errors()];
        }

        return true;
    }
}
