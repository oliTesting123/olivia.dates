<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dates;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Rules\CurpValidation;


class DatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $successMessage = $request->session()->get('success');

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
        // $curp = $request->input('curp');

        // $user = Users::where('curp', $curp)->first();

        // if($user){
        //     $iserData = [
        //         'curp' => $user->id
        //     ];

        //     return $this->processUser($userData, $user->id);
        // }

        // return redirect()->route('create');
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
                $dataDate = $this->generateNewDate($userId);

                return view('create', ['userData' => $userData, 'dataDate' => $dataDate]);
            }
        }

        return view('create');
    }

    private function processUser($userData, $userId){
        
        $date = Dates::where('user_id', $userId)->first();

        if($date){
            if($date->status === 'active'){

                // $date->date_at = Carbon::parse($date->date_at)->format('Y-m-d H:i:s');
                //  $date['date_at'] == $date->date_at->format('l, j F Y h:i A');
                 $date['date_at'] = Carbon::parse($date['date_at'])->format('l, j F Y h:i A');

                // dump("DAFAFAF", $date->date_at->format('l, j F Y h:i A'));

                return view('create', ['userData' => $userData, 'dateData' => $date]);
            } elseif ($date->status === 'canceled'){
                $newDate = $this->generateNewDate($userId);

                return view('create', ['userData' => $userData, 'dateData' => $newDate]);
            }
        }

        // $newDate = $this->generateNewDate($userId);
        // dump("Hola", $newDate);
        //return view('create', ['userData' => $userData, 'citaData' => $newDate]);
    }

    private function generateNewDate($userId){
        $newDate = new Dates();
        $newDate->user_id = $userId;
        $newDate->date_at =  $this->generateDate();
        $newDate->status ='active';
        $newDate->module ='Auditorio Benito Juarez';
        $newDate->address ='Col. Auditorio 2323';
        $newDate->save();

        // $newDate->date_at = Carbon::parse($newDate->date_at)->format('Y-m-d H:i:s');

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
        // $usuario = Usuarios::find($id);

        // if ($usuario) {
        //     return response()->json([
        //         'id' => $usuario->id,
        //         'nombre' => $usuario->nombre,
        //         'correo' => $usuario->correo,
        //     ]);
        // } else {
        //     return response()->json(['mensaje' => 'Usuario no encontrado.'], 404);
        // }
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

}
