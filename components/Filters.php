<?php

// fields: {
//     name: string
//     label: string
//     type: text | select
//     selectItems: {
//         label: string
//         code: string
//     }[]
// }[]
function Filters(array $fields)
{
    $elements = "";
    foreach($fields as $field)
        switch($field['type'])
        {
        case "text":
            $value = isset($_GET[$field['name']]) ? $_GET[$field['name']] : '';
            $elements .= "<input type='text' name='".$field['name']."' value='$value' placeholder='".$field['label']."' />";
            break;
            
        case "select":
            $selected = isset($_GET[$field['name']]) ? $_GET[$field['name']] : '-';
            $select = "<option ".($selected == '-' ? "selected" : "")." value=''>-</option>";
            foreach($field['selectItems'] as $i)
                $select .= "<option ".($selected == $i['code'] ? "selected" : "")." value='".$i['code']."'>".$i['label']."</option>";
            $elements .= "<select name='".$field['name']."'>$select</select>";
            break;
        }
    return "
        <form method=GET>
            $elements
            <button type=submit>Szukaj</button>
        </form>
    ";
}