<?php


// headers: string[]
// data: string[][]
function Table(array $headers, array $data)
{
    $thead = "";
    foreach ($headers as $header) 
        $thead .= "<th>$header</th>";
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
    if(count($data) == 0)
        $tbody = "<tr><td style='text-align: center' colspan=".count($headers).">Brak danych</td></tr>";
    $tbody = "<tbody>$tbody</tbody>";

    return "
        <style>
            .table-container {
                overflow-x: auto;
                white-space: nowrap;
            }
            .table-container table.table {
                border-collapse: collapse;
                color: white,
            }
            .table-container table.table thead th {
                padding: 5px 20px;
                text-align: left;
                font-size: 15px;
                color: rgb(160, 160, 160);
            }
            .table-container table.table tbody td {
                padding: 5px 20px;
                font-size: 25px;
                border-top: 1px solid gray;
            }
        </style>
        <div class='table-container'>
            <table class='table'>
                $thead
                $tbody
            </table>
        </div>
    ";
}
