<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-pen"></i>&nbsp;&nbsp;&nbsp;&nbsp;Actualizar mis Datos</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="update_customer">
                    <input type="hidden" name="id" value="{{ $data->ID }}">
                    <div class="row">
                        <div class="col-md-6 input-container">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control validate-text first_name" name="first_name" value="{{ $data->FIRST_NAME }}" placeholder="NOMBRE(S)" value="" required="required">
                                
                            </div>
                        </div>
                        <div class="col-md-6 input-container">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control validate-text last_name" name="last_name" placeholder="APELLIDOS" value="{{ $data->LAST_NAME }}" required="required">
                                
                            </div>
                        </div>
                        <div class="col-md-6 input-container">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                </div>
                                <input type="text" class="form-control validate-text phone" name="phone" placeholder="TELÉFONO" value="{{ $data->PHONE }}" required>
                                
                            </div>
                        </div>
                        <div class="col-md-6 input-container">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control validate-text email" name="email" placeholder="CORREO ELECTRÓNICO" value="{{ $data->EMAIL }}" required>
                                <div style="font-size: 10px;"><b>Si cambias tu correo electrónico cambiará tambien tu usuario.</b></div>
                                
                            </div>
                        </div>
                        <div class="col-md-6 input-container">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                </div>
                                <input type="text" class="form-control validate-text postal_code" name="postal_code" placeholder="CODIGO POSTAL" value="{{ $data->POSTAL_CODE }}" required>
                                
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-12 input-container">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" class="form-control validate-text address" name="address" placeholder="DIRECCIÓN" value="{{ $data->ADDRESS }}" required>
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <div class="form-group">
                                <button style="width: 200px;" type="submit" class="btn float-right login_btn main_btn send">Actualizar<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>