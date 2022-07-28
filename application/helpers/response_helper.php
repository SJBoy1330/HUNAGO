<?php

function alert_show($msg, $type){

    $str = "";
    if ($msg != ""){

        $str = '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert" style="        position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999;border-radius:0px;">
    '.$msg.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

    }
    return $str;
}

// function response_message($array=array()){

//   /**** status, type, namavar, namavar2, pesancustom */


//   /** status :
//    * 1. error => NOK
//    * 2. success => OK
//    * 
//    * type :
//    * 1. empty
//    * 2. tidak sama
//    * 3. format tidak benar
//    * 4. sudah pernah terisi
//    * 
//    * name variable sesuai dgn nama variablenya.
//    */

//    $strpesan = "";

//    if (isset($array['type'])){

//     switch ($type) {
//       case '1':
//         if (isset($array['pesancustom']) && $array['pesancustom'] != ""){
//           $strpesan = $array['pesancustom'];
//         }else{
//           $strpesan = "tidak boleh kosong";
//         }
//         break;
      
//         case '2':
//         $strpeesan = "tidak sama dengan ".$namevariable2;
//         break;
        
//         case '3': 
//           $strpesan = "format tidak sesuai";
//         break;
        
//         case '4':

//           break;
//     }
//   }


//   $pesan = $namavariable . " "

//  // $array = array('status' => $type, )
// }