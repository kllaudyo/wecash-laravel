@extends('layouts.app')
@section('content')
<br />
<h4>Movimento</h4>
<hr />
<form method="post" action="{{action('MovimentoController@store')}}">
{{csrf_field()}}

<div class="form-group">
    <label for="conta-text-select" class="col-form-label"><strong>Conta:</strong></label>
    <select class="form-control" id="conta-text-select" name="conta">
        @foreach($contas as $conta)
            <option value="{{$conta->id_conta}}">{{$conta->ds_conta}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="categoria-text-select" class="col-form-label"><strong>Categoria:</strong></label>
    <select class="form-control" id="categoria-text-select" name="categoria">
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id_categoria}}">{{$categoria->ds_categoria}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="descricao-text-input" class="col-form-label"><strong>Descrição:</strong></label>
    <input class="form-control" type="text" placeholder="Parcela do apartamento" id="descricao-text-input" name="descricao" />
</div>

<div class="form-group">
    <label for="previsao-date-input" class="col-form-label"><strong>Datas:</strong></label>
    <div class="row">
        <div class="col-6">
            <input class="form-control" type="date" placeholder="previsto para" id="previsao-date-input" name="previsao">
        </div>
        <div class="col-6">
            <input class="form-control" type="date" placeholder="confirmado em" id="confirmacao-date-input" name="confirmacao">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="valor-number-input" class="col-form-label"><strong>Valor previsto</strong></label>
    <input class="form-control" type="number" placeholder="R$ 5.000,00" id="valor-number-input" name="valor_previsto">
</div>

<div class="form-group">
    <label for="valor-confirmado-number-input" class="col-form-label"><strong>Valor confirmado</strong></label>
    <input class="form-control" type="number" placeholder="R$ 5.000,00" id="valor-confirmado-number-input"  name="valor_confirmado">
</div>

<br />
<div class="form-group-row text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
    <button type="button" class="btn btn-secondary">Salvar e Adicionar</button>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<br />
</form>
@endsection