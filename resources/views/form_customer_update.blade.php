<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-pen"></i>&nbsp;&nbsp;&nbsp;&nbsp;Actualizar Cliente</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="update_customer">
                    <div class="input-container">
                        <label class="label-title">Clientes</label>
                        <select class="fadeIn customer-select form-control search_customer update_select_2" name="id" required>
                            <option></option>
                            @foreach($data as $value)
                                <option value="{{ $value->ID }}">{{ $value->NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="objects-update d-none">
                        <hr>
                        <div class="row">
                            <div class="col-md-6 input-container">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control validate-text first_name" name="first_name" placeholder="NOMBRE(S)" value="" required="required">
                                    
                                </div>
                            </div>
                            <div class="col-md-6 input-container">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control validate-text last_name" name="last_name" placeholder="APELLIDOS" required="required">
                                    
                                </div>
                            </div>
                            <div class="col-md-6 input-container">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                    </div>
                                    <input type="text" class="form-control validate-text phone" name="phone" placeholder="TELÉFONO" required>
                                    
                                </div>
                            </div>
                            <div class="col-md-6 input-container">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control validate-text email" name="email" placeholder="CORREO ELECTRÓNICO" required>
                                    <div style="font-size: 10px;"><b>Si cambia el correo electrónico del cliente cambiará el usuario del cliente.</b></div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6 input-container">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                    </div>
                                    <input type="text" class="form-control validate-text postal_code" name="postal_code" placeholder="CODIGO POSTAL" required>
                                    
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-12 input-container">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control validate-text address" name="address" placeholder="DIRECCIÓN" required>
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="form-group">
                                    <button style="width: 200px;" type="submit" class="btn float-right login_btn main_btn send">Actualizar<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>