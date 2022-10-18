{include file="header.tpl"}
<div class="container">
<a href="inicio">Volver</a>

<h2>{$cancion->nombre}</h2>
<ul>
    <li>Año en que salio: {$cancion->anio}</li>
    <li>genero: {$cancion->genero}</li>
</ul>
</div>
{include file="footer.tpl"}