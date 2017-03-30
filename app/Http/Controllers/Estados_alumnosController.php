<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Estados_alumno;

use DB;

class Estados_alumnosController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('estados_alumnos.index', []);
	}

	public function create(Request $request)
	{
	    return view('estados_alumnos.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$estados_alumno = Estados_alumno::findOrFail($id);
	    return view('estados_alumnos.add', [
	        'model' => $estados_alumno	    ]);
	}

	public function show(Request $request, $id)
	{
		$estados_alumno = Estados_alumno::findOrFail($id);
	    return view('estados_alumnos.show', [
	        'model' => $estados_alumno	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM estados_alumnos a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE descripcion LIKE '%".$_GET['search']['value']."%' ";
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
		$estados_alumno = null;
		if($request->id > 0) { $estados_alumno = Estados_alumno::findOrFail($request->id); }
		else { 
			$estados_alumno = new Estados_alumno;
		}
	    

	    		
			    $estados_alumno->id = $request->id?:0;
				
	    		
					    $estados_alumno->descripcion = $request->descripcion;
		
	    	    //$estados_alumno->user_id = $request->user()->id;
	    $estados_alumno->save();

	    return redirect('/estados_alumnos');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$estados_alumno = Estados_alumno::findOrFail($id);

		$estados_alumno->delete();
		return "OK";
	    
	}

	
}