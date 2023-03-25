<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <?= form_label('Tipo', 'tipo') ?>
            <?= form_dropdown([
                'name' => 'tipo',
                'id' => 'tipo',
                'class' => 'form-control'
            ], [
                '' => '-- Selecione --',
                'adm' => 'Administrador',
                'med' => 'Médico',
                'sec' => 'Secretário',
                'pac' => 'Paciente'
            ], $tipo ?? '', 'required') ?>
        </div>
    </div>
</div>