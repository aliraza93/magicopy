@component('mail::message')
Welcome to {{ config('app.name') }}

Congratulations! You have successfully created an account on {{ config('app.name') }}

@component('mail::button', ['url' => 'http://usemagicopy.com'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
