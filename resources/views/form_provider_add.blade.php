<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Alta Provedor</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="add_provider">
                	<div class="input-container">
	                    <div class="input-group form-group">
	                        <div class="input-group-prepend">
	                            <span class="input-group-text"><i class="fas fa-user"></i></span>
	                        </div>
	                        <input type="text" class="form-control validate-text" name="name" placeholder="NOMBRE PROVEDOR" required>
	                    </div>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control" name="description" placeholder="DESCRIPCION PROVEDOR">
                        
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