

<table class="table table-dark table-striped-columns">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Año</th>
            <th>Genero</th>
            <th>Artista</th>
            <th>Funciones</th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$canciones item=$cancion }
        <tr>
            <td>{$cancion->nombre}</td>
            <td>{$cancion->anio}</td>
            <td>{$cancion->genero}</td>
            {foreach from=$artistas item=$artista}
                {if $cancion->artista_id_fk == $artista->id}
                    <td>{$artista->nombre}</td>
                {/if}
            {/foreach}
            <td>
                <a href="vermas/{$cancion->id}" type="button" class="btn btn-primary">Ver mas</a>
                <a href="deleteCancion/{$cancion->id}" type="button" class="btn btn-danger">Eliminar</a>
                <a href="formEditar_cancion/{$cancion->id}" type="button" class="btn btn-success">Editar</a>
            </td>
        </tr>
    {/foreach}

    </tbody>
</table>

<!--
{include file="form_artista.tpl"}

<h2>Lista de artistas:</h2>
<ul>  
    {foreach from=$artistas item=$artista }
        <li>
            {$artista->nombre} - id: {$artista->id} 
            <a href="itemXcategoria/{$artista->id}">Ver canciones</a>
            <a href="deleteArtista/{$artista->id}" type="button" class="btn btn-danger">Eliminar</a>
            <a href="formEditar_artista/{$artista->id}" type="button" class="btn btn-success">Editar</a>
        </li>
    {/foreach}
</ul> 
-->


{include file="footer.tpl"}