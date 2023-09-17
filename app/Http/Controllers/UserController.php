<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Libs\ApiExtensions;
use App\Models\User;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users = User::all();

        $resultResponse = new ResultResponse();

        ApiExtensions::setResultResponse(
            $resultResponse,
            $Users,
            ResultResponse::SUCCESS_CODE,
            ResultResponse::TXT_SUCCESS_CODE
        );
        return $Users;
    }

    public function signup(){
        return view('user.register');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $resultResponse = new ResultResponse();

        try {
            $this->validateUser($request);

            $password = ''; //Hash

            $newUser   = new User([
                'nombre' => $request->get('nombre'),
                'apellidos' => $request->get('apellidos'),
                'DNI' => $request->get('DNI'),
                'email' => $request->get('email'),
                'password' => $password,
                'telefono' => $request->get('telefono'),
                'pais' => $request->get('pais'),
                'IBAN' => $request->get('IBAN'),
                'sobreTi' => $request->get('sobreTi'),
            ]);

            $newUser->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $newUser,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_CODE,
                ResultResponse::TXT_ERROR_CODE
            );
        }


        return redirect()->route('home')->with('success', 'Usuario registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $resultResponse = new ResultResponse();

        try {
            $User = User::findOrFail($id);

            ApiExtensions::setResultResponse(
                $resultResponse,
                $User,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

        return response()->json($resultResponse);
    }

    public function findByEmail($value)
    {
        $columns = ['email'];

        $resultResponse = ApiExtensions::findByColumns(User::class, $columns, $value);

        return response()->json($resultResponse);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateUser($request);

            $User = User::findOrFail($id);

            $User->nombre = $request->get('nombre');
            $User->apellidos = $request->get('apellidos');
            $User->DNI = $request->get('DNI');
            $User->email = $request->get('email');
            $User->telefono = $request->get('telefono');
            $User->pais = $request->get('pais');
            $User->IBAN = $request->get('IBAN');
            $User->sobreTi = $request->get('sobreTi');

            $User->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $User,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

        return response()->json($resultResponse);
    }

    public function patch(Request $request, $id)
    {
        $resultResponse = new ResultResponse();

        try {
            $this->validateUser($request);

            $User = User::findOrFail($id);

            $User->nombre = $request->get('nombre', $User->nombre);
            $User->apellidos = $request->get('apellidos', $User->apellidos);
            $User->DNI = $request->get('DNI', $User->DNI);
            $User->email = $request->get('email', $User->email);
            $User->telefono = $request->get('telefono', $User->telefono);
            $User->pais = $request->get('pais', $User->pais);
            $User->IBAN = $request->get('IBAN', $User->IBAN);
            $User->sobreTi = $request->get('sobreTi', $User->sobreTi);

            $User->save();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $User,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }

        return response()->json($resultResponse);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $resultResponse = new ResultResponse();

        try {
            $User = User::findOrFail($id);

            $User->delete();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $User,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }
        return response()->json($resultResponse);
    }

    private function validateUser($request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|min:20|max:20', //No admitir números.
            'apellidos' => 'required|min:2|max:40', //No admitir números
            'DNI' => 'required|max:9', //formato español
            'email' => 'required|max:50|unique:users', //formato email
            'password' => 'required', //validation password
            'repeatPassword' => 'required', //validation password
            'telefono' => 'min:9|max:12', //solo numeros con prefijo +
            'pais' => 'max:50',
            'IBAN' => 'required|', //formato iban
            'sobreTi' => 'min:20|max:250'
        ]);
    }
}
