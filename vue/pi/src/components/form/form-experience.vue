<template>
    <form method="POST" name="CvExperience" action="/pi/cv-experience/main" class="form-vertical" id="CvExperience">

        <div class="clearfix"></div>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Compañia</label>
                    <input type="text" name="company" class=" form-control" value="">
                </div>
            </div>
        <div class="clearfix"></div>

        <div class="clearfix"></div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Cargo (Normalizado por Perfil IT)</label>
                    <select name="job" class=" form-control">
                        <option value=""></option>
                        <option value="1">Operador de Soporte Tecnico</option>
                        <option value="2">Implementador</option>
                        <option value="3">Lider de Proyecto</option>
                        <option value="4">Programador</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Cargo (Personalizado)</label>
                    <input type="text" name="customJob" class=" form-control" value="">
                </div>
            </div>
        <div class="clearfix"></div>


        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label class="control-label">Desde</label>
                <input type="date" name="dateFrom" class=" form-control" value="">
            </div>
            <div class="form-group">
                <input type="hidden" name="currentJob" value="0"><input type="checkbox" name="currentJob"
                                                                        autocomplete="off" value="1">
                Actualmente trabajo aquí
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label class="control-label">Hasta</label>
                <input type="date" name="dateTo" class=" form-control" value="">
            </div>
        </div>

        <div class="clearfix"></div>
        <div id="form-group-summary">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Resumen Breve (160 Caracteres)</label>
                    <input type="text" name="summary" class=" form-control" value="">
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="clearfix"></div>
        <div id="form-group-desc">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Descripción detallada (1000 Caraceteres)</label>
                    <textarea name="description" class=" form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>


        <div class="input-hidden">
            <input type="hidden" name="id" value="">
        </div>

        <div class="col-lg-12 col-xs-12">
            <input type="submit" name="submitbtn" class="btn btn-primary" value="Submit">
        </div>
    </form>
</template>

<script>
  export default {
    name: 'form-experience',
    props: [
      'id','company','job','customJob','from','to','currentJob','summary', 'description'
    ]
    data() {
      return {
        msg: 'Welcome'
      }
    }
  }
</script>
