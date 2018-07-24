<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class DynamicDependent extends Controller
{
    function index()
    {
     $productname_list = DB::table('product')->groupBy('product_name')->get();
     return view('dynamic_dependent')->with('productname_list', $productname_list);
    }
	
	
	
	function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('product')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }
	
	
	
	
}
?>
