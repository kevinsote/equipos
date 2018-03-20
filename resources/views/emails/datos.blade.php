@component('mail::message')
# Introduction

The body of your message.
Bienvenido
ahora si

Tus datos de acceso son:
Correo: {{$mail}}
Contraseña: {{$pass}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
