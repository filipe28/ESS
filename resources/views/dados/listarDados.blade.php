
@extends('home')
@section('title','Dados do Packet Tracer' )
@section('content')

    <form action="#" method="get" class="form-group">
        @csrf
        <div class="form-row form-inline  align-items-center">
            <div class="form-group col-auto">
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Nome"/>
            </div>

            <div class="form-group col-auto">
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email"/>
            </div>

            <div class="form-group col-auto mr-2">
                <select name="adm" class="form-control" id="inputType">
                    <option value="none" disabled selected>Tipo de utilizador</option>
                    <option value="1">Administrador</option>
                    <option value="0">Normal</option>
                </select>
            </div>

            <div class="form-group col-auto mr-2">
                <select name="bloqueado" class="form-control" id="inputType">
                    <option value="none" disabled selected>Utilizador Bloqueado?</option>
                    <option value="1">Bloqueado</option>
                    <option value="0">Não Bloqueado</option>
                </select>
            </div>

            <div class="form-group col-auto">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <hr class="colorgraph">

    <table class="table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Temperatura</th>
                <th>Humidade</th>
                <th>Percentagem da Bateria</th>
                <th>Luminosidade</th>
                <th>Há movimento?</th>
                <th>Candeeiro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $info)
                <tr>
                    <td>{{$info->created_at->format('d M Y')}}</td>
                    <td>{{$info->created_at->format('H:i:s')}}</td>
                    <td>{{$info->temperatura}}ºC</td>
                    <td>{{$info->humidade}}%</td>
                    <td>{{$info->percBateria}}%</td>
                    <td>{{$info->claridade}}</td>
                    <td>
                        @if($info->haMovimento)
                            Há movimento
                        @else
                            Não há movimento
                        @endif
                    </td>
                    <td>
                        @if($info->ledAceso)
                            Ligado
                        @else
                            Desligado
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dados->withQueryString()->links() }}
@endsection

