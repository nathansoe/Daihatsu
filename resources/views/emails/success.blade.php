<h1>Welcome to Noman Kabeer's Blog!</h1> <p>Thank you for joining.</p>

<p>Hi {{ $payloadMail['subject'] }},</p> 
<p>Greetings!!!</p>
<img src="{{ url('storage' . $payloadMail['qr_image']) }}" alt="" title="">
{{-- <p>Hope you are doing good.</p>
<p>{{ $details['title'] }}</p>
<p>{{ $details['body'] }}</p> --}}

{{-- <img src="{{ $message->embed($pathToImage) }}"> --}}