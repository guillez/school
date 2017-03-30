<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Materia;

use DB;

class MateriasController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('materias.index', []);
	}

	public function create(Request $request)
	{
	    return view('materias.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$materia = Materia::findOrFail($id);
	    return view('materias.add', [
	        'model' => $materia	    ]);
	}

	public function show(Request $request, $id)
	{
		$materia = Materia::findOrFail($id);
	    return view('materias.show', [
	        'model' => $materia	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM materias a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE nombre LIKE '%".$_GET['search']['value']."%' ";
		}
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;


		$qcount = DB::select("SELECT COUNT(a.id) c".$presql);
		//print_r($qcount);
		$count = $qcount[0]->c;

		$results = DB::select($sql);
		$ret = [];
		foreach ($results as $row) {
			$r = [];
			foreach ($row as $value) {
				$r[] = $value;
			}
			$ret[] = $r;
		}

		$ret['data'] = $ret;
		$ret['recordsTotal'] = $count;
		$ret['iTotalDisplayRecords'] = $count;

		$ret['recordsFiltered'] = count($ret);
		$ret['draw'] = $_GET['draw'];

		echo json_encode($ret);

	}


	public function update(Request $request) {
	    //
	    /*$this->validate($request, [
	        'name' => 'required|max:255',
	    ]);*/
		$materia = null;
		if($request->id > 0) { $materia = Materia::findOrFail($request->id); }
		else { 
			$materia = new Materia;
		}
	    

	    		
			    $materia->id = $request->id?:0;
				
	    		
					    $materia->nombre = $request->nombre;
		
	    		
					    $materia->curso = $request->curso;
		
	    		
					    $materia->orden = $request->orden;
		
	    	    //$materia->user_id = $request->user()->id;
	    $materia->save();

	    return redirect('/materias');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$materia = Materia::findOrFail($id);

		$materia->delete();
		return "OK";
	    
	}

	
}