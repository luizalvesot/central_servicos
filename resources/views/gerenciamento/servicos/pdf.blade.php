<h3 style="text-align: center">Relatório de Serviços</h3>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Início</th>
            <th>Fim</th>
            <th>Tempo total</th>
            <th>Cliente</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($servicos as $s)
            <tr>
                <td>{{ \Carbon\Carbon::parse($s->inicio)->format('d/m/Y H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($s->termino)->format('d/m/Y H:i') }}</td>
                <td>
                    @if($s->tempo_total)
                        {{ sprintf('%02d:%02d', floor($s->tempo_total / 60), $s->tempo_total % 60) }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $s->cliente->nome_cliente }}</td>
                <td>{{ $s->descricao }}</td>
                <td>R$ {{ number_format($s->valor, 2, ',', '.') }}</td>
                <td>{{ $s->status_servico }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>Total de Serviços: {{ count($servicos) }}</p><br>
<p>Tempo total: {{ sprintf('%02d:%02d', floor($servicos->sum('tempo_total') / 60), $servicos->sum('tempo_total') % 60) }}  </p>
<p>Valor Total: R$ {{ number_format($servicos->sum('valor'), 2, ',', '.') }}</p>