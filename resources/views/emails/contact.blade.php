@component('mail::message')
### {{ $request->input('subject') }}

{{ $request->input('message') }}

@endcomponent
