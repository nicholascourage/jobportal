@component('mail::message')
# Introduction

Hi {{$data['friend_name']}}, {{$data['your_name']}}({{$data['your_email']}}) has recommended this job for you. 

@component('mail::button', ['url' => $data['jobUrl']])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
