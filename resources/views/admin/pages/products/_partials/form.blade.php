@csrf
<div class="form-group">
    <label for="Nome">Nome:</label>
    <input class="form-control" type="text" name="name" id="name" placeholder="Nome:" value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="Descrição">Descrição:</label>
    <input class="form-control" type="text" name="description" id="description" placeholder="Descrição:" value="{{ $product->description ?? old('description') }}">
</div>
<div class="form-group">
    <label for="Preço">Preço:</label>
    <input class="form-control" type="text" name="price" id="price" placeholder="Preço:" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <label for="Imagem">Imagem</label>
    <input class="form-control" type="file" name="image" id="image">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>