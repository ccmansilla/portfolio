<?php require_once 'header.php'; ?>
<section id="contacto">        
    <h2 class="section__subtitle">Contacto</h2>
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
            <input type="reset" class="btn btn-primary" value="Reset">
            <input type="submit" class="btn btn-primary" value="Enviar">
            <br>
    </form>
</section>
<?php require_once 'footer.php'; ?>