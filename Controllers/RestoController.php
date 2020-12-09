<?php
namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\restaurant;
use App\registor;
use Illuminate\Support\Facades\Validator;
use Crypt;

class RestoController extends Controller
{
    public function index()
    {
        $data= restaurant::paginate(4);

        return view('home',['data'=>$data]);
        //return view('home');
    }
    public function login()
    {
        return view('login');
    }
    public function list()
    {
        $data= restaurant::paginate(4);

        return view('list',['data'=>$data]);
    }
    public function data(Request $request)
    {
        // $valid=$request->validate([
        //     "name"    =>    "required|max:40",
        //     "email"   =>    "required|email",
        //     "address" =>    "required|max:40",
        // ]);

        // //print_r($request->input()) ;
        // $name=$request->input('name');
        // $email=$request->input('email');
        // $address=$request->input('address');
        // $company = new restaurant;
        // $company->name =$name;
        // $company->email =$email;
        // $company->address =$address;
        // $company->save();
        // $request->session()->flash('status','Data Submited Succesfully');
        // return redirect('add');

        // //.................................
        $valid=$request->validate([
            "name"    =>    "required|max:40",
            "email"   =>    "required|email",
            "address" =>    "required|max:40",
            "RestoImg"=>    "required",
        ]);

        //print_r($request->input()) ;
        $name=$request->input('name');
        $email=$request->input('email');
        $address=$request->input('address');
        $img =$request->file('RestoImg')->store('uploads');
        $company = new restaurant;
        $company->name =$name;
        $company->email =$email;
        $company->address =$address;
        $company->IMAGE =$img;
        $company->save();
        $request->session()->flash('status','Data Submited Succesfully');
        return redirect('add');
    }
    public function update(Request $request)
    {
        
        //return $request->input();
        //,['data'=>$data]
        $id=$request->input('id');
        $name=$request->input('name');
        $email=$request->input('email');
        $address=$request->input('address');

        return view('update',['name'=>$name,'email'=>$email,'address'=>$address,'id'=>$id]);
    }
    public function FinalUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name"    =>    "required|max:40",
            "email"   =>    "required|email",
            "address" =>    "required|max:40",
            
        ]);
        $id=$request->input('id');
        $name=$request->input('name');
        $email=$request->input('email');
        $address=$request->input('address');
       // $img =$request->file('RestoImg')->store('uploads');
        if($request->hasFile('RestoImg'))
        {
           $img =$request->file('RestoImg')->store('uploads'); 
         }
         else{
         	
            $rest = restaurant :: find($id);
            $rest->name =$name;
            $rest->email =$email;
            $rest->address =$address;
            //$rest->IMAGE =$img;
            if($rest->save()){
                            $request->session()->flash('status',"data submitted successfully");
                            return redirect('list');
                        }






         }
        $error="something went wrong, please enter valid field and all data";
        if ($validator->fails()) {
            return view('update',['name'=>$name,'email'=>$email,'address'=>$address,'id'=>$id,'error'=>$error]);
        }
        else{
            $rest = restaurant :: find($id);
            $rest->name =$name;
            $rest->email =$email;
            $rest->address =$address;
            $rest->IMAGE =$img;
            if($rest->save()){
                            $request->session()->flash('status',"data submitted successfully");
                            return redirect('list');
                        }
        }

    }
    public function delete(Request $request)
    {
        //echo($request->input('id'));
          $rest= restaurant::find($request->input('id'));
          $rest->delete();
          $request->session()->flash('status','Data Deleted Succesfully');
        return redirect('list');
    }
    public function search(Request $request)
    {
        $name=$request->input('name');
        $data = restaurant::where('name',$name)->get();
        return view('search')->with('data', $data);
        
    }
    public function registor(Request $request)
    {
        // echo Crypt :: encrypt('xyz');
        $request->validate([
            "name"    =>    "required|max:40",
            "email"   =>    "required|email",
            "contact" =>    "required|digits:10|numeric",
            "password"=>    "required|min:7",
        ]);
        $contact=$request->input('contact');
        $name=$request->input('name');
        $email=$request->input('email');
        $password=Crypt :: encrypt($request->input('password'));
        $error="something went wrong, please enter valid field and all data";
        $regi = new registor;
        $regi->name =$name;    
        $regi->email =$email;
        $regi->contact =$contact;
        $regi->password =$password;
        if($regi->save())
            {
                $request->session()->flash('status','Data Updated Succesfully');
                return redirect('signin');
            }
        else
            {
                $request->session()->flash('status',$error);            
                return redirect('signup'); 
            }
         }
         public function checkLogin(Request $request)
         {
            $request->validate([
                "email"   =>    "required|email",
                "password"=>    "required|min:7",
            ]);
            $email=$request->input('email');
           // $password=Crypt::encrypt($request->input('password'));
            $data = registor::where("email",$request->input('email'))->get();
            $password2= Crypt ::decrypt($data[0]->password);
            if($request->input('password')==$password2)
            {
                $request->session()->put('user',$email);
                return  redirect('list');
            }
            else{
                $error="LOGIN PASSWORD DID NOT MATCH";
                $request->session()->flash('status',$error);            
                return redirect('signin'); 
            }
         }
         public function signout()
         {  
            Session::flush();
            return view('signin');
  
         }

         public function checkForget(Request $request)
         {
             $to_name ='Saurabh Pawar';
             $to_email =$request->email;
             $data= array('name'=>'forget password','body'=>'entered password');
             Mail::send('mail',$data,function($message) use ($to_name,$to_email)
             {
                 $message->to($to_email)->subject('Forget Password mail');
             });
         }
     
}
