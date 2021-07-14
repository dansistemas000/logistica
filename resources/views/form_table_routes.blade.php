<div class="container">
    <div class="row">
        <div class="col-md-12 header-table">
            @if($profile_id == 1)
                ENVIOS AV GROUP
            @elseif($profile_id == 3)
                ENVIOS DE EMPRESA {{ $company }}
            @else
                MIS ENVIOS
            @endif
        </div>
        <div class="table-responsive">
            @if($data_routes)
                <table class="table table-bordered data-table table-striped table-sm" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            @php($headers = array_keys((Array)$data_routes[0]))
                            @unset($headers[0])
                            @foreach($headers as $key)
                                <th>{{ $key }}</th>
                            @endforeach
                                <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            @foreach($headers as $key)
                                <th>{{ $key }}</th>
                            @endforeach
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data_routes as $values)
                            @php($id = $values->ID)
                            @unset($values->ID)
                            <tr>
                                @foreach($values as $key => $value)
                                    <td class="td">{{ $value }}</td>
                                @endforeach
                                @if($profile_id == 2 && $values->Estatus == "ENTREGADO")
                                    <td>
                                        <div class="form-group-{{ $id }}">
                                            <button type="submit" id_route="{{ $id }}" class="btn float-right main_btn signature">Firmar<i style="padding-left:5px;" class="fa fa-pencil-square-o"></i></a></button>
                                        </div>
                                    </td>
                                @elseif($values->Estatus == "FIRMADO")
                                    <td>
                                        <a href='documents/{{ $id }}_document.pdf' download='documento_recibido'>Descargar archivo</a>
                                    </td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-danger">No hay datos disponibles</div>
            @endif
        </div>
    </div>
</div>

