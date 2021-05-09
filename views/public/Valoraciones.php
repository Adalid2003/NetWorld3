<!-- MANDAR A LLAMAR HELPERS  -->
<?php
include("../../app/helpers/header_template.php");
?>
<!-- INICIALIZATION DE SELECT-->
<script>
var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(options);
</script>
<head>
<H1 class="black-text text-lighten-3 center-align">Tu opinion es muy Importante para nosotros</H1>


<!-- CARD CON OPINION-->

<div class="row">


      <div class="card center-align">
      <h4 class="card-title">Escribe tu opinion respecto a la calidad de servicio de nuestra tienda y envios de los productos</h4>
      <div class="row">
    <form class="col s12"> 
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1 text-white" class="materialize-textarea"></textarea>
          <label for="textarea1">
        </div>
      </div>
    </form>
  </div>
  
  <div class="form-field center-align">
                <button class="btn-large blue">Enviar</button>  

       <!-- CARD CON SELECT Y CLASIFICACION-->
  </div>    

  <div class="card">
      <h4 class="card-title">Califique del 1 al 10 La calidad y durabilidad de los productos </h4>
      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
                
                
                <div class="input-field col s12">
                  <select class="browser-default">
                    <option value="" disabled selected>Elija una opcion</option>
                    <option value="1"> 1-Horrible</option>
                    <option value="2">2-Mala</option>
                    <option value="3">3-Defectuoso</option>
                    <option value="3">4-Regular</option>
                    <option value="3">5-Normal</option>
                    <option value="3">6-Bueno pero puede mejorar</option>
                    <option value="3">7-Bueno</option>
                    <option value="3">8-Muy bueno</option>
                    <option value="3">9-Excelente</option>
                    <option value="3">10-Perfecto</option>
                  </select>
                  <div class="form-field center-align">
                <button class="btn-large blue">Enviar</button>
                  <label></label>
                  
     

                  

                  
 <!-- MANDAR A LLAMAR HELPERS CON EL FOOTER -->
<?php
include("../../app/helpers/template_footer_public.php");
?>