{include file="header.tpl"}
    

<div class="mt-5 w-25 mx-auto">
<form action="verificacion" method="post">
    <h2>Inicie sesion en su cuenta</h2>
    <div class="mb-3">
        <label  class="form-label">Email:</label>
        <input name="email" type="mail"  class="form-control" required>
    </div>
    
    <div class="mb-3">
      <label  class="form-label">Contraseña:</label>
      <input name="password" type="password" class="form-control" required >
    </div>
    {if !empty($error)}
        <div class="alert alert-danger mt-3">
            {$error}
        </div>
    {/if}
    
    <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
{include file="footer.tpl"}