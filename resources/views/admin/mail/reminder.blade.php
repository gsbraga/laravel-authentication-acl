<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
        {!!  HTML::style('packages/jacopo/laravel-authentication-acl/css/mail-base.css') !!}
        {!!  HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') !!}
	</head>
	<body>
		<h2>Recuperação de senha para {!! Config::get('acl_base.app_name') !!}</h2>
		<div>
            Nós recebemos uma requisição para alterar sua senha, se você autorizá-lo {!! $body !!}<br/>
			Caso contrário, ignore este e-mail.
		</div>
	</body>
</html>