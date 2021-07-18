@component('mail::message')

name - {{ $inquirie->name }}<br>
email - <a href = "mailto: {{ $inquirie->email }}">{{ $inquirie->email }}</a> <br>
phone - <a href="tel:{{ $inquirie->phone }}">{{ $inquirie->phone }}</a> <br>

send a Message

@component('mail::panel')
{{ $inquirie->message }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
