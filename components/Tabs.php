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

    $id = "ID".rand();

    $script = !$current ? "
        <script>
            document.querySelector('#$id button').click();
        </script>
    " : "";

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
                display: inline-flex;
                gap: 5px;
                border: 1px solid white;
                margin: 5px 0;
                padding: 0 5px;
            }
            .tabs .current-tab {
                background-color: white;
                color: black;
            }
        </style>
        <form method=GET id=$id action='#'>
            <div class=tabs>
                $form
            </div>
        </form>
        $script
    ";
}