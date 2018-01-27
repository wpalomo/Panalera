@extends('adminlte::page')
@section('content')
@include('errors.messages')
@include('admin.contabilidad.menucontable')
@include('admin.contabilidad.infosection')
<section class="content">
    <div class="row">
        @include('admin.tipocuenta.sidebar')
        <div class="col-md-10 col-lg-10 col-xs-12 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">Configuración Modulo Contable</div>
                <div class="panel-body">

                    <a href="{{ url('/admin/cuenta/create') }}" class="btn btn-success btn-xs" title="Registrar Cuenta">
                        <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                    </a>

                    <a href="{{ url('/admin/confcontbl/' . '1' . '/edit') }}" title="Editar Condiguración"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                    <form method="GET" action="{{ url('/admin/cuenta') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>TIPO</th>
                                    <th>ESTADO</th>
                                </tr>
                            </thead>
                            @foreach($config as $item)
                            <tbody>
                                <tr>
                                    <td>GENERAR CONTABILIDAD</td> 
                                    <td>
                                        @if(($item->generar_contabilidad)=='1')
                                        <small class="label label-success">Activo</small>
                                        @else
                                        <small class="label label-danger">Inactivo</small>
                                        @endif 
                                    </td>
                                </tr>
                                <tr>
                                 <td>ASIENTOS AUTOMATICO COMPRAS</td> 
                                 <td>
                                     @if(($item->assauto_compras)=='1')
                                     <small class="label label-success">Activo</small>
                                     @else
                                     <small class="label label-danger">Inactivo</small>
                                     @endif 
                                 </td>
                             </tr>
                             <tr>
                                 <td>ASIENTOS AUTOMATICO VENTAS</td> 
                                 <td>
                                    @if(($item->assauto_ventas)=='1')
                                    <small class="label label-success">Activo</small>
                                    @else
                                    <small class="label label-danger">Inactivo</small>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                             <td>ASIENTOS AUTOMATICO PAGOS</td> 
                             <td>
                                @if(($item->assauto_pagos)=='1')
                                <small class="label label-success">Activo</small>
                                @else
                                <small class="label label-danger">Inactivo</small>
                                @endif
                            </td>
                        </tr>
                        <tr>
                         <td>ASIENTOS AUTOMATICO GASTOS</td> 
                         <td>
                            @if(($item->assauto_gastos)=='1')
                            <small class="label label-success">Activo</small>
                            @else
                            <small class="label label-danger">Inactivo</small>
                            @endif
                        </td>
                    </tr>
                    <tr>
                     <td>ASIENTOS AUTOMATICO COSTOS</td> 
                     <td>
                         @if(($item->assauto_costos)=='1')
                         <small class="label label-success">Activo</small>
                         @else
                         <small class="label label-danger">Inactivo</small>
                         @endif
                     </td>
                 </tr>
                 <tr>
                     <td>ASIENTOS AUTOMATICO INVERSIONES</td>
                     <td>
                        @if(($item->assauto_inversiones)=='1')
                        <small class="label label-success">Activo</small>
                        @else
                        <small class="label label-danger">Inactivo</small>
                        @endif
                    </td>
                </tr>
                <tr>
                 <td>ASIENTOS AUTOMATICO COBROS</td> 
                 <td>
                    @if(($item->assauto_cobros)=='1')
                    <small class="label label-success">Activo</small>
                    @else
                    <small class="label label-danger">Inactivo</small>
                    @endif
                </td>
            </tr>
            <tr>
             <td>ASIENTOS AUTOMATICO SUELDOS</td> 
             <td>
                 @if(($item->assauto_sueldos)=='1')
                 <small class="label label-success">Activo</small>
                 @else
                 <small class="label label-danger">Inactivo</small>
                 @endif
             </td>
         </tr>
         <tr>
             <td>ASIENTOS AUTOMATICO OBLIGACIONES</td> 
             <td>
                 @if(($item->assauto_obligaciones)=='1')
                 <small class="label label-success">Activo</small>
                 @else
                 <small class="label label-danger">Inactivo</small>
                 @endif
             </td>
         </tr>
         <tr>
             <td>ASIENTOS AUTOMATICO IMPUESTOS</td> 
             <td>
                 @if(($item->assauto_impuestos)=='1')
                 <small class="label label-success">Activo</small>
                 @else
                 <small class="label label-danger">Inactivo</small>
                 @endif
             </td>
         </tr>
         <tr>
             <td>ASIENTOS AUTOMATICO SERVICIOS</td> 
             <td>
                 @if(($item->assauto_servicios)=='1')
                 <small class="label label-success">Activo</small>
                 @else
                 <small class="label label-danger">Inactivo</small>
                 @endif
             </td>
         </tr>
         <tr>
          <td>ASIENTOS AUTOMATICO CREDITOS</td>  
          <td>
             @if(($item->assauto_creditos)=='1')
             <small class="label label-success">Activo</small>
             @else
             <small class="label label-danger">Inactivo</small>
             @endif
         </td>
     </tr>
 </tbody>
 @endforeach
</table>
<div class="pagination-wrapper"> {!! $config->appends(['search' => Request::get('search')])->render() !!} </div>
</div>

</div>
</div>
</div>
</div>
</section>
@endsection
