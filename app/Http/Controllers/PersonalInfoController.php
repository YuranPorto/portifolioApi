<?php

namespace App\Http\Controllers;

use App\Models\personalInfo;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return personalInfo::orderBy('id', 'desc')->get();
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
            personalInfo::create($request->all());
            return response()->json(["Success" => "Informações sobre $request->first_name adicionado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(['Error' => $e->getMessage()], 409);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return personalInfo::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $data = personalInfo::find($id);
        isset($request->first_name) ? $data->first_name = $request->first_name : $data->first_name;
        isset($request->last_name) ? $data->last_name = $request->last_name : $data->last_name;
        isset($request->email) ? $data->email = $request->email : $data->email;
        isset($request->role) ? $data->role = $request->role : $data->role;
        isset($request->about) ? $data->about = $request->about : $data->about;
        $data->save();

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            personalInfo::destroy($id);
            return response()->json(["success" => "Informações excluidas com sucesso"], 204);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function validator($data)
    {
        $validator = Validator::make($data, [
            "first_name" => "required|string|min:3|max:10",
            "last_name" => "required|string|min:3|max:10",
            'email' => 'required|email:rfc,dns',
            "role" => "string|min:2|max:80"
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return true;
    }
}
