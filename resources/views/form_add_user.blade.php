<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Alta usuario empresarial</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form class="form_register form" action="add_user_company">
                    <input type="hidden" value="3" name="profile_id">
                    <div class="row">
                        <div class="col-md-12 input-container">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control validate-text" name="user" placeholder="USUARIO" required="required">
                            </div>
                        </div>
                        <div class="col-md-12 input-container">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control validate-text" name="company" placeholder="NOMBRE EMPRESA" required="required">
                                
                            </div>
                        </div>
                        <div class="col-md-12 input-container">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control validate-pass validate-text" placeholder="CONTRASEÑA" required>
                            </div>
                        </div>
                        <div class="col-md-12 input-container">
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
                                <button style="width: 200px;" type="submit" class="btn float-right main_btn send" disabled>Registrar<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


           