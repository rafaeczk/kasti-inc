<?php

function FormModal(string $id, string $formAction, string $method, string $confirmText, string $content)
{
    return "
        <style>
            #$id.modal.active {
                display: block;
            }
            #$id.modal {
                display: none;
            }
            #$id.modal .modal-curtain {
                position: fixed;
                inset: 0;
                backdrop-filter: blur(5px);
            }
            #$id.modal .modal-window {
                position: fixed;
                left: 50%;
                top: 50%;
                translate: -50% -50%;
                background-color: white;
                padding: 20px;
                min-width: 400px;
            }
            #$id.modal .buttons {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
            }
            #$id.modal hr {
                margin: 20px 0;
            }
            #$id.modal input, #$id.modal button, #$id.modal select {
                background-color: white;
                color: black;
            }
            #$id.modal .modal-content {
                display: grid;
                grid-template-columns: 1fr;
                gap: 10px;
            }
        </style>

        <div id=$id class=modal>
            <div class=modal-curtain></div>

            <div class=modal-window>
                <form action=$formAction method=$method>
                    <div class=modal-content>
                        $content
                    </div>

                    <hr />

                    <div class=buttons>
                        <button type=button class=close-button>Anuluj</button>
                        <button type=submit name=$id>$confirmText</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            const close = () => document.querySelector('#$id.modal').classList.remove('active')

            document.querySelector('#$id.modal .close-button').addEventListener('click', close)
            document.querySelector('#$id.modal .modal-curtain').addEventListener('click', close)
        </script>
    ";
}

function OpenModalButton(string $id, string $text)
{
    return "
        <button id=$id type=button class=open-modal-btn>
            $text
        </button>

        <script>
            document.querySelector('#$id.open-modal-btn').addEventListener('click', () => 
                document.querySelector('#$id.modal').classList.add('active')
            )
        </script>
    ";
}
