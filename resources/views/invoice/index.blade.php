@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mt-2 main-title">Notas Fiscal</h2>
            <a href="{{ route('invoice.create') }}" class="btn btn-primary">Criar Nota Fiscal</a>
        </div>

        <div class="card mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CPF/CNPJ</th>
                        <th>Nome/Razão Social</th>
                        <th>Total Geral</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->cpf_cnpj }}</td>
                            <td>{{ $invoice->name }}</td>
                            <td>R${{ number_format($invoice->items->sum('total_price'), 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
