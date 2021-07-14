<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-route"></i>&nbsp;&nbsp;&nbsp;&nbsp;Terminar envio</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="delivery_update">
                    <div class="row">
                         <div class="input-container col-md-12">
                            <label class="label-title">Envios disponibles</label>
                            <select class="fadeIn delivery-select form-control get-button" name="delivery-select" required>
                                <option></option>
                                @foreach($delivery_data as $value)
                                    <option value="{{ $value->ID }}">#{{ $value->ID }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="button-container d-none">
                        <button style="width: 200px;" type="submit" class="btn float-right main_btn send">Terminar<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>