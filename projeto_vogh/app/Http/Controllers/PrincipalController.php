<?php


namespace App\Http\Controllers;
use App\Models\ModelPrincipal;
use App\Models\User;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

     //variaveis
    private $objUser;
    private $objPessoa;


    public function __construct()
    {
       $this->objUser = new User();
       $this->objPessoa = new ModelPrincipal();
    }
 
 
     public function ver()
    {   
        $pessoas=$this->objPessoa->all()->sortBy('id');
        return view('home',compact('pessoas'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objUser->all();
        $pessoas=$this->objPessoa->all();
         return view('create',compact('users','pessoas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $user = auth()->user();
        $user->user_id = $user->id;


        $this->validate($request, array(
            'nome' => 'required|max:255',
            
         ));

         $this->validate($request, array(
            'id_user' => 'required|max:255',
            
         ));

         $this->validate($request, array(
            'idade' => 'required|max:255',
            
         ));

        $cad=$this->objPessoa->create([
            'nome'=>$request->nome,
            'id_user'=>$request->id_user,
            'idade'=>$request->idade
         ]);
         if($cad){
             return redirect('create');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
       echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      
        
        $pessoas=$this->objPessoa->find($id);
        $users=$this->objUser->all();
        return view('editar',compact('pessoas','users'));
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

        $this->objPessoa->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'idade'=>$request->idade,
            'id_user'=>$request->id_user
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        ModelPrincipal::findorFail($id)->delete();

        return redirect('/');

    }
}
