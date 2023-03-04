const form = document.querySelector('form');
const contenedoresDiv = document.getElementById('contenedores');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // Evita que se recargue la página

  const numeroContenedores = parseInt(document.getElementById('floatingInput').value);

  // Borra los contenedores anteriores antes de generar los nuevos
  contenedoresDiv.innerHTML = '';

  // Genera los nuevos contenedores
  for (let i = 1; i <= numeroContenedores; i++) {
    const nuevoContenedor = document.createElement('div');
    nuevoContenedor.innerHTML = 

    <p>
    
            <div class="pregunta-container" id="pregunta-container">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="title"
                        placeholder="name@example.com"/>
                    <label for="floatingInput" class="texto-login">Titulo</label>
                    <div class="text-center">
                        @error('title')
                            <span class="text-danger text-center">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group m-3 mx-auto text-center">
                    <label class="pe-auto" for="exampleFormControlFile1" id="src-file">Escoge una
                        imagen</label>
                    <div>
                        <img class="rounded mx-auto m-2" src="{{ asset('img/icons/subir.png') }}" id="imgPreview"
                            width="150px" height="150px"/>
                    </div>
                    <label for="file-upload" class="subir">
                        <i class="bi bi-cloud-upload-fill h5"></i> Subir imagen
                    </label>
                    <input type="file" value="{{ old('file') }}"
                        class="form-control-file mx-auto text-center d-none" id="file-upload"
                        onchange="previewImage(event, '#imgPreview')" accept="image/*" name="image" />
                    <div class="text-center">
                        @error('image')
                            <span class="text-danger text-center">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                                name="respuesta1"/>
                            <label for="floatingInput" class="texto-login">respuesta 1</label>
                        </div>
                        <div class="text-center">
                            @error('respuesta1')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" name="respuesta2"
                                placeholder="name@example.com"/>
                            <label for="floatingInput" class="texto-login">respuesta 2</label>
                        </div>
                        <div class="text-center">
                            @error('respuesta2')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>


            <button type="submit" class="mb-5 btn btn-success">Subir</button>

</p>


































    contenedoresDiv.appendChild(nuevoContenedor);
  }

});