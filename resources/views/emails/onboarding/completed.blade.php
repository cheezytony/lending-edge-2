@component('mail::message')
## Hey {{ $user->first_name }}

You've successfully completed your onboarding.

Head into your dashboard to request for your first loan.

@component('mail::button', ['url' => route('user.dashboard')])
Go to Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}.
@endcomponent
