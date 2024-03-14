<?php

namespace App\Http\Controllers;

use App\Models\Cobranca;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CobrancasController extends Controller
{
    public function index()
    {
        return Cobranca::with('cliente')->get();
    }

    public function store(Request $request, Cliente $cliente) 
    {
        if (!$cliente) {
            return response()->json(['error' => 'Cliente não encontrado'], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'valor' => 'required|numeric',
            'data_vencimento' => 'required|date',
            'status' => 'required|in:pendente,pago,cancelado',
            'descricao' => 'nullable|string',
            'cliente_id' => 'nullable|integer|exists:clientes,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $cobranca = $cliente->cobrancas()->create($request->all());
    
        return response()->json($cobranca, 201);
    }
    
    public function show(Cobranca $cobranca)
    {
        return $cobranca->with('cliente')->find($cobranca->id);
    }

    public function update(Request $request, Cobranca $cobranca)
    {
        $validator = Validator::make($request->all(), [
            'valor' => 'required|numeric',
            'data_vencimento' => 'required|date',
            'status' => 'required|in:pendente,pago,cancelado',
            'descricao' => 'nullable|string',
            'cliente_id' => 'required|integer|exists:clientes,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cobranca->update($request->all());

        return response()->json($cobranca);
    }

    public function destroy(Cobranca $cobranca)
    {
        $cobranca->delete();

        return response()->json('', 204);
    }



    public function indexByClient(Cliente $cliente)
    {
        return $cliente->cobrancas;
    }

    public function indexByDueDate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        return Cobranca::where('data_vencimento', $request->data)->get();
    }
}