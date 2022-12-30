<?php

namespace App\Http\Controllers;

use App\Models\AuthenticationOtp;
use PEAR2\Net\RouterOS;
use Exception;

use Illuminate\Http\Request;
use Symfony\Component\Routing\DependencyInjection\RoutingResolverPass;

class RouterController extends Controller
{
   public function connecttoWifi(){
    try {
        $client = new RouterOS\Client('192.168.88.1', 'admin', 'password');
      
        $DeviceConnect = $client->sendSync(new RouterOS\Request('/ip/arp/print'));
        dd($DeviceConnect);
        foreach ($DeviceConnect as $response) {
            if ($response->getType() === RouterOS\Response::TYPE_DATA) {
                dd($response->getProperty('mac-address'));
            }
        }
    } catch (Exception $e) {

        throw $e;
        //die('Unable to connect to the router.');
        //Inspect $e if you want to know details about the failure.
     }
   }

    public function subscription(){
        //return register user ke paket
        try {
            $client          = new RouterOS\Client('192.168.88.1', 'admin', 'password');
            $amount          = 5;
            $plan1           = 'bronze';
            $plan2           = 'diamond';
            $plan3           = 'gold';
            $user            = auth()->user();
            $email           = $user->name;
            $formatted_email = str_replace('','', $email);
            $add_user= new RouterOS\Request('/tool/usermanager/user/add');
             
           $client->sendSync(
               $add_user
                ->setArgument('customer','admin')
                ->setArgument('disabled', 'no')
                ->setArgument('username', $formatted_email)
                ->setArgument('password', $formatted_email)
                ->setArgument('shared-users', 1)
            );
           
            $activate_profile = new RouterOS\Request('/tool user-manager user create-and-activate-profile');
            
            $client->sendSync(
                $activate_profile
                ->setArgument('customer', 'admin')
                ->setArgument('profile', $plan2)
                ->setArgument('numbers', $formatted_email)
            );

            $authen = AuthenticationOtp::where('package', $plan2)->where('status', 1)->first();
                if(!$authen){
                   
                }
        
        
            $authentication = new AuthenticationOtp();
            $authentication->user_name =  $formatted_email;
            $authentication->password  =  $formatted_email;
            $authentication->user_id  =  auth()->id();
            $authentication->package = $plan2;
            $authentication->status = 1;
            $authentication->amount = $amount;
            $authentication->save();
            return redirect('/home');
        }catch (Exception $e) {
            throw $e;
            //die('Unable to connect to the router.');
            //Inspect $e if you want to know details about the failure.
         }
       }

       public function hostpotUsers(){
        $client = new RouterOS\Client('192.168.88.1', 'admin', 'password');
        $activate_profile = new RouterOS\Request('/tool user-manager user Print');  
        
        $users_Hotspot = $client->sendSync( $activate_profile);

       }



    }




