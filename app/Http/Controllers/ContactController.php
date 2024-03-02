<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactPostRequest;

class ContactController extends Controller
{
    public function all(){
        
        
        
         $contacts =  ContactModel::all();
         
         $list = array();
         
         foreach($contacts as $contact){
             array_push($list, array("id"=> $contact->id, "name"=> $contact->name, "email"=> $contact->email, "number"=> $contact->number));
         }
           
        
        return view("contacts", ["allcontacts"=> $list, "auth"=> Auth::check()]);
    }
    
    public function addContact(){
        if(Auth::check()){
             return view("addcontact");
        }else{
            echo json_encode(array("ans"=> "Error","sms"=> "Need to have AUTH USER !",));
        }
       
    }
    
    public function postContact(ContactPostRequest $request){
        
        if( $request->validated()){
            $name  = filter_var($request["edit_name"], FILTER_SANITIZE_STRING);
        
        $email  = filter_var($request["email"], FILTER_SANITIZE_STRING);
        
        $number  = filter_var($request["number"], FILTER_SANITIZE_STRING);
        
        if(!empty($name) && !empty($email) && !empty($number)){
            
            $contact = new ContactModel();
            $contact->name = $name;
            $contact->email = $email;
            $contact->number = $number;
            $contact->save();
            return Redirect::to('https://pedroduarte2-lv.recruitment.alfasoft.pt');

           
        }else{
            echo json_encode(array("ans"=> "Error","sms"=> "Need more data to add !"));
        }
        }
        
      
      
    }
    public function editContactForm($id){
         if(Auth::check()){
         if(!empty($id)){
             $contact =  ContactModel::find($id);
             
              return view("editcontact", ["contact" =>$contact]);
        }else{
            echo json_encode(array("ans"=> "Error","sms"=> "id is empty!"));
        }
         }else{
              echo json_encode(array("ans"=> "Error","sms"=> "Need to have AUTH USER !"));
         }
    }
    
        public function editContact(ContactPostRequest $request){
            
             if( $request->validated()){
                 
            $id = filter_var($request["id"], FILTER_SANITIZE_STRING);
            $name = filter_var($request["edit_name"], FILTER_SANITIZE_STRING);
            $email = filter_var($request["email"], FILTER_SANITIZE_STRING);
            $number = filter_var($request["number"], FILTER_SANITIZE_STRING);
            
         if(!empty($id) && !empty($name) && !empty($email) && !empty($number)){
             $contact =  ContactModel::find($id);
              $contact->name = $name;
            $contact->email = $email;
            $contact->number = $number;
            $contact->save();
              return Redirect::to('https://pedroduarte2-lv.recruitment.alfasoft.pt');
        }else{
            echo json_encode(array("ans"=> "Error","sms"=> "id is empty!"));
        }
             }
    }
    public function deleteContact($id){
        if(!empty($id)){
             $contact =  ContactModel::find($id);
             $contact->delete();
              return Redirect::to('pedroduarte2-lv.recruitment.alfasoft.pt');
        }else{
            echo json_encode(array("ans"=> "Error","sms"=> "id is empty!"));
        }
    }
}
