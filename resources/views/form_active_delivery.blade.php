<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-truck-moving"></i>&nbsp;&nbsp;&nbsp;&nbsp;Activar envio a ruta de entrega(s)</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="active_delivery">
                    <input type="hidden" class="point_a" name="point_a" value="">
                    <div class="input-container col-md-12">
                        <label class="label-title">Envios disponibles para activar</label>
                        <select url="get_routes_detail" class="fadeIn delivery-select form-control get-routes-detail" name="delivery_id" required>
                            <option></option>
                            @foreach($delivery_data as $value)
                                <option value="{{ $value->ID }}">#{{ $value->ID }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="routes-detail d-none">
                       <div class="routes-detail-container"></div>
                            <br>
                            <div class="detail"></div>
                           <button type="submit" style="width: 130px;" class="btn float-right main_btn send">Activar envio<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>