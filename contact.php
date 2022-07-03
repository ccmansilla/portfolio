<?php require_once 'header.php'; ?>
<h2 class="section__subtitle">Ubicacion Las Higueras, Río Cuarto, Córdoba</h2>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13370.767031184434!2d-64.29426957457493!3d-33.0908931166045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95cdfe5393651ee1%3A0x9dbd07aa672c0ef4!2sLas%20Higueras%2C%20R%C3%ADo%20Cuarto%2C%20C%C3%B3rdoba!5e0!3m2!1ses-419!2sar!4v1656859862537!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<br/>
<br/>
<h2 class="section__subtitle">Enviame un mensaje</h2>
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
            <input type="submit" class="btn btn-primary" value="Enviar">
            <br>
    </form>
</div>
<?php require_once 'footer.php'; ?>