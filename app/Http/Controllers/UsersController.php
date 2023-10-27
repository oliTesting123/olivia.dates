<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use AAp\Models\Dates;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $curp = $request->input('curp');
        // Aquí puedes realizar las funciones que necesitas con la CURP
        return view('created', ['curp' => $curp]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
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

    public function searchUser(Request $request)
    {
        $holaaa = "HAOALALA";
        $curp = $request->input('curp');

        dump($request);
        // Aquí puedes realizar las funciones que necesitas con la CURP
        return view('create', ['curp' => $curp]);
        // $curp = $request->input('curp');

        // $user = User::where('curp', $curp)->first();

        // if($user){
        //     $iserData = [
        //         'curp' => $user->id
        //     ];

        //     return $this->processUser($userData, $user-id);
        // }

        // return redirect()->route('create');
    }

    private function processUser($userData, $userId){
        $date = Dates::where('user_id', $userId)->first();

        if($date){
            if($date->status === 'active'){
                return view('create', ['userData' => $userData, 'citaData' => $date]);
            } elseif ($cita->status === 'canceled'){
                $newDateCita = $this->generateNewDate($userId);

                return view('create', ['userData' => $userData, 'citaData' => $newDate]);
            }
        }

        $newDate = $this->generateNewDate($userId);
        return vew('create', ['userData' => $userData, 'citaData' => $newDate]);
    }

    private function generateNewDate($userId){
        $newDate = new Dates();
        $newDate->user_id = $userId;
        $newDate->status ='active';
        $newDate->save();

        return $newDate;
    }
}
