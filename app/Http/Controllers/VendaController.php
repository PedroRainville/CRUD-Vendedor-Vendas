<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VendaController extends Controller
{
        public function index()
        {
            return Venda::all();
        }

        public function indexweb()
        {
            $vendas = Venda::all();
            return view('vendas.mostrar', ['vendas' => $vendas]);
        }

        public function store(Request $dados)
        {
            $dados->validate([
                'id_vendedor' => 'required|min:1|max:3', 
                'valor' => 'required', 
                'data_venda' => 'required'
            ]);
        
            $dadosParaCriar = $dados->all();
        
            $venda = Venda::create($dadosParaCriar);
        
            $comissao = $dados['valor'] * 0.035;
            $venda->comissao = $comissao;
            $venda->save();
        
            return response()->json($venda, 201);
        }

        public function storeweb(Request $dados)
        {
            $dados->validate([
                'id_vendedor' => 'required|exists:vendedors,id|min:1|max:3', 
                'valor' => 'required', 
                'data_venda' => 'required'
            ]);
        
            $dadosParaCriar = $dados->all();
        
            $venda = Venda::create($dadosParaCriar);
        
            $comissao = $dados['valor'] * 0.035;
            $venda->comissao = $comissao;
            $venda->save();
        
            return redirect('/vendas/mostrar-vendasweb');

        }
        public function show($id)
        {
            return Venda::findOrfail($id);
        }

        public function edit($id){
            $vendedores = Venda::where('id',$id)->first();
    
            if(!empty($vendedores))
            {
                return view('vendas.atualizar', ['venda' => $vendedores]);
            }
            else{
                return redirect()->route('tudovendas');
            }
        }
    
        public function update(Request $request, int $id)
        {
            $request->validate([
                'id_vendedor' => 'required|min:1|max:3',
                'valor' => 'required',
                'data_venda' => 'required',
            ]);
        
            $venda = Venda::find($id);
        
            if (!$venda) {
                return response()->json(['message' => 'Venda não encontrada'], 404);
            }
        
            try {
                $venda->update([
                    'id_vendedor' => $request->input('id_vendedor'),
                    'valor' => $request->input('valor'),
                    'data_venda' => $request->input('data_venda'),
                ]);
                
                $comissao = $request->input('valor') * 0.035;
                $venda->comissao = $comissao;
                $venda->save();

                return response()->json(['message' => 'Venda atualizada com sucesso']);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Erro ao atualizar venda', 'error' => $e->getMessage()], 500);
            }
        }
        public function updateweb(Request $request, int $id)
        {
        $data = [
            'id_vendedor' => $request->id_vendedor,
            'valor' => $request->valor,
            'data_venda' => $request->data_venda
        ];

        Venda::where('id', $id)->update($data);
        $venda = Venda::find($id);
        $comissao = $request->input('valor') * 0.035;
        $venda->comissao = $comissao;
        $venda->save();
        return redirect()->route('tudovendas');
        
    }
        public function destroy(int $id)
        {
            $venda = Venda::find($id);
            if (!$venda) {
                return response()->json(['message' => 'Venda não encontrada'], 404);
            }
            $venda->delete();

            return response()->json(['message' => 'Venda deletada com sucesso'], 200);
        }

        public function destroyweb(int $id){
            Venda::where('id', $id)->delete();
            return redirect()->route('tudovendas');
        }

        public function tudo($id_vendedor)
        {
            try 
            {
                $dadosVendedorEVendas = Vendedor::join('vendas', 'vendedors.id', '=', 'vendas.id_vendedor')
                    ->where('vendedors.id', $id_vendedor)
                    ->select(
                        'vendedors.id as vendedor_id',
                        'vendedors.nome as vendedor_nome',
                        'vendedors.email as vendedor_email',
                        'vendas.valor',
                        'vendas.data_venda',
                        'vendas.comissao'
                    )
                    ->get();
                
                return response()->json($dadosVendedorEVendas);
            }catch (\Exception $e) {  
                return response()->json(['message' => 'Erro ao obter dados do vendedor e vendas.', 'error' => $e->getMessage()], 500);
        } 
        }
}
