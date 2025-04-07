<?php

namespace App\Http\Controllers;

use App\Models\Certificat;
use Illuminate\Http\Request;
use App\Http\Requests\CertificatStoreRequest;
use App\Http\Requests\CertificaUpdateRequest;

class CertificatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certicats = Certificat::all();

        return response()->json([
            "status" => 200,
            "message" => "Tous les Certificats",
            "data" => $certicats
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificatStoreRequest $request)
    {
        $data = $request->all();

        if($data){
           $certificat = Certificat::create($data);
           if($certificat){
            return response()->json([
                "status" => 200,
                "message" => "Certificat créé avec succés",
                "data" => $certificat
            ]);
           }else{
            return response()->json([
                "status" => "400",
                "message" => "Something went wrong!"
            ]);
           }
        }else{
            return response()->json([
                "status" => "422",
                "message" => "Erreur de validation"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificat $certificat)
    {
        return response()->json([
            "status" => 200,
            "message" => "le certificat demandé",
            "data" => $certificat
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CertificaUpdateRequest $request, Certificat $certificat)
    {
        if($request->validated()){
            $c = $certificat->update($request->all());

            if($c){
                return response()->json([
                    "status" => 200,
                    "message" => "Certificat modifié avec succès",
                    "data" => $c
                ]);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificat $certificat)
    {
        $certificat->delete();

        return response()->json([
            "status" => 200,
            "message" => "Le certificat a été supprimé avec succès"
        ]);
    }
}
