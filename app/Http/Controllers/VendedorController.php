<?php

namespace App\Http\Controllers;
use  App\Models\Vendedor;
use  App\Models\Venda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class VendedorController extends Controller
{
    public function index()
    {
        return Vendedor::all();
    }

    public function indexweb()
    {
        $vendedores = Vendedor::all();
        return view('vendedores.mostrar', ['vendedores' => $vendedores]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:5|max:20', 
            'email' => 'required|min:5|max:50'
        ]);
        return Vendedor::create($request->all());
    }

    public function storeweb(Request $request)
    {    
        $request->validate([
            'nome' => 'required|min:5|max:20', 
            'email' => 'required|min:5|max:50'
        ]);

         Vendedor::create([
            'nome' => $request->nome,
            'email' => $request->email,
         ]);
         return redirect('/vendedores/mostrar-vendedoresweb');

    }
        
    public function edit($id){
        $vendedores = Vendedor::where('id',$id)->first();

        if(!empty($vendedores))
        {
            return view('vendedores.atualizar', ['vendedores' => $vendedores]);
        }
        else{
            return redirect()->route('tudo');
        }
    }


    public function show($id)
    {
        $vendedor = Vendedor::find($id);

        if (!$vendedor) {
            return response()->json(['message' => 'Vendedor não encontrado'], 404);
        }
    
        return response()->json($vendedor);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'nome' => 'required|min:5|max:20',
            'email' => 'required|min:5|max:50',
        ]);
    
        $vendedor = Vendedor::find($id);
    
        if (!$vendedor) {
            return response()->json(['message' => 'Vendedor não encontrado'], 404);
        }
    
        try {
            $vendedor->update([
                'nome' => $request->input('nome'),
                'email' => $request->input('email'),
            ]);
            
            return response()->json(['message' => 'Vendedor atualizado com sucesso']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar vendedor', 'error' => $e->getMessage()], 500);
        }
    }


    public function updateweb(Request $request, int $id)
    {
        $data = [
            'nome' => $request->nome,
            'email' => $request->email
        ];

        Vendedor::where('id', $id)->update($data);
        return redirect()->route('tudo');
        
    }

    public function destroy(int $id)
    {
        $vendedor = Vendedor::findOrFail($id);
    
        if (!$vendedor) {
            return response()->json(['message' => 'Vendedor não encontrado'], 404);
        }
    
        try {
            $vendedor->venda()->update(['id_vendedor' => null]);
    
            $vendedor->delete();
    
            return response()->json(['message' => 'Vendedor excluído com sucesso']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao excluir vendedor', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroyweb(int $id){
        $vendedor = Vendedor::findOrFail($id);
    
        $vendedor->venda()->update(['id_vendedor' => null]);
    
        $vendedor->delete();
    
        return redirect()->route('tudo');
    
    }
}