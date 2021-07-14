<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-chevron-circle-up"></i>&nbsp;&nbsp;&nbsp;&nbsp;Re-Activar Provedor</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="active_provider">
                    <div class="input-container">
                        <label class="label-title">Proveedores dados de baja</label>
                        <select class="fadeIn provider-select form-control validate-select" name="id" required>
                            <option></option>
                            @foreach($data as $value)
                                <option value="{{ $value->ID }}">{{ $value->NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type_delete="proveedor" data="provider-select" type="submit" class="btn float-right main_btn active" disabled>Re-Activar<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>