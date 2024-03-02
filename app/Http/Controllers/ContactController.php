<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function all(){
        
        
         $contacts =  ContactModel::all();
         
         $list = array();
         
         foreach($contacts as $contact){
             array_push($list, array("id"=> $contact->id, "name"=> $contact->name, "email"=> $contact->email, "number"=> $contact->number));
         }
           
        
        return view("contacts", ["allcontacts"=> $list]);
    }
    
    public function addContact(){
        return view("addcontact");
    }
    
    public function postContact(Request $request){
        
        
        $name  = filter_var($request["edit_name"], FILTER_SANITIZE_STRING);
        
        $email  = filter_var($request["edit_email"], FILTER_SANITIZE_STRING);
        
        $number  = filter_var($request["edit_number"], FILTER_SANITIZE_STRING);
        
        if(!empty($name) && !empty($email) && !empty($number)){
            
            $contact = new ContactModel();
            $contact->name = $name;
            $contact->email = $email;
            $contact->number = $number;
            $contact->save();
            return Redirect::to('pedroduarte2-lv.recruitment.alfasoft.pt');

            echo json_encode(array("ans"=> "Success"));
        }else{
            echo json_encode(array("ans"=> "Error","sms"=> "Need more data to add !"));
        }
      
    }
    public function editContactForm($id){
         if(!empty($id)){
             $contact =  ContactModel::find($id);
             
              return view("editcontact", ["contact" =>$contact]);
        }else{
            echo json_encode(array("ans"=> "Error","sms"=> "id is empty!"));
        }
       
    }
    
        public function editContact(Request $request){
            
            $id = filter_var($request["id"], FILTER_SANITIZE_STRING);
            $name = filter_var($request["edit_name"], FILTER_SANITIZE_STRING);
            $email = filter_var($request["edit_email"], FILTER_SANITIZE_STRING);
            $number = filter_var($request["edit_number"], FILTER_SANITIZE_STRING);
            
         if(!empty($id) && !empty($name) && !empty($email) && !empty($number)){
             $contact =  ContactModel::find($id);
              $contact->name = $name;
            $contact->email = $email;
            $contact->number = $number;
            $contact->save();
              return Redirect::to('pedroduarte2-lv.recruitment.alfasoft.pt');
        }else{
            echo json_encode(array("ans"=> "Error","sms"=> "id is empty!"));
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
