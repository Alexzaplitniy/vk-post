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

			<form action="{{ action('PostController@fileUpload') }}" method="post" enctype="multipart/form-data">
				<input type="text" name="name">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="file" name="file[]" id="file" multiple>
				<input type="submit">
			</form>

        </div>

        <script>
            var input = document.getElementById('file');
            input.addEventListener('change', function (e) {
                var files = e.srcElement.files;
                var formData = new FormData();
                var xhr = new XMLHttpRequest();
                for(var i = 0; i < files.length; i++) {
                    formData.append("file[]", files[i], files[i].name);
                }
                xhr.open('POST', 'http://localhost:8000/api/post/upload', true);

                xhr.setRequestHeader("Cache-Control", "no-cache");
                xhr.setRequestHeader("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImM3N2RkNWIzOTQ0ZWFlMTM1ZDIxNDJiMGQ2MWI0ZTgyZTIzZjkxYTQ4YWQyODk0ZTQ4NDBiNDEwN2IzNDFiYzlmY2MwMzRlOTQ5MWVjODJkIn0.eyJhdWQiOiIyIiwianRpIjoiYzc3ZGQ1YjM5NDRlYWUxMzVkMjE0MmIwZDYxYjRlODJlMjNmOTFhNDhhZDI4OTRlNDg0MGI0MTA3YjM0MWJjOWZjYzAzNGU5NDkxZWM4MmQiLCJpYXQiOjE0ODIzNDMwMDIsIm5iZiI6MTQ4MjM0MzAwMiwiZXhwIjoxNTEzODc5MDAyLCJzdWIiOiI0Iiwic2NvcGVzIjpbIioiXX0.Y33xv8tpWN9L2H6fJycHERh3Q--uecrp5_Hvg-fPRDR5S8sO14c--mmZ-GUNm5X53ix_yzng8PT8-SWyu56093jR_Fp7wbeSj-CsnJmUPxuxv3cMANC0bPm2Kq_dwdT-iJzDilHjPsN-ArXUsVGrMC9RzygW5ZfCKiK4mizXx_35iU4EVvqoofNNDAaSuB-pJdSIP9ZjPca6IVnrnwbLWirlw6_9pzS4djOzHgW3uAC83N-JiX_3L7WqjYBcCXMSaSfIXITmanHnOVlaiURtpERcCLewahEoZ3QLDLu8g4q2tkNWCJnwHm1T4Fnwn751lF1t8QSWLhp3asZbctqKjuqpuWVxSi8ycE4zfaYSbqtaeLa-26scv8wR_FLXDZYjvxFYQS9feTduTpHgE5fHuKG5Goz8m6HBeRlq3a-Koex-WxVU6u2HjAxwtZdV2u3INLvy6zneGZ2klbzABfLcJYSrP44MbRiSGG3O34-xWl5ja-UUgf79Px89eANJPRA2JLDLfis8uG_J4dehP5msV8wMqueJFlZZ1_GwY4EOfl_rn--cZCciIXyCKNU3LT8Gq9iRn6VXCqby4wHfWV2hMvQysyf-Dmod36zNjhC-QrwOn1pqUyJgLTCUhB492aMtfC1S6PHAv427yJlCiQhGlKEZx7ghyi26kROh4Xspvco");

                xhr.send(formData);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            console.log(JSON.parse(xhr.response));
                        } else {
                            console.log(xhr.response);
                        }
                    }
                };


            });
        </script>
    </body>
</html>
