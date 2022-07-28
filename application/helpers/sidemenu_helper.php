<?php
/****
 * DEVELOPER: OITOC DEV
 * Author: Santo Doni Romadhoni
 * email: oitocdev@gmail.com
 * 
 * Menu samping, model simpel 1 level
 */
function sidemenu($selected=""){

    $CI = & get_instance();

    $CI->load->model('permission_m');

    $role = $CI->session->userdata('role'); 
    
    /*** ambil parent permission yg statusnya adalah menu dan aktif */

    $arrRel = array();
    $resRelation = $CI->permission_m->get_permission(array('role' => $role, 'status' => 1));
    if ($resRelation){
        foreach($resRelation as $row){
            $arrRel[] = $row->permission_id;
        }
    }
   
    $strMenu = '';
    $resParent = $CI->permission_m->get_child(0);
    if ($resParent){
        $is_open= '';
        foreach($resParent as $row){
            $resChild = $CI->permission_m->get_child($row->permission_id);
            //print_r($resChild);
            if (!in_array($row->permission_id, $arrRel)) continue;
            if ($resChild){    
                //echo $selected." ".$row->parentmenu;            
                if($selected !="" && $selected == $row->parentmenu){
                    $is_open = 'menu-open';
                }else{
                    $is_open = '';
                }

                $strMenu .= '<li class="nav-item has-treeview '.$is_open.'">';
                $strMenu .= '<a href="'.site_url($row->url).'" class="nav-link">';
                if ($row->icon != ''){
                    $strMenu .= '<i class="nav-icon '.$row->icon.'"></i> <p>'.$row->name_menu.' <i class="fas fa-angle-left right"></i></p>';
                }else{
                    $strMenu .= '<i class="nav-icon far fa-circle"></i><p>'.$row->name_menu.' <i class="fas fa-angle-left right"></i></p>';
                }
                $strMenu .= '</a><ul class="nav nav-treeview">';

                foreach($resChild as $rowchild){

                    if (!in_array($rowchild->permission_id, $arrRel)) continue;

                    $strMenu .= '<li class="nav-item" style="padding-left:20px;">
                        <a href="'.site_url($rowchild->url).'" class="nav-link">';

                    if ($rowchild->icon != ''){
                        $strMenu .= '<i class="nav-icon '.$rowchild->icon.'"></i>';
                    }else{
                        $strMenu .= '<i class="nav-icon far fa-circle"></i>';
                    }
                        
                    $strMenu .= ' <p>'.$rowchild->name_menu.'</p></a>
                    </li>';
                }

                $strMenu .= '</ul>';

            }else{
                $strMenu .= '<li class="nav-item">';
                $strMenu .= '<a href="'.site_url($row->url).'" class="nav-link">';
                if ($row->icon != ''){
                    $strMenu .= '<i class="nav-icon '.$row->icon.'"></i>';
                }else{
                    $strMenu .= '<i class="nav-icon far fa-circle"></i>';
                }
                $strMenu .= ' <p>'.$row->name_menu.'</p></a>';
            }

            $strMenu .= '</li>';
        }
    }
    return $strMenu;
}