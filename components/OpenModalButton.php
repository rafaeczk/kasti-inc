<?php

function OpenModalButton(string $id, string $text)
{
    return "
        <button id=$id type=button>
            $text
        </button>

        <script>
            document.querySelector('button#$id').addEventListener('click', () => 
                document.querySelector('.modal-curtain#$id').classList.add('active')
            )
        </script>
    ";
}