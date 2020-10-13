@component('mail::message')
# Introduction

bleep bloop yadda yadda

- a list
- goes
- here

@component('mail::button', ['url' => 'https://laracasts.com'])
Visit Laracasts
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
