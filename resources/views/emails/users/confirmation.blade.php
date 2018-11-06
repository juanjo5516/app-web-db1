@component('mail::message')
# Hola {{ $user->name }}

Bienvenido a **{{ config('app.name') }}**.

¡Gracias por registrarse en nuestro sistema!

Por favor confirme su cuenta haciendo click en el siguiente boton

@component('mail::button', ['url' => config('app.url')."/register/verify/$user->confirmation_code"])
    Confirmar email
@endcomponent

Atentamente,<br>
{{ config('app.name') }}

@component('mail::subcopy')
Si tiene problemas para hacer click en el boton "Confirmar email", copie y pegue en su
navegador web la siguiente URL: {{ config('app.url')."/register/verify/$user->confirmation_code" }}]
@endcomponent

@endcomponent