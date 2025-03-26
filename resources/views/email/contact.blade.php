@component('mail::message')
    # New Contact Form Submission

    **Email:** {{ $email }}

    **Message:**
    {{ $message }}
@endcomponent
