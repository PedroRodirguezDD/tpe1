
{include file="header.tpl"}

{if isset($smarty.session.user)}
  {if !empty($cancion)} <a href="inicio">Volver</a>{/if}

  <form action="{if !empty($cancion)}editarCancion{else}addCancion{/if}" method="get">
      {if !empty($cancion)} <h2>Formulario para editar cancion</h2>{else}<h2>Formulario para agregar canciones</h2>{/if} 

      {if !empty($cancion)}
        <div class="mb-3">
          <input name="id" type="hidden"  value="{$cancion->id}" class="form-control" >
        </div>
      {/if}
      <div class="mb-3">
        <label  class="form-label">Nombre:</label>
        <input name="nombre" type="text" {if !empty($cancion)} value="{$cancion->nombre}"{/if} class="form-control" required >
      </div>
      <div class="mb-3">
        <label  class="form-label">Año de lanzamiento:</label>
        <input name="anio" type="number" {if !empty($cancion)} value="{$cancion->anio}"{/if} class="form-control" required>
      </div>
      <div class="mb-3 form-check">
          <label class="form-label">Genero:</label>
          <input name="genero" type="text" {if !empty($cancion)} value="{$cancion->genero}"{/if} class="form-control" required>
      </div>
      <div class="mb-3 form-check">
          <label class="form-label">Artista al que pertenece la cancion:</label>
          <select name="id_artista">
          {foreach from=$artistas item=$artista }
            <option value="{$artista->id}">{$artista->nombre}</option>
          {/foreach}
          </select>
      </div>
      <button type="submit" class="btn btn-primary">{if !empty($cancion)}Editar{else}Agregar{/if}</button>
  </form>
{/if}

{include file="footer.tpl"}