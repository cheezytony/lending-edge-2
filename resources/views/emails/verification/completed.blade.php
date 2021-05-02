@component('mail::message')
## Hey {{ $user->first_name }}

You've successfully completed your {{ str_replace('_', ' ', $verification->type) }}.

You're doing great.

Thanks,<br>
{{ config('app.name') }}.
@endcomponent
