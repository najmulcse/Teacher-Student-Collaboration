<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Validator;
class CommentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request , $gid , $pid, $type)
    {
        $rules=[
         'body'         =>'required',
        ];
         $p_id=$request->p_comment_id;
         //$this->validate($request,$rules);
         $validate=Validator::make($request->all(),$rules);
         if($validate->fails())
         {
            return back()->withErrors($validate)->withInput()->with('p_id',$p_id);
         }
         $body=$request->body;
         $user_id=Auth::user()->id;
         $status=Comment::create([

            'group_id'    => $gid,
            'post_id'     => $pid,
            'user_id'     => $user_id,
            'comment'     => $body
            ]);
         
         if($status && $type=='P')
         {
            return redirect()->route('allPosts',$gid);
         }
         else if($status && $type=='L')
         {
            return redirect()->route('allLectures',$gid);
         }
         else
            return redirect()->route('id',$gid);
    }
public function update(Request $request , $gid , $pid,$cid, $type)
    {
        $rules=[
         'body'         =>'required',
        ];
         //$p_id=$request->p_comment_id;
         //$this->validate($request,$rules);
         $validate=Validator::make($request->all(),$rules);
         if($validate->fails())
         {
            return back()->withErrors($validate)->withInput()->with('p_id',$pid);
         }
         $body=$request->body;
         $user_id=Auth::user()->id;
         // $status= Comment::where('group_id',$gid)
         //                        ->where('post_id',$pid)->first();
      
         $status = Comment::findOrFail($cid)
                    ->update(['comment'=>$body]);
        
         
         if($status && $type=='P')
         {
            return redirect()->route('allPosts',$gid);
         }
         else if($status && $type=='L')
         {
            return redirect()->route('allLectures',$gid);
         }
         else
            return redirect()->route('id',$gid);
    }

public function edit($gid , $pid,$cid, $type)
    {
        
        $comment = Comment::findOrFail($cid);
        return view('groups.editComment',compact('gid','pid','type','comment'));
    	 // if($status && $type=='P')
    	 // {
    	 // 	return redirect()->route('allPosts',$gid);
    	 // }
    	 // else if($status && $type=='L')
    	 // {
    	 // 	return redirect()->route('allLectures',$gid);
    	 // }
    	 // else
    	 // 	return redirect()->route('id',$gid);
    }


public function delete($gid,$cid)
    {
      
        
        $comment  =Comment::findOrFail($cid)->delete();
              
      if($comment){
      return back()->with('msg','Successfully deleted');
      }
      else
        return back()->with('msg','wrong!Try again');
    }


    public function test1($id)
    {
       return view('blank');
    }
    public function test2(Request $request)
    {
        $rules= [
            'name' => 'required|min:5'
        ];

        $this->validate($request,$rules);

        return "Ok";
    }
}
