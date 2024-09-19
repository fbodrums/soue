@extends('layouts.app')
@section('content')
    <form action="{{ route('invoice.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Include PUT method for updating --}}
        <div class="container-fluid mb-5">
            <h2 class="mt-2 main-title">Editar Nota Fiscal</h2>

            <div class="card mt-4">
                <div class="p-4">

                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="label-fields">INFORMAÇÕES GERAIS</h4>
                        <h3 class="ms-2 total-box d-flex justify-content-between ps-4 pe-4" style="width: 178px;">
                            <span class="inter-light">N°</span>
                            <span>{{ str_pad($invoice->id, 5, 0, STR_PAD_LEFT) }}</span>
                        </h3>
                    </div>
                </div>
                <hr class="mt-0">
                <div class="p-4">

                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="cpf_cnpj">CPF/CNPJ</label>
                            <input type="text" class="form-control ms-4" id="cpf_cnpj" name="cpf_cnpj"
                                placeholder="CPF/CNPJ" value="{{ $invoice->cpf_cnpj }}" required>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <label for="name" class="label-fields">Nome/Razão Social</label>
                            <input type="text" class="form-control ms-4" id="name" name="name"
                                placeholder="Nome/Razão Social" value="{{ $invoice->name }}" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="phones">Telefone</label>
                            <span class="all-phones d-flex flex-column ms-4 w-100">
                                @foreach ($invoice->phones as $phone)
                                    <input type="tel" class="form-control phones mt-2"
                                        placeholder="DDD + Número de telefone" name="phones[][phone]"
                                        value="{{ $phone->phone }}" required>
                                @endforeach
                            </span>
                        </div>

                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="email">E-mail</label>
                            <input type="email" class="form-control ms-4" id="email" name="email"
                                placeholder="E-mail" value="{{ $invoice->email }}" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <p class="text-end"><a href="#" class="btn-link add-phone"><small>+ Adicionar número de
                                        telefone</small></a></p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="cep">CEP</label>
                            <input type="text" class="form-control ms-4" name="cep" id="cep" placeholder="CEP"
                                value="{{ $invoice->cep }}">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="address">Logradouro</label>
                            <input type="text" class="form-control ms-4" id="address" name="street"
                                placeholder="Logradouro" value="{{ $invoice->street }}">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <!-- Number, Neighborhood, and State -->
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="number">Número</label>
                            <input type="text" class="form-control ms-4" id="number" name="number"
                                placeholder="Número" value="{{ $invoice->number }}">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="neighborhood">Bairro</label>
                            <input type="text" class="form-control ms-4" id="neighborhood" placeholder="Bairro"
                                value="{{ $invoice->neighborhood }}">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="state">Cidade</label>
                            <input type="text" class="form-control ms-4" id="city" placeholder="Cidade"
                                name="city" value="{{ $invoice->city }}">
                        </div>

                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="state">Estado</label>
                            <select class="form-control ms-4" name="state" id="state">
                                <option value="AC" {{ $invoice->state == 'AC' ? 'selected' : '' }}>Acre (AC)</option>
                                <option value="AL" {{ $invoice->state == 'AL' ? 'selected' : '' }}>Alagoas (AL)
                                </option>
                                <option value="AP" {{ $invoice->state == 'AP' ? 'selected' : '' }}>Amapá (AP)</option>
                                <option value="AM" {{ $invoice->state == 'AM' ? 'selected' : '' }}>Amazonas (AM)
                                </option>
                                <option value="BA" {{ $invoice->state == 'BA' ? 'selected' : '' }}>Bahia (BA)</option>
                                <option value="CE" {{ $invoice->state == 'CE' ? 'selected' : '' }}>Ceará (CE)</option>
                                <option value="DF" {{ $invoice->state == 'DF' ? 'selected' : '' }}>Distrito Federal
                                    (DF)</option>
                                <option value="ES" {{ $invoice->state == 'ES' ? 'selected' : '' }}>Espírito Santo (ES)
                                </option>
                                <option value="GO" {{ $invoice->state == 'GO' ? 'selected' : '' }}>Goiás (GO)</option>
                                <option value="MA" {{ $invoice->state == 'MA' ? 'selected' : '' }}>Maranhão (MA)
                                </option>
                                <option value="MT" {{ $invoice->state == 'MT' ? 'selected' : '' }}>Mato Grosso (MT)
                                </option>
                                <option value="MS" {{ $invoice->state == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul
                                    (MS)</option>
                                <option value="MG" {{ $invoice->state == 'MG' ? 'selected' : '' }}>Minas Gerais (MG)
                                </option>
                                <option value="PA" {{ $invoice->state == 'PA' ? 'selected' : '' }}>Pará (PA)</option>
                                <option value="PB" {{ $invoice->state == 'PB' ? 'selected' : '' }}>Paraíba (PB)
                                </option>
                                <option value="PR" {{ $invoice->state == 'PR' ? 'selected' : '' }}>Paraná (PR)
                                </option>
                                <option value="PE" {{ $invoice->state == 'PE' ? 'selected' : '' }}>Pernambuco (PE)
                                </option>
                                <option value="PI" {{ $invoice->state == 'PI' ? 'selected' : '' }}>Piauí (PI)</option>
                                <option value="RJ" {{ $invoice->state == 'RJ' ? 'selected' : '' }}>Rio de Janeiro (RJ)
                                </option>
                                <option value="RN" {{ $invoice->state == 'RN' ? 'selected' : '' }}>Rio Grande do Norte
                                    (RN)</option>
                                <option value="RS" {{ $invoice->state == 'RS' ? 'selected' : '' }}>Rio Grande do Sul
                                    (RS)</option>
                                <option value="RO" {{ $invoice->state == 'RO' ? 'selected' : '' }}>Rondônia (RO)
                                </option>
                                <option value="RR" {{ $invoice->state == 'RR' ? 'selected' : '' }}>Roraima (RR)
                                </option>
                                <option value="SC" {{ $invoice->state == 'SC' ? 'selected' : '' }}>Santa Catarina (SC)
                                </option>
                                <option value="SP" {{ $invoice->state == 'SP' ? 'selected' : '' }}>São Paulo (SP)
                                </option>
                                <option value="SE" {{ $invoice->state == 'SE' ? 'selected' : '' }}>Sergipe (SE)
                                </option>
                                <option value="TO" {{ $invoice->state == 'TO' ? 'selected' : '' }}>Tocantins (TO)
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="divider" />
                <div class="p-4">
                    <h4 class="label-fields">ITENS</h4>
                </div>
                <hr class="mt-0" />

                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Código Produto</th>
                            <th>Descrição do produto/serviço</th>
                            <th>NCM</th>
                            <th>Quantidade</th>
                            <th>Valor Unitário</th>
                            <th>Valor Total</th>
                            <th>Base ICMS</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody class="itens-list">
                        @foreach ($invoice->items as $item)
                            <tr>
                                <td class="ps-4"><img src="{{ asset('assets/polygon.png') }}"></td>
                                <td>{{ $item->id }}</td>
                                <td><input type="text" class="form-control"
                                        name="items[{{ $item->id }}][product_code]" placeholder="Cód. Produto"
                                        value="{{ $item->product_code }}"></td>
                                <td><input type="text" class="form-control"
                                        name="items[{{ $item->id }}][description]" placeholder="Descrição"
                                        value="{{ $item->description }}"></td>
                                <td><input type="text" class="form-control" name="items[{{ $item->id }}][ncm]"
                                        placeholder="NCM" value="{{ $item->ncm }}"></td>
                                <td><input type="number" class="form-control"
                                        name="items[{{ $item->id }}][quantity]" placeholder="Qtde"
                                        value="{{ $item->quantity }}"></td>
                                <td><input type="text" class="form-control"
                                        name="items[{{ $item->id }}][unit_price]" placeholder="Valor Unitário"
                                        value="{{ $item->unit_price }}"></td>
                                <td><input type="text" class="form-control total"
                                        name="items[{{ $item->id }}][total_price]" placeholder="Valor Total"
                                        value="{{ $item->total_price }}"></td>
                                <td><input type="text" class="form-control"
                                        name="items[{{ $item->id }}][icms_base]" placeholder="Base ICMS"
                                        value="{{ $item->icms_base }}"></td>
                                <td><button class="btn btn-sm"><img src="{{ asset('assets/lixeira.png') }}"></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="w-100 d-flex justify-content-end">
                    <button class="btn btn-link add-item">+ Adicionar item</button>
                </div>
                <div class="d-flex justify-content-center flex-column align-items-center mt-4">
                    <div class="d-flex align-items-center">
                        <h4 class="total-geral">Total Geral</h4>
                        <h3 class="ms-2 total-box total-box-count">
                            R${{ number_format($invoice->items->sum('total_price'), 2, ',', '.') }}
                        </h3>
                    </div>
                    <div class="d-flex justify-content-between w-100 p-4 btn-size">
                        <a href="{{ route('invoice.index') }}" class="btn btn-secondary btn-size btn-cancelar">Voltar</a>
                        <button class="btn btn-custom btn-size">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('scripts')
@endsection
