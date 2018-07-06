<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title> Password Reset</title>
	</head>
	<body>
		
            Hi {{ $username }},	 

                    <p>To reset the password, click the link below. Your changes will update the password for your Multichannel access account.	 </p><br>
                    <a href='{{ URL::to("user/reset-password/$csrf_token/$id") }}'><button type="button" class="btn btn-primary submit">Reset Password</button></a>

            <p>If you didn't request this, please ignore this email.</p>

            <p>Your password won't change until you access the link above and create a new one.</p>
            <p></p>
            <p></p>
        <p>Thank you, <br>
		MovoEasy Team</p>
    </body>
</html>