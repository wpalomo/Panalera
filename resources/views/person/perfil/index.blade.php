@extends('person.page')
@section('content')
@include('errors.messages')
@include('admin.contabilidad.infosection')
<section class="content">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">CUENTA</div>
                <div class="panel-body">

                    <br/>
                    <br/>
                    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-6">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                @if(empty($perfil->foto))
                <img class="profile-user-img img-responsive img-circle" src="data:image/png;base64,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" alt="User profile picture">
                @else
                <a href="{{ asset($perfil->foto) }}" target="_black">
                <img class="profile-user-img img-responsive img-circle" src="{{ asset($perfil->foto) }}" alt="User profile picture">
                </a>
                @endif
              

              <h3 class="profile-username text-center">
                @if(!empty($perfil->nombre))
                {{ $perfil->nombre }} 
                @endif
                @if(!empty($perfil->apellido))
                {{ $perfil->apellido }}
                @endif
              </h3>

              <p class="text-muted text-center">
                @if(!empty($perfil->nombre))                
                {{ $perfil->nombre }}
                @endif
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Cedula</b> <a class="pull-right">
                @if(!empty($perfil->cedula))
                {{ $perfil->cedula }}
                @endif
              </a>
                </li>
                <li class="list-group-item">
                  <b>Ruc</b> <a class="pull-right">
                @if(!empty($perfil->ruc))
                {{ $perfil->ruc }}
                @endif
              </a>
                </li>
                <li class="list-group-item">
                  <b>Telefono</b> <a class="pull-right">
                @if(!empty($perfil->telefono))
                {{ $perfil->telefono }}
                @endif
              </a>
                </li>
                <li class="list-group-item">
                  <b>Celular</b> <a class="pull-right">
                @if(!empty($perfil->celular))
                {{ $perfil->celular }}
                @endif
              </a>
                </li>
                <li class="list-group-item">
                  <b>Cumpleaños</b> <a class="pull-right">
                @if(!empty($perfil->fecha_nacimiento))
                {{ $perfil->fecha_nacimiento }}
                @endif
              </a>
                </li>
                <li class="list-group-item">
                  <b>Estado Civil</b> <a class="pull-right">
                    @if($perfil->estado_civil===1)
                        Soltero(a)
                    @endif
                    @if($perfil->estado_civil===2)
                        Casado(a)
                    @endif
                    @if($perfil->estado_civil===3)
                       Divorciado(a)
                    @endif
                    @if($perfil->estado_civil===4)
                        Union Libre
                    @endif
                    @if($perfil->estado_civil===5)
                        Viudo(a)
                    @endif
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Genero</b> <a class="pull-right">
                    @if($perfil->genero=="0")
                        Masculino
                    @endif
                    @if($perfil->genero=="1")
                        Femenino
                    @endif
                </a>
                </li>
                <li class="list-group-item">
                  <b>Creado</b> <a class="pull-right">{{ $perfil->created_at->diffForHumans() }}</a>
                </li>
              </ul>

              <a href="{{ url('/person/settings/' . $perfil->id . '/edit') }}" class="btn btn-primary btn-block"><b>Editar</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">

          <!-- Profile Credentials -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <h3 class="profile-username text-center"> CREDENCIALES </h3>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Usuario</b> <a class="pull-right">{{ $administrador->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Correo</b> <a class="pull-right">{{ $administrador->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Clave</b> <a class="pull-right">**********</a>
                </li>                
              </ul>

              <a href="{{ url('/person/settings/' . $perfil->id_usuario . '/editcredentials') }}" class="btn btn-primary btn-block"><b>Editar</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
