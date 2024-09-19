<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cpfCnpjInput = document.getElementById('cpf_cnpj');
        const cepInput = document.getElementById('cep');
        const addPhoneButton = document.querySelector('.add-phone');
        const addItemButton = document.querySelector('.add-item');
        const itemsList = document.querySelector('.itens-list');
        const totalBox = document.querySelector('.total-box-count');

        // Mask functions
        function maskCpfCnpj(input) {
            let value = input.value.replace(/\D/g, '');
            if (value.length <= 11) {
                input.value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            } else {
                input.value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
            }
        }

        function maskPhone(input) {
            let value = input.value.replace(/\D/g, '');
            input.value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
        }

        function maskCep(input) {
            let value = input.value.replace(/\D/g, '');
            input.value = value.replace(/(\d{5})(\d{3})/, '$1-$2');
        }

        function maskMoney(input) {
            let value = input.value.replace(/\D/g, '');
            input.value = (parseFloat(value) / 100).toFixed(2);
        }

        cpfCnpjInput.addEventListener('input', () => maskCpfCnpj(cpfCnpjInput));
        cepInput.addEventListener('input', () => maskCep(cepInput));

        cpfCnpjInput.addEventListener('blur', function() {
            let cnpj = this.value.replace(/\D/g, '');
            if (cnpj.length === 14) {
                fetch(`/cnpj/${cnpj}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('name').value = data.razao_social;
                        document.getElementById('address').value = data.logradouro;
                        document.getElementById('cep').value = data.cep;
                        document.getElementById('number').value = data.numero;
                        document.getElementById('neighborhood').value = data.bairro;
                        document.getElementById('state').value = data.uf;
                        document.getElementById('city').value = data.municipio;
                        document.getElementById('phone').value = data.telefone;
                    });
            }
        });

        document.querySelector('.phones').addEventListener('input', () => {
            maskPhone(document.querySelector('.phones'))
        })


        addPhoneButton.addEventListener('click', function(e) {
            e.preventDefault();
            const phoneInput = document.createElement('input');
            phoneInput.type = 'tel';
            phoneInput.className = 'form-control mt-2 phones';
            phoneInput.placeholder = 'DDD + Número de telefone';
            phoneInput.name = 'phones[][phone]';
            phoneInput.required = true;
            phoneInput.addEventListener('input', () => maskPhone(phoneInput));
            document.querySelector('.all-phones').appendChild(phoneInput);
        });

        let id = 1;

        function generateTr() {
            const tr = document.createElement('tr');
            tr.innerHTML = `
            <td class="ps-4"><img src="/assets/polygon.png"></td>
            <td>${id}</td>
            <td><input type="text" class="form-control" name="items[${id}][product_code]" placeholder="Cód. Produto" required></td>
            <td><input type="text" class="form-control" name="items[${id}][description]" placeholder="Descrição" required></td>
            <td><input type="text" class="form-control" name="items[${id}][ncm]" placeholder="NCM" required></td>
            <td><input type="number" class="form-control update" name="items[${id}][quantity]" data-relative="${id}" placeholder="Qtde" required></td>
            <td><input type="number" class="form-control money update" name="items[${id}][unit_price]" data-relative="${id}" placeholder="Valor Unitário" required></td>
            <td><input type="text" class="form-control total" name="items[${id}][total_price]" placeholder="Valor Total" required></td>
            <td><input type="text" class="form-control" name="items[${id}][icms_base]" placeholder="Base ICMS" required></td>
            <td><button class="btn btn-sm"><img src="/assets/lixeira.png"></button></td>
        `;
            itemsList.appendChild(tr);
            id++;

            tr.querySelectorAll('.money').forEach(input => {
                input.addEventListener('input', () => maskMoney(input));
            });

            tr.querySelectorAll('.update').forEach(input => {
                input.addEventListener('change', updateTotal);
            });


        }

        addItemButton.addEventListener('click', function(e) {
            e.preventDefault();
            generateTr();
        });

        function updateTotal() {
            const relative = this.dataset.relative;
            const quantity = document.querySelector(`[name="items[${relative}][quantity]"]`).value || 0;
            const unit = document.querySelector(`[name="items[${relative}][unit_price]"]`).value || 0;
            const totalInput = document.querySelector(`[name="items[${relative}][total_price]"]`);
            totalInput.value = (quantity * unit).toFixed(2);

            let total = 0;
            document.querySelectorAll('.total').forEach(item => {
                total += parseFloat(item.value) || 0;
            });

            const formattedAmount = new Intl.NumberFormat('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }).format(total);

            totalBox.textContent = formattedAmount;
        }

        if (!document.querySelector('.itens-list tr')) {
            generateTr();
        }
    });
</script>
