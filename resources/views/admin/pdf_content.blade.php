<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contenidos</title>

    <link rel="stylesheet" href="js_css_admin/pdf.css">

</head>

<body>
    <div class="container">
        <div>
            <img src="img/logo/logo.png" alt="Logo" width="60" height="50">
            <h3>Mis primeros auxilitos</h3>
        </div>
        <table class="table">
            <caption>Reporte de contenidos</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Descripción</th>
                    <th>Imagén</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $content)
                    <tr>
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->title }}</td>
                        <td>{{ $content->autor }}</td>
                        <td>{{ $content->description }}</td>
                        <td>
                            @if ($content->url)
                                @php
                                    $extension = pathinfo($content->url)['extension'];
                                @endphp
                                @if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif' || $extension == 'svg')
                                    <img class="imagen rounded mx-auto d-block" src="{{ $content->url }}"
                                        alt="Image of content" id="img-content" width="80px" height="80px">
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
