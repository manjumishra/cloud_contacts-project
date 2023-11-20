<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    public function addcontact()
    {
        return view('user.addcontact');
    }
    public function sendcontact(Request $req)
    {
        $val=$req->validate([
          'firstname'=>['required','min:5'],
          'lastname'=>['required','min:5'],
          'email'=>['required','email'],
          'phonenumber'=>['required','digits:10','starts_with:6,7,8,9'],
          'status'=>['required'],
        ]);
        if($val)
        {
            $id=Auth::user()->id;
            $data=new contact();
            $data->firstname=$req->firstname;
            $data->lastname=$req->lastname;
            $data->email=$req->email;
            $data->phonenumber=$req->phonenumber;
            $data->address=$req->address;
            $data->nickname=$req->nickname;
            $data->company=$req->company;
            $data->userid=$id;
            $data->status=$req->status;
            if($data->save())
            {
                return redirect('showcontact');
                // return back()->with('error','Contacts added Successfully!!'); 
            }
            else
            return back()->with('error','Contacts not added');   
        }
        
    }


    public function showcontact(Request $req)
    {
        $id=Auth::user()->id;
        $search=$req['search'] ?? "";
        if($search!="")
        {
            $sel=contact::where('userid',$id)->where('firstname','LIKE',"%$search%")->where('userid',$id)->orwhere('email','LIKE',"%$search%")
            ->where('userid',$id)->orwhere('phonenumber','LIKE',"%$search%")->paginate(10);
            //  $sel=contact::where('userid',$id)->where('firstname','LIKE',"%$search%")->paginate(10);
        }
        else 
        $sel=contact::where('userid',$id)->paginate(10);
        return view('user.contactlist',compact('sel','search'));
    }

    public function edit($id)
    {
        $data=contact::where('id',$id)->get()->first();
        return view("user.editcontact",compact('data'));
    }


    public function update(Request $req)
    {
        $val=$req->validate([
          'firstname'=>'required',
          'lastname'=>'required',
          'email'=>['required','email'],
          'phonenumber'=>['required','digits:10','starts_with:6,7,8,9'],
          'status'=>['required'],
        ]);
        if($val)
        {
            $userid=Auth::user()->id;
            $data=contact::where('id',$req->id)->update([
              'firstname'=>$req->firstname,
              'lastname'=>$req->lastname,
              'email'=>$req->email,
              'phonenumber'=>$req->phonenumber,
              'address'=>$req->address,
              'nickname'=>$req->nickname,
              'company'=>$req->company,
               'userid'=>$userid,
               'status'=>$req->status,
            ]);
            if($data)
            {
                // return back()->with('success','Contact updated successfully');
                return redirect("showcontact");
            }
            else
            return back()->with('error','Contacts not updated');   
        }
        
    }



    public function share($id)
    {
        $sel=contact::where('id',$id)->get();
        return view('user.contactById',compact('sel'));
    }

    // public function sharedata($id)
    // {
    //     $data=contact::where('id',$id)->get()->first();
    //     return view('user.sharecontact',compact('data'));
    // }

    
    public function sharedata($id)
    {
        $data=contact::where('id',$id)->get()->first();
        $url="http://127.0.0.1:8000/sharebyid/".$data->id;
        return view('user.sharecontact',compact('url'));
    }



       
    public function delete($id)
    {
        // $del=User::find($id)->delete();
        $del=contact::destroy($id);
        if($del)
        {
            return redirect('showcontact');
        }
        else
        return back()->with('error','Somthing went wrong!! please try again');
    }
}
