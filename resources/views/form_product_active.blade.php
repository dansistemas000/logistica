<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-chevron-circle-up"></i>&nbsp;&nbsp;&nbsp;&nbsp;Re-activar Producto</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="active_product">
                    <div class="input-container">
                        <label class="label-title">Productos dados de baja</label>
                        <select class="fadeIn product-select form-control validate-select" name="id" required>
                            <option></option>
                            @foreach($data as $value)
                                <option value="{{ $value->ID }}">{{ $value->NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type_delete="producto" data="product-select" type="submit" class="btn float-right main_btn active" disabled>Re-activar<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>