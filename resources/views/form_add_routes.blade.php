<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-route"></i>&nbsp;&nbsp;&nbsp;&nbsp;Agregar ruta a envio</h3>
            </div>
            <div class="card-body">
                <div class="result"></div>
                <form  class="form" action="add_route">
                    <input type="hidden" class="point_a" name="point_a" value="">
                    <div class="row">
                         <div class="input-container col-md-12">
                            <label class="label-title">Envios disponibles</label>
                            <select url="get_last_point" class="fadeIn delivery-select form-control get-last-point" name="delivery_id" required>
                                <option></option>
                                @foreach($delivery_data as $value)
                                    <option value="{{ $value->ID }}">#{{ $value->ID }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-container col-md-12 d-none delivery-data">
                            <hr>
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
                    <div class="input-container d-none delivery-data">
                        <hr>
                        <label class="label-title">Clientes</label>
                        <select class="fadeIn customer-select form-control search_address" name="customer_id" required url="get_address">
                            <option></option>
                            @foreach($customer_data as $value)
                                <option value="{{ $value->ID }}">{{ $value->NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-container d-none delivery-data">
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
                       <b>Punto A (ultima entrega del envio):&nbsp;&nbsp;</b><span class="point-a"></span><br>
                       <b>Punto B:&nbsp;&nbsp;</b><span class="point-b"></span>
                       <div>
                           <button type_delete="cliente" data="customer-select" type="submit" style="width: 130px;" class="btn float-right main_btn send" disabled>agregar ruta<i style="padding-left:5px;" class="fa fa-send"></i></a></button>
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>