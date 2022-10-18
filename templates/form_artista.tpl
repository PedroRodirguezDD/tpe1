
{if !empty($art)} {include file="header.tpl"}{/if}
<div class="container" style="padding: 2rem;">
    {if isset($smarty.session.user)}
        
        {if !empty($art)} <a href="artistas">Volver</a>{/if}

        <form action="{if !empty($art)}editarArtista{else}addArtista{/if}" method="post" enctype="multipart/form-data">
            {if !empty($art)}<h2>Formulario para editar artista</h2>{else}<h2>Formulario para agregar artista</h2>{/if}

            {if !empty($art)}
                <div class="mb-3">
                    <input name="id" type="hidden"  value="{$art->id}" class="form-control" >
                </div>
            {/if}
            <div class="mb-3">
            <label  class="form-label">Nombre:</label>
            <input name="nombre" value="{if !empty($art)}{$art->nombre}{/if}" type="text" class="form-control" required >
            </div>
            <div class="mb-3">
            <label  class="form-label">imagen:</label>
            <input name="imagen" value="{if !empty($art)}{$art->imagen}{/if}" type="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">{if !empty($art)}Editar{else}Agregar{/if}</button>
        </form>
    {/if}
</div>
{include file="footer.tpl"}