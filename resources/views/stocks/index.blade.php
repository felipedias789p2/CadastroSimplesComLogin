    @extends('stocks.layout')

    @section('content')

        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">Sistema Simples de Cadastro de Peças</h2>
            </div>
            <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
                <a class="btn btn-success " href="{{ route('stocks.create') }}"> Adicionar peça</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif


        {{-- <form action="{{ route('searc') }}" method="POST">
            @csrf
            <input type="text" name="search" id="search" class="form-control" placeholder="Pesquisar">
            <button type="submit" class="btn btn-danger">Filtrar</button>
        </form> --}}

        @if (!empty($stocks))
            @if (sizeof($stocks) > 0)
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nome do Produto</th>
                        <th>Descrição do Produto</th>
                        <th>Quantidade</th>
                        <th width="280px">Ações</th>
                    </tr>
                    @foreach ($stocks as $stock)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $stock->product_name }}</td>
                            <td>{{ $stock->product_desc }}</td>
                            <td>{{ $stock->product_qty }}</td>
                            <td>
                                <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('stocks.show', $stock->id) }}">Mostrar</a>
                                    <a class="btn btn-primary" href="{{ route('stocks.edit', $stock->id) }}">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <div class="alert alert-alert">Não há Produtos cadastrados</div>
            @endif
        @endif
        @if (!empty($stocks))
            {!! $stocks->links() !!}
        @endif



    @endsection
