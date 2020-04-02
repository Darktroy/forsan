<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class TicketMessages extends Model
{
        protected $table = 'TicketMessages';
    protected $primaryKey = 'TicketMessages_id';
    protected $fillable = [ 'Ticket_id' ,'user_id', 'ticket_body','type'];
    // Relations 
    
    // CRUD operations 
    public function storeData(Request $request) {
        $validator = Validator::make($request->all(), [
            'Ticket_id' => 'required|exists:Ticket,Ticket_id',
            'ticket_body' => 'required|min:5'
            ]);
        if ($validator->fails()) {
            $error = $validator->messages()->toArray();$error_msg = [];
            foreach ($error as $er) { $error_msg[] = $er[0]; }
            throw new Exception(serialize($error_msg));
        }
        $user = auth()->user()->toArray();  
        $data  = self::create(array('user_id' => $user['user_id'],'Ticket_id' => $request->Ticket_id, 
            'ticket_body' => $request->ticket_body , 'type'=>'user'));
        return $data;
    }

    
}
