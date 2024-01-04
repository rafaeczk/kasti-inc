<script>
    if(new URLSearchParams(window.location.search).get()){}
</script>


<?php

// items: {
//     label: string
//     value: string
// }[]
function Tabs(array $items, ?string $queryName = 'tab')
{
    $form = "";
    $current = isset($_GET[$queryName]) ? $_GET[$queryName] : null;

    foreach($items as $i)
        $form .= "
            <button
                class='".($current == $i['value'] ? "current-tab" : "")."'
                value='".$i['value']."'
                name='$queryName'
                type='submit'
            >"
                .$i['label']."
            </button>";

    return "
        <style>
            .tabs {
                display: flex;
                gap: 5px;
            }
            .tabs .current-tab {
                background-color: white;
                color: black;
            }
        </style>
        <form method=GET action='#'>
            <div class=tabs>
                $form
            </div>
        </form>
    ";
}