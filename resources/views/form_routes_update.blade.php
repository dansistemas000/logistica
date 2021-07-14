<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-truck-moving"></i>&nbsp;&nbsp;&nbsp;&nbsp;Actualizar estatus de ruta(s)</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form">
                    <input type="hidden" class="point_a" name="point_a" value="">
                    <div class="input-container col-md-12">
                        <label class="label-title">Envios en ruta</label>
                        <select url="get_routes_detail" class="fadeIn delivery-select form-control get-routes" name="delivery_id" required>
                            <option></option>
                            @foreach($delivery_data as $value)
                                <option value="{{ $value->ID }}">#{{ $value->ID }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="routes-detail">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>