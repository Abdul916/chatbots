<?php
if (!function_exists('admin_url')) {
    function admin_url() {
        return url('admin');
    }
}
if (!function_exists('formated_date')) {
    function formated_date($datee){
        return date("d/m/Y" , strtotime($datee));
    }
}
if (!function_exists('date_formated')) {
    function date_formated($datee){
        return date("d-m-Y" , strtotime($datee));
    }
}
if (!function_exists('db_date')) {
    function db_date($datee){
        return date("Y-m-d" , strtotime($datee));
    }
}
if (!function_exists('js_date_formate')) {
    function js_date_formate(){
        return "dd/mm/yyyy";
    }
}
if (!function_exists('dateTimeCC')) {
    function date_time($time) {
        return $newDateTime = formated_date($time)." ".date('h:i A', strtotime($time));
    }
}
if(!function_exists('get_complete_tabled')) {
    function get_complete_tabled($table) {
        $data = DB::table($table)->get();
        return $data;
    }
}
if (!function_exists('get_complete_table')){
    function get_complete_table($table='', $primary_key='', $where_value='', $orderby='', $sorted='') {
        $query = DB::table($table);
        if ($primary_key) {
            $query->where($primary_key, $where_value);
        }
        if ($sorted) {
            $query->orderBy($orderby, $sorted);
        }else{
            $query->orderBy('id', 'ASC');
        }
        $data = $query->get();
        return $data;
    }
}
if (!function_exists('get_single_value')) {
    function get_single_value($table, $value, $id) {
        $query = DB::table($table)
        ->select($value)
        ->where('id', $id)
        ->first();
        return $query->$value;
    }
}
if (!function_exists('get_section_content')) {
    function get_section_content($meta_tag, $meta_key)
    {
        $query = DB::table('settings')
        ->select('meta_value')
        ->where('meta_tag', $meta_tag)
        ->where('meta_key',$meta_key)
        ->first();
        return $query->meta_value;
    }
}