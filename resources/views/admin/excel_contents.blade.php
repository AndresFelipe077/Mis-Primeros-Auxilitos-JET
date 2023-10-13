<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Descripción</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contents as $content)
            <tr>
                <td>{{ $content->id }}</td>
                <td>{{ $content->title }}</td>
                <td>{{ $content->autor }}</td>
                <td>{{ $content->description }}</td>
                <td>{{ $content->url }}</td>
            </tr>
        @endforeach
    </tbody>
</table>