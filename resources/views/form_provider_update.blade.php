<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-pen"></i>&nbsp;&nbsp;&nbsp;&nbsp;Actualizar Provedor</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="update_provider">
                    <div class="input-container">
                        <label class="label-title">Proveedores</label>
                        <select class="fadeIn provider-select form-control search_provider update_select" name="id" required>
                            <option></option>
                            @foreach($data as $value)
                                <option value="{{ $value->ID }}">{{ $value->NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="objects-update d-none">
                        <div class="input-container">
                            <hr>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control validate-text name" name="name" placeholder="NOMBRE PROVEDOR" value="" required>
                            </div>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                            </div>
                            <input type="text" class="form-control description validate-text" name="description" placeholder="DESCRIPCION PROVEDOR" value="">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn float-right main_btn send" disabled>Actualizar<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>