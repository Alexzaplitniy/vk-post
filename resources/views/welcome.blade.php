<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		
    </head>
    <body>
        <div class="flex-center position-ref full-height">

			<form action="{{ action('VkController@save') }}" method="post" enctype="multipart/form-data">
				<input type="text" name="name">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="file" name="file[]">
				<input type="submit">
			</form>
			
        </div>
    </body>
</html>
