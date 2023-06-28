<x-slot name="footer">
    <x-footer />
</x-slot>

</x-app-layout>
    <h1>Add Answer</h1>

    <form method="POST" action="{{ route('answers.store', $question) }}">
        @csrf

        <div class="form-group">
            <label for="content">Respuesta</label>
            <textarea class="form-control" name="content" id="content" rows="3"></textarea>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_correct" name="is_correct" value="1"
                {{ $answer->is_correct ? 'checked' : '' }}>
            <label class="form-check-label" for="is_correct">Respuesta correcta</label>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('questions.show', $question->id) }}"
            class="btn btn-danger">Regresar</a>
    </form>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
<x-slot name="footer">
    <x-footer />
</x-slot>

</x-app-layout>
