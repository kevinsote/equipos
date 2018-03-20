 @component('mail::layout')
 @slot('header')
     @component('mail::header', ['url' => 'http://192.168.1.182:8000/'])
            Equipos de trabajo
        @endcomponent
    @endslot


# Bienvenido



Tus datos de acceso son:<br>
Correo: {{$mail}}<br>
Contraseña: {{$pass}}

@component('mail::button', ['url' => 'http://192.168.1.182:8000/'])
Ingresar
@endcomponent

Atentamente,<br>
Kevin Garcia


@slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} Developed by KevinGC
        @endcomponent
    @endslot
@endcomponent

