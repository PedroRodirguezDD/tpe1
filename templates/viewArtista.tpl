{include file="header.tpl"}

{include file="form_artista.tpl"}
<div class="container">
<h2>Lista de artistas:</h2>
<div style="display:flex; align-items:flex-end;flex-wrap:wrap;justify-content:space-around"> 
    {foreach from=$artistas item=$artista }
            <div class="card" style="width: 20rem;margin: 1rem;" >
                <img src="{$artista->imagen}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{$artista->nombre} - id: {$artista->id}</h5>
                    <a href="itemXcategoria/{$artista->id}" type="button" class="btn btn-primary">Ver canciones</a>
                    {if isset($smarty.session.user)}
                        <a href="deleteArtista/{$artista->id}" type="button" class="btn btn-danger">Eliminar</a>
                        <a href="formEditar_artista/{$artista->id}" type="button" class="btn btn-success">Editar</a>
                    {/if} 
                </div>
            </div>
    {/foreach}
</div>
</div>

{include file="footer.tpl"}