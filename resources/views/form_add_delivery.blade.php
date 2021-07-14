<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="far fa-paper-plane"></i>&nbsp;&nbsp;&nbsp;&nbsp;Crear Envio</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="add_delivery">
                    <input type="hidden" class="point_a" name="point_a" value="Calle Dr Velasco 73, Doctores, Cuauhtémoc, 06720 Ciudad de México, CDMX">
                    <div class="row">
                        <div class="input-container col-md-12">
                           <label class="label-title">Productos</label>
                           <select url="get_quantity" class="fadeIn product-select form-control search_quantity" name="product_id" required>
                               <option></option>
                               @foreach($product_data as $value)
                                   <option value="{{ $value->ID }}">{{ $value->NAME }}</option>
                               @endforeach
                           </select>
                       </div>
                        <div class="data-quantity d-none col-md-6">
                           <label for=""><b>Disponibles:&nbsp;&nbsp;<span value="" class="quantity"></span></b></label>
                        </div>
                        <div class="data-quantity d-none col-md-6 input-container">
                           <div class="input-group form-group">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="fas fa-plus-circle"></i></span>
                                   </div>
                                   <input type="number" class="form-control validate-text text-quantity" name="quantity" placeholder="CANTIDAD" value="" required="required">
                                   
                           </div>
                        </div>
                    </div>
                    <div class="input-container">
                        <hr>
                        <label class="label-title">Clientes</label>
                        <select class="fadeIn customer-select form-control search_address" name="customer_id" required url="get_address">
                            <option></option>
                            @foreach($customer_data as $value)
                                <option value="{{ $value->ID }}">{{ $value->NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-container">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <input type="text" class="form-control validate-text text-address" name="point_b" placeholder="DIRECCIÓN" value="" required="required">
                            
                        </div>
                    </div>
                    <div class="location d-none">
                       <div class="location-container">
                      
                       </div>
                       <b>Punto A:&nbsp;&nbsp;</b><span class="point-a"></span><br>
                       <b>Punto B:&nbsp;&nbsp;</b><span class="point-b"></span>
                       <div>
                           <button type_delete="cliente" data="customer-select" type="submit" class="btn float-right main_btn send" disabled>Crear envio<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>