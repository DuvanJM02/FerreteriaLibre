<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Mail;

class MailController extends BaseController
{
    public $email;

    public function sendMail(Request $request){

        $resultado = true;

        $comments = ($request->comments) ? $request->comments : false;
        $page = ($request->page) ? $request->page : false;
        $proyecto = ($request->proyecto) ? $request->proyecto : false;

        $this->email = ($request->email) ? $request->email : false;
        
        // Validación del lado del servidor -D
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'msg' => 'required',
        ]);

        if($request->account == 'si'){
            $request->account = 'Sí';
        } else{
            $request->account = 'No';
        }

        // Capturamos todos los errores que puedan pasar (Si las dos variables anteriores no se modifican, es porque no paso ningun error)
        if($resultado){
            try {
                if($page){
                    if($page == "Contacto WEB"){

                        Mail::send("emails.notificacionContacto", ["name" => $request->name, "email" => $request->email, "phone" => $request->phone, "page" => $page, "msg" => $request->msg, "proyecto" => $request->proyecto, "account" => $request->account], function($message) {   
                            $message->to( "djaramillom0r@gmail.com", "Información de Contacto")
                            ->subject("Recibió un nuevo mensaje en la web de contacto")
                            ->bcc('duvanlol02@gmail.com', 'Información de contacto')
                            ->bcc('dlozanomulford@gmail.com', 'Información de contacto')
                            ->bcc('vilijamlee1815@gmail.com', 'Información de contacto')
                            ->bcc('op7latino34@gmail.com', 'Información de contacto');
                        });
                        
                    }
                }
            } catch (Exception $e) {
                $resultado = false;
                $error = $e->getMessage();
            }
        }
        

        return view('thanks');

    }


    
    public function isEmail($email) { 
        return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));     
    }

}
