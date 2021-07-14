<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Alta Producto</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="add_product">
                    <div class="input-container">
                        <label class="label-title">Proveedores</label>
                        <select class="fadeIn form-control validate-select provider-select" name="provider_id" required>
                            <option></option>
                            @foreach($data as $value)
                                <option value="{{ $value->ID }}">{{ $value->NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                	<div class="input-container">
	                    <div class="input-group form-group">
	                        <div class="input-group-prepend">
	                            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
	                        </div>
	                        <input type="text" class="form-control validate-text" name="name" placeholder="NOMBRE PRODUCTO" required>
	                    </div>
                    </div>
                    <div class="input-container">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-weight-hanging"></i></span>
                            </div>
                            <input type="text" class="form-control" name="weight" placeholder="PESO PRODUCTO">
                        </div>
                    </div>
                    <div class="input-container">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-receipt"></i></span>
                            </div>
                            <input type="text" class="form-control" name="description" placeholder="DESCRIPCION PRODUCTO">
                        </div>
                    </div>
                    <div class="input-container">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-plus-circle"></i></span>
                            </div>
                            <input type="text" class="form-control validate-text" name="quantity" placeholder="CANTIDAD PRODUCTO" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                    	<button type="submit" class="btn float-right main_btn send" disabled>Agregar<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>