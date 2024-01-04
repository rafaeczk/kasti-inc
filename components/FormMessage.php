<?php

// type: error | success
function FormMessage(string $type, string $message)
{
    $class = $type == 'error' ? "form-error-message" : ($type == "success" ? "form-success-message" : "");
    return "
        <div class=$class>$message</div>
    ";
}
