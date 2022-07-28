<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
function parse_raw_http_request(array &$a_data)
{
  // read incoming data
  $input = file_get_contents('php://input');

  // grab multipart boundary from content type header
  preg_match('/boundary=(.*)$/', $_SERVER['CONTENT_TYPE'], $matches);
  $boundary = $matches[1];

  // split content by boundary and get rid of last -- element
  $a_blocks = preg_split("/-+$boundary/", $input);
  array_pop($a_blocks);

  // loop data blocks
  foreach ($a_blocks as $id => $block)
  {
    if (empty($block))
      continue;

    // you'll have to var_dump $block to understand this and maybe replace \n or \r with a visibile char

    // parse uploaded files
    if (strpos($block, 'application/octet-stream') !== FALSE)
    {
      // match "name", then everything after "stream" (optional) except for prepending newlines 
      preg_match("/name=\"([^\"]*)\".*stream[\n|\r]+([^\n\r].*)?$/s", $block, $matches);
    }
    // parse all other fields
    else
    {
      // match "name" and optional value in between newline sequences
      preg_match('/name=\"([^\"]*)\"[\n|\r]+([^\n\r].*)?\r$/s', $block, $matches);
    }
    $a_data[$matches[1]] = $matches[2];
  }        
}

function http_parse_headers( $header )
{
    $retVal = array();
    $fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $header));
    foreach( $fields as $field ) {
        if( preg_match('/([^:]+): (.+)/m', $field, $match) ) {
            $match[1] = preg_replace('/(?<=^|[\x09\x20\x2D])./e', 'strtoupper("\0")', strtolower(trim($match[1])));
            if( isset($retVal[$match[1]]) ) {
                $retVal[$match[1]] = array($retVal[$match[1]], $match[2]);
            } else {
                $retVal[$match[1]] = trim($match[2]);
            }
        }
    }
    return $retVal;
}

function arrWeekDay($key=""){
  $arr = array(
    0 => 'Min',
    1 => 'Sen',
    2 => 'Sel',
    3 => 'Rab',
    4 => 'Kam',
    5 => 'Jum',
    6 => 'Sab'
  );

  if($key){
    return $arr[$key];
  }else{
    return $arr;
  }
  
}

function reformatDate($date, $from_format = 'd/m/Y', $to_format = 'Y-m-d') {
  $date_aux = date_create_from_format($from_format, $date);
  return date_format($date_aux,$to_format);
}

function breadcrumb($parent, $arrchild=array()){

  //arrchild => $arrchild[] = array('name' => 'namanya', 'link' => urlnya);


  $str = '<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: \'#kt_content_container\', \'lg\': \'#kt_toolbar_container\'}" class="page-title d-flex flex-column align-items-start me-3 mb-5 mb-lg-0">
          <!--begin::Title-->
          <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 mb-0">'.$parent.'</h1>
          <!--end::Title-->
          <!--begin::Separator-->
          
          <!--end::Separator-->
          <!--begin::Breadcrumb-->
          <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">';

  if (is_array($arrchild) && count($arrchild)>0){

    $cnt = count($arrchild);
    
    $i = 1;
    
    foreach($arrchild as $arrval){

      if ($i == $cnt){
        $arrstr[] = '<!--begin::Item-->
          <li class="breadcrumb-item">'.$arrval['name'].'</li>
          <!--end::Item-->
          ';
      }else{
        $arrstr[] = '<!--begin::Item-->
              <li class="breadcrumb-item text-muted">
                <a href="'.$arrval['link'].'" class="text-muted text-hover-primary">'.$arrval['name'].'</a>
              </li>
              <!--end::Item-->';
      }
      $i++;
    }

    $str .= implode('<li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>', $arrstr);


  }
  $str .= '</ul>
        <!--end::Breadcrumb-->
      </div>';

  return $str;
}

function reverse_date($date)
{
  list($y, $m, $d) = explode("-", $date);
  $newdate = $d . "-" . $m . "-" . $y;
  return $newdate;
}

function reverse_fulldate($date)
{
  list($date, $time) = explode(" ", $date);
  $newdate = reverse_date($date);
  return $newdate . " " . $time;
}

function getNamaHari($number)
{
  $arrHari = array('0' => 'Minggu', '1' => 'Senin', '2' => 'Selasa', '3' => 'Rabu', '4' => 'Kamis', '5' => 'Jumat', '6' => 'Sabtu');
  return $arrHari[$number];
}


function setmenuactive($currenturl, $class){

  if (strpos($currenturl, $class)){
    return "active";
  }else{
    return "";
  }

}

function setencrypt($string){
  $stringenc = base64_encode($string);
  $stringenc = str_replace("=", "", $stringenc);
  return $stringenc;
}

function image_access($path, $filename){

  $filepath = $path.$filename;
 // $tmp = explode(".", $filename);
  $extfile =pathinfo($filepath, PATHINFO_EXTENSION);

  if($filename != '' && file_exists($filepath)){
    $im = file_get_contents($filepath);
    header("Content-type: image/".$extfile);
    echo $im;

  }

}

function image_access_svg($path, $filename){

  $filepath = $path.$filename;

  if($filename != '' && file_exists($path.$filename)){
  
    $im = file_get_contents($path.$filename);
    header("Content-type: image/svg+xml");
    echo $im;

  }

}