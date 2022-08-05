<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use DB;

class LogController extends Controller
{
    //
    public function getUser()
    {
        $user = auth()->user();
        return response()->json($user);
    }

    public function index()
    {
        $bugs = Log::all();
        return $bugs;
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'type' => 'required',
            'priority' => 'required',
            'path' => 'required'
        ]);
        DB::beginTransaction();
        try {
         
            $editarUsuario = Log::where('id', $id)->update([
                'type'            => $request->type,
                'priority'           => $request->priority,
                'path' => $request->path
        
            ]);

            $response['code']   = 200;
            $response['data']  = $editarUsuario;

            return response()->json($response);
            

        } catch (Exception $exception) {
            DB::rollBack();
            $response = [
                "message"   => $exception->getMessage(),
            ];

            return $this->_message->setErrorResponse(451, $response);
       
        }
    }

    public function create(Request $request )
    {
        $request->validate([
            'type' => 'required',
            'priority' => 'required',
            'path' => 'required'
        ]);
        DB::beginTransaction();
        try {
         
            $editarUsuario = Log::insert([
                'type'            => $request->type,
                'priority'           => $request->priority,
                'path' => $request->path
        
            ]);

            $response['code']   = 200;
            $response['data']  = $editarUsuario;

            return response()->json($response);
            

        } catch (Exception $exception) {
            DB::rollBack();
            $response = [
                "message"   => $exception->getMessage(),
            ];

            return $this->_message->setErrorResponse(451, $response);
       
        }
    }

    public function delete($id)
    {
    DB::beginTransaction();
    try {
       
        DB::table('logs')->delete($id);
        return "Registro Eliminado con exito";
            

    } catch (Exception $exception) {
        DB::rollBack();
        $response = [
            "message"   => $exception->getMessage(),
        ];
        return $this->_message->setErrorResponse(451, $response);

    }
}

}
