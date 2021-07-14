<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-route"></i>&nbsp;&nbsp;&nbsp;&nbsp;Localizar envio</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="add_route">
                    <div class="row">
                         <div class="input-container col-md-12">
                            <label class="label-title">Envios disponibles</label>
                            <select class="fadeIn delivery-select form-control get-location" required>
                                <option></option>
                                @foreach($delivery_data as $value)
                                    <option value="{{ $value->ID }}">#{{ $value->ID }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="location-container d-none" id="location-container"></div>
                </form>
            </div>
        </div>
    </div>
</div>