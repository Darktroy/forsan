<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Ticket\Entities\TicketMessages;
use Exception;

class Ticket extends Model
{
        protected $table = 'Ticket';
    protected $primaryKey = 'Ticket_id';
    protected $fillable = [ 'user_id','ticket_title', 'ticket_body'];
    // Relations 
    public function details() {
        return $this->hasMany('Modules\Ticket\Entities\TicketMessages', 'Ticket_id', 'Ticket_id');
    }
    // CRUD operations 
    public function storeData(Request $request) {
        $validator = Validator::make($request->all(), ['ticket_title' => 'required|min:5','ticket_body' => 'required|min:5']);
        if ($validator->fails()) {
            $error = $validator->messages()->toArray();$error_msg = [];
            foreach ($error as $er) { $error_msg[] = $er[0]; }
            throw new Exception(serialize($error_msg));
        }
        
        $user = auth()->user()->toArray();  
        $data  = self::create(array(
                    'user_id' => $user['user_id'],
                    'ticket_title' => $request->ticket_title,
                    'ticket_body' => $request->ticket_body));
       
        return $data;
    }
    
    public function showFullTicket(Request $request) {
        $validator = Validator::make($request->all(), [
            'Ticket_id' => 'required|exists:Ticket,Ticket_id']);
        if ($validator->fails()) {
            $error = $validator->messages()->toArray();$error_msg = [];
            foreach ($error as $er) { $error_msg[] = $er[0]; }
            throw new Exception(serialize($error_msg));
        }
        $user = auth()->user()->toArray();  
        return self::where('Ticket_id',$request->Ticket_id)->where('user_id',$user['user_id'])->with('details')->get()->toArray();
    }

    
}
