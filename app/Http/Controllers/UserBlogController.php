<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userblogs;
use DB;
class UserBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
    {
        return Userblogs::all();
    }
	public function blogbyuid($uid)
    {
        return Userblogs::where('uid','=',$uid)->firstOrFail();
    }
 
    public function show($id)
    {
        return Userblogs::find($id);
    }

    public function store(Request $request)
    {
        return Userblogs::create($request->all());
    }

    public function update(Request $request, $id)
    { 
		$data = ['title' => $request->input('title'), 'body' => $request->input('body')];	
		$blog =DB::table('userblogs')
            ->where('uid', '=', $request->input('uid'))
            ->where('id', '=', $id)           
			->update($data);         
       if($blog) 
		{ 
			return response()->json(['message' =>'Blog updated successfully.',],200);
		}
		else { return response()->json(['message' =>'Blog details not found',],404);}
	}

    public function delete(Request $request, $id)
    {
      //  $blog = Userblogs::findOrFail($id);
       // $blog->delete();
		$data = ['title' => $request->input('title'), 'body' => $request->input('body')];	
		$blog =DB::table('userblogs')
            ->where('uid', '=', $request->input('uid'))
            ->where('id', '=', $id)           
			->delete();         
       if($blog) 
		{ 		   
			return response()->json(['message' =>'Blog deleted successfully.',],200);
		}
		else { return response()->json(['message' =>'Blog details not found',],404);
		}
    }
}
