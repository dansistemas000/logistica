<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-pen"></i>&nbsp;&nbsp;&nbsp;&nbsp;Actualizar Contraseña</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form class="form" action="add_passupdate">
                        <input type="hidden" name="id"  value="{{ $id }}">
                        <div class="col-md-12 input-container">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="old-password" class="form-control validate-text" placeholder="CONTRASEÑA ACTUAL" required>
                            </div>
                        </div>
                        <div class="col-md-12 input-container">
                            <hr>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="new-password" class="form-control validate-pass validate-text" placeholder="NUEVA CONTRASEÑA" required>
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
                                <button style="width: 200px;" type="submit" class="btn float-right login_btn main_btn send" disabled>Actualizar<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
           