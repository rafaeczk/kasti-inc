<?php

function FormModal(string $id, string $formAction, string $method, string $confirmText, string $content)
{
    return "
        <style>
            #$id.modal-curtain {
                display: none;
                position: fixed;
                inset: 0;
                backdrop-filter: blur(5px);
            }
            #$id.modal-curtain.active {
                display: block;
            }
            #$id .modal-window {
                position: fixed;
                left: 50%;
                top: 50%;
                translate: -50% -50%;
                background-color: white;
                padding: 10px;
                min-width: 400px;
                border-radius: 10px;
            }
            #$id .buttons {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
            }
        </style>
        <div class=modal-curtain id=$id>
            <div class=modal-window>
                <form action=$formAction method=$method>
                    $content
                    <div class=buttons>
                        <button type=button class=close-button>Anuluj</button>
                        <button type=submit name=$id>$confirmText</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            const close = () => document.querySelector('.modal-curtain#$id').classList.remove('active')
            document.querySelector('#$id.modal-curtain .close-button').addEventListener('click', close)
            document.querySelector('#$id.modal-curtain').addEventListener('click', close)
        </script>
    ";
}
