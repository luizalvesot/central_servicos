
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Serviços</title>
    <style>
        /* Fonte padrão */
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #2c3e50;
            margin: 20px;
        }

        body::before {
            content: "";
            position: fixed;
            top: 40%;
            left: 50%;
            width: 700px;
            height: 820px;
            background: url('{{ public_path("images/logo.png") }}') no-repeat center;
            background-size: contain;
            opacity: 0.2; /* transparência */
            transform: translate(-50%, -30%);
            z-index: -1;
        }

        /* Cabeçalho */
        h2 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 20px;
            color: #1a202c;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Subtítulo com data */
        .subtitulo {
            text-align: center;
            font-size: 12px;
            margin-bottom: 20px;
            color: #555;
        }

        /* Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 11px;
        }

        thead {
            background: #1a202c;
            color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px 5px;
            text-align: center;
        }

        th {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
        }

        tbody tr:nth-child(even) {
            background: #f9f9f9;
        }

        tbody tr:hover {
            background: #f1f5f9;
        }

        /* Valor em destaque */
        .valor {
            font-weight: bold;
            color: #16a34a;
        }

        /* Status */
        .status-pago {
            color: #16a34a;
            font-weight: bold;
        }

        .status-aberto {
            color: #dc2626;
            font-weight: bold;
        }

        .status-concluido {
            color: #2563eb;
            font-weight: bold;
        }

        .status-andamento {
            color: #d97706;
            font-weight: bold;
        }

        .rel {
            text-align: center;
            font-size: 10px;
            color: #555;
        }

        /* Rodapé */
        .footer {
            position: fixed;
            bottom: -30px; /* distância do final da página */
            left: 0;
            right: 0;
            height: 50px;

            text-align: center;
            font-size: 10px;
            color: #555;
            border-top: 1px solid #ddd;
            padding-top: 5px;
        }

        .pagenum:before {
            content: counter(page);
        }
    </style>
</head>
<body>
    <h2>📑 Relatório de Serviços</h2>
    <p class="subtitulo">Gerado em {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>

    <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Início</th>
                <th>Fim</th>
                <th>Tempo total</th>
                <th>Cliente</th>
                <th>Descrição</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicos as $s)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($s->inicio)->format('d/m/Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($s->termino)->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($s->tempo_total)
                            {{ sprintf('%02d:%02d', floor($s->tempo_total / 60), $s->tempo_total % 60) }} (hrs)
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $s->cliente->nome_cliente }}</td>
                    <td>{{ $s->descricao }}</td>
                    <td>R$ {{ number_format($s->valor, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Total de Serviços: {{ count($servicos) }}</strong></p>
    <p><strong>Tempo total: {{ sprintf('%02d:%02d', floor($servicos->sum('tempo_total') / 60), $servicos->sum('tempo_total') % 60) }} (hrs)</strong></p>
    <p><strong>Valor Total: R$ {{ number_format($servicos->sum('valor'), 2, ',', '.') }}</strong></p>

    <p class="rel">Relatório gerado automaticamente pelo sistema</p>

    <div class="footer">
        E-mail: flavio.imidio@hotmail.com<br>
        Celular: (35) 9 9814-4067 (Flávio)<br>
                 (35) 9 9707-9349 (Enzo) <br>
        Página <span class="pagenum"></span>
    </div>
</body>
</html>