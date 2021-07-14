<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Re-activar Cliente</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="active_customer">
                    <div class="input-container">
                        <label class="label-title">Clientes</label>
                        <select class="fadeIn customer-select form-control validate-select" name="id" required>
                            <option></option>
                            @foreach($data as $value)
                                <option value="{{ $value->ID }}">{{ $value->NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type_delete="cliente" data="customer-select" type="submit" class="btn float-right main_btn active" disabled>Re-activar<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>