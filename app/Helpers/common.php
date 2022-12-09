<?php

use App\Models\Connection;

        function get_common_conntections($authUser,$otherUser){
          
            $authUserConnections = Connection::select('id')->where('status','approve')->where('requested_from',$authUser)->get();
            $otherUserConnections = Connection::select('id')->where('status','approve')->where('requested_to',$otherUser)->get();
            $arrayAuthUser = array();
            $arrayOtherUser = array();
            
            foreach($authUserConnections as $authUserConnection){
                array_push($arrayAuthUser,$authUserConnection->id);
            }

            foreach($otherUserConnections as $otherUserConnection){
                array_push($arrayOtherUser,$otherUserConnection->id);
            }

            $result = array_intersect($arrayAuthUser, $arrayOtherUser);
           
            return count($result);
        }
        

?>