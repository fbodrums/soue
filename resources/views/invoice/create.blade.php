@extends('layouts.app')
@section('content')
    <form action="{{ route('invoice.store') }}" method="POST">
        @csrf
        <div class="container-fluid mb-5">
            <h2 class="mt-2 main-title">Gerador Nota Fiscal</h2>

            <div class="card mt-4">
                <div class="p-4">

                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="label-fields">INFORMAÇÕES GERAIS</h4>

                    </div>
                </div>
                <hr class="mt-0">
                <div class="p-4">


                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="cpf_cnpj">CPF/CNPJ</label>
                            <input type="text" class="form-control ms-4" id="cpf_cnpj" name="cpf_cnpj"
                                placeholder="CPF/CNPJ" required>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <label for="name" class="label-fields">Nome/Razão Social</label>
                            <input type="text" class="form-control ms-4" id="name" name="name"
                                placeholder="Nome/Razão Social" required>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="phones">Telefone</label>
                            <span class="all-phones d-flex flex-column ms-4 w-100">
                                <input type="tel" class="form-control phones" placeholder="DDD + Número de telefone"
                                    name="phones[][phone]" required>

                            </span>
                        </div>

                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="email">E-mail</label>
                            <input type="email" class="form-control ms-4" id="email" name="email"
                                placeholder="E-mail" required>
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
                            <input type="text" class="form-control ms-4" name="cep" id="cep" placeholder="CEP">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="address">Logradouro</label>
                            <input type="text" class="form-control ms-4" id="address" name="street"
                                placeholder="Logradouro">
                        </div>

                    </div>

                    <div class="row mt-3">
                        <!-- Number, Neighborhood, and State -->
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="number">Número</label>
                            <input type="text" class="form-control ms-4" id="number" name="number"
                                placeholder="Número">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="neighborhood">Bairro</label>
                            <input type="text" class="form-control ms-4" id="neighborhood" placeholder="Bairro">
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="state">Cidade</label>
                            <input type="text" class="form-control ms-4" id="city" placeholder="Cidade"
                                name="city">
                        </div>

                        <div class="col-md-6 d-flex align-items-center">
                            <label class="label-fields" for="state">Estado</label>
                            <select class="form-control ms-4" name="state" id="state">
                                <option value="AC">Acre (AC)</option>
                                <option value="AL">Alagoas (AL)</option>
                                <option value="AP">Amapá (AP)</option>
                                <option value="AM">Amazonas (AM)</option>
                                <option value="BA">Bahia (BA)</option>
                                <option value="CE">Ceará (CE)</option>
                                <option value="DF">Distrito Federal (DF)</option>
                                <option value="ES">Espírito Santo (ES)</option>
                                <option value="GO">Goiás (GO)</option>
                                <option value="MA">Maranhão (MA)</option>
                                <option value="MT">Mato Grosso (MT)</option>
                                <option value="MS">Mato Grosso do Sul (MS)</option>
                                <option value="MG">Minas Gerais (MG)</option>
                                <option value="PA">Pará (PA)</option>
                                <option value="PB">Paraíba (PB)</option>
                                <option value="PR">Paraná (PR)</option>
                                <option value="PE">Pernambuco (PE)</option>
                                <option value="PI">Piauí (PI)</option>
                                <option value="RJ">Rio de Janeiro (RJ)</option>
                                <option value="RN">Rio Grande do Norte (RN)</option>
                                <option value="RS">Rio Grande do Sul (RS)</option>
                                <option value="RO">Rondônia (RO)</option>
                                <option value="RR">Roraima (RR)</option>
                                <option value="SC">Santa Catarina (SC)</option>
                                <option value="SP">São Paulo (SP)</option>
                                <option value="SE">Sergipe (SE)</option>
                                <option value="TO">Tocantins (TO)</option>
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

                    </tbody>
                </table>
                <div class="w-100 d-flex justify-content-end">
                    <button class="btn btn-link add-item">+ Adicionar item</button>
                </div>
                <div class="d-flex justify-content-center flex-column align-items-center mt-4">
                    <div class="d-flex align-items-center">
                        <h4 class="total-geral">Total Geral</h4>
                        <h3 class="ms-2 total-box total-box-count">R$ 0,00</h3>
                    </div>
                    <div class="d-flex justify-content-between w-100 p-4 btn-size">
                        <a href="{{ route('invoice.index') }}"
                            class="btn btn-secondary btn-size btn-cancelar">Cancelar</a>
                        <button class="btn btn-custom btn-size">Salvar</button>
                    </div>
                </div>
            </div>


        </div>
    </form>


    @include('scripts')
@endsection
