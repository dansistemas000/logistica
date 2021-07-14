<form class="form_register form" action="add_customer">
    <div class="row">
        <div class="col-md-6 input-container">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control validate-text" name="first_name" placeholder="NOMBRE(S)" required="required">
                
            </div>
        </div>
        <div class="col-md-6 input-container">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control validate-text" name="last_name" placeholder="APELLIDOS" required="required">
                
            </div>
        </div>
        <div class="col-md-6 input-container">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                </div>
                <input type="text" class="form-control validate-text" name="phone" placeholder="TELÉFONO" required>
                
            </div>
        </div>
        <div class="col-md-6 input-container">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="text" class="form-control validate-text" name="email" placeholder="CORREO ELECTRÓNICO" required>
                
            </div>
        </div>
        <div class="col-md-6 input-container">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                </div>
                <input type="text" class="form-control validate-text" name="postal_code" placeholder="CODIGO POSTAL" required>
                
            </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-12 input-container">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <input type="text" class="form-control validate-text" name="address" placeholder="DIRECCIÓN" required>
                
            </div>
        </div>
        <div class="col-md-6 input-container">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="password" class="form-control validate-pass validate-text" placeholder="CONTRASEÑA" required>
            </div>
        </div>
        <div class="col-md-6 input-container">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="confirm-password" class="form-control validate-text validate-pass2" placeholder="CONFIRMAR CONTRASEÑA" required>
            </div>
        </div>
        <div class="col-md-12">
            <br>
            <div class="form-group">
                <button style="width: 200px;" type="submit" class="btn float-right login_btn main_btn send" disabled>Registrar<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
            </div>
        </div>
    </div>
</form>
           