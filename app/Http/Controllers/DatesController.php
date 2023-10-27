<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dates;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Rules\CurpValidation;
use Illuminate\Validation\ValidationException;


class DatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->merge([
            'curp' => strtoupper($request->input('curp')),
        ]);
    }

    public function searchUser(Request $request)
    {
        $request->validate([
            'curp' => ['required', new CurpValidation],
        ]);

        $curp = $request->input('curp');
        $user = Users::where('curp', $curp)->first();

        if($user){
            $userData = [
                'curp' => $user->curp,
                'id' => $user->id
            ];
            $id = $userData['id'];

            return $this->processUser($userData, $id);
        }else{
            $userData = $this->createUser($curp);
            if($userData){
                $userId = $userData['id'];
                $dateData = $this->generateNewDate($userId);

                return view('create', ['userData' => $userData, 'dateData' => $dateData]);
            }
        }

    }

    private function processUser($userData, $userId){
        $date = Dates::where('user_id', $userId)
            ->where(function ($query) {
                $query->where('status', 'active')
                      ->orWhere('status', 'canceled');
            })
            ->first();
            

        if($date && $date['status'] == "active"){
                return view('create', ['userData' => $userData, 'dateData' => $date]);
        }

        if($date && $date['status'] == "canceled"){
            $date = Dates::where('user_id', $userId)->first();
            $date->delete();

            $newDate = $this->generateNewDate($userId);

            return view('create', ['userData' => $userData, 'dateData' => $newDate]);
        }
        if(!$date){
            $newDate = $this->generateNewDate($userId);

            return view('create', ['userData' => $userData, 'dateData' => $newDate]);
        }
    }

    
    private function generateNewDate($userId){
        $newDate = new Dates();
        $newDate->user_id = $userId;
        $newDate->date_at =  $this->generateDate();
        $newDate->status ='active';
        $newDate->module ='Auditorio Benito Juarez';
        $newDate->address ='Col. Auditorio 2323';
        $newDate->save();

        return $newDate;
    }

    private function createUser($curp){
        $newUser = new Users();
        $newUser->curp = $curp;
        $newUser->save();

        return $newUser;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return "JOAALAL";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $usuario=Usuarios::findOrFail($id);
        // return view('usuarios.edit', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function generateDate() {
        $dateCurrent = Carbon::now();
        $laterDays = 7;

        $date_at = $dateCurrent->addDays($laterDays);

        return $date_at;
    }

    public function validar(Request $request)
{
        $request->validate([
            'curp' => ['required', new CurpValidation],
        ]);

        // Resto de la lógica si la validación es exitosa
    }

    public function getDates()
    {

        $dates=DB::table('dates')
                ->select('id','user_id','module','address')
                ->get();
        
        return $dates;
    }

    public function postDate(Request $request)
    {
        try {
            $request->validate([
                'curp' => ['required', new CurpValidation],
            ]);
    
            $curp = $request->curp;
            $user = Users::where('curp', $curp)->first();
    
            if($user){
                $userData = [
                    'curp' => $user->curp,
                    'id' => $user->id
                ];
                $id = $userData['id'];
                return $this->processUserApi($userData, $id);
            }else{
                $userData = $this->createUser($curp);
                if($userData){
                    $userId = $userData['id'];
                    $dataDate = $this->generateNewDate($userId);

                    $responseData = [
                        'userData' => $userData,
                        'dateData' => $dataDate
                    ];

                return response()->json(['data' => $responseData], 201);
            }
        }
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    private function processUserApi($userData, $userId){
        $date = Dates::where('user_id', $userId)
            ->where(function ($query) {
                $query->where('status', 'active')
                      ->orWhere('status', 'canceled');
            })
            ->first();
            

        if($date && $date['status'] == "active"){
            $responseData = [
                'userData' => $userData,
                'dateData' => $date
            ];
            return response()->json(['data' => $responseData], 201);
        }

        if($date && $date['status'] == "canceled"){
            $date = Dates::where('user_id', $userId)->first();
            $date->delete();

            $newDate = $this->generateNewDate($userId);

                $responseData = [
                    'userData' => $userData,
                    'dateData' => $newDate
                ];

                return response()->json(['data' => $responseData], 201);
        }
        if(!$date){
            $newDate = $this->generateNewDate($userId);
            $responseData = [
                'userData' => $userData,
                'dateData' => $newDate
            ];

            return response()->json(['data' => $responseData], 201);
        }
        
    }

    public function updateDate(Request $request, $id){
        $token = $request->input('_token');

        $dateData = Dates::where('user_id', $id)->first();
        $userData = Users::where('id', $id)->first();

        if (!$dateData) {
            return response()->json(['message' => 'Recurso no encontrado'], 404);
        }

        $dateData->updated_at = Carbon::now();
        $dateData->status = "canceled";
        $dateData->save();

        return view('create', ['userData' => $userData, 'dateData' => $dateData]);
    }

    public function updateDateApi(Request $request, $id){
        // $token = $request->input('_token');

        $date = Dates::where('user_id', $id)->first();

        if (!$date) {
            return response()->json(['message' => 'Recurso no encontrado'], 404);
        }

        $date->updated_at = Carbon::now();
        $date->status = "canceled";
        $date->save();

        return response()->json(['Cita actualizada' => $date], 404);
    }

    public function deleteDate(Request $request, $id){
        $token = $request->input('_token');

        $date = Dates::where('user_id', $id)->first();

        if (!$date) {
            return response()->json(['message' => 'Cita no encontrada'], 404);
        }
        
        $date->delete();

        return response()->json(['message' => 'Cita eliminada'], 204);
    }
}
