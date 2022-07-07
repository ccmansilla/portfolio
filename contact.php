<?php $active = "contact.php"; ?>
<?php require_once 'header.php'; ?>
<div class="content__centrado">
<h2 class="section__subtitle">Mensaje</h2>
<br>
<div class="formulario">        
    <form class="section__form" action="">
            <label class="form-label" for="nombre">Nombre:</label>
            <input class="form-control" type="text" id="nombre" name="nombre" required>
            <br>
            <label cclass="form-label" for="email">Email:</label>
            <input  class="form-control" type="email" name="email" required>
            <br>
            <label class="form-label" for="mensaje">Mensaje:</label> <br>
            <textarea  class="form-control" name="mensaje" id="mensaje" cols="60" rows="10" required></textarea>
            <br>
            <input type="submit" class="btn btn-success" value="Enviar">
            <br>
    </form>
</div>
</div>
<?php require_once 'footer.php'; ?>