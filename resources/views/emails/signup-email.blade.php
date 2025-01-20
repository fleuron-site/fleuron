@component('mail::message')
# Bonjour {{ $email_data['last_name'] ." ".$email_data['first_name'] }}
<br><br>
Bienvenue sur mon site !
<br>
Veuillez cliquer sur le lien ci-dessous pour vérifier votre adresse et activer votre compte !
<br><br>
<a href="https://fleuron.tg/verify?code={{ $email_data['verification_code'] }}">Cliquez ici !</a> 
<br><br>
Thank you !
<br>
coder fleuron.tg
