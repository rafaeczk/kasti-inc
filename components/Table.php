<?php


// headers: string[]
// data: string[][]
function Table(array $headers, array $data)
{
    $thead = "";
    foreach ($headers as $header) 
        $thead .= "<td>$header</td>";
    $thead = "<thead><tr>$thead</tr></thead>";

    $tbody = "";
    foreach ($data as $item)
    {
        $row = "";
        foreach ($item as $cell) 
            $row .= "<td>$cell</td>";
        $row = "<tr>$row</tr>";
        $tbody .= $row;
    }
    $tbody = "<tbody>$tbody</tbody>";

    return "
        <table border=1>
            $thead
            $tbody
        </table>
    ";
}