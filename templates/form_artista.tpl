{include file="header.tpl"}
{if !empty($art)} <a href="inicio">Volver</a>{/if}

<form action="{if !empty($art)}editarArtista{else}addArtista{/if}" method="get">
    {if !empty($art)}<h2>Formulario para editar artista</h2>{else}<h2>Formulario para agregar artista</h2>{/if}

    {if !empty($art)}
        <div class="mb-3">
            <label  class="form-label">Id:</label>
            <input name="id" type="text"  value="{$art->id}" class="form-control" >
        </div>
    {/if}
    <div class="mb-3">
      <label  class="form-label">Nombre:</label>
      <input name="nombre" value="{if !empty($art)}{$art->nombre}{/if}" type="text" class="form-control" required >
    </div>
    
    <button type="submit" class="btn btn-primary">{if !empty($art)}Editar{else}Agregar{/if}</button>
</form>

{include file="footer.tpl"}