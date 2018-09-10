<template>
    <div>

        <div class="table-responsive">
            <a class="float-right mr-3" style="font-size:14px;" href="#" data-toggle="modal" data-target="#filtrar">Filtrar por</a>
            <table class="table table-striped" style="margin-bottom: 60px;">
            <thead class="text-primary">
            <tr>
                <th class="td">
                    Enunciado
                </th>

                <th>
                    Palavras Chave
                </th>

                <th>
                    Categoria
                </th>

                <th>
                    Dificuldade
                </th>

                <th>
                    Tipo
                </th>
               </tr>
            </thead>
            <tbody>
            <tr v-for="questao in filtrarCampo">
                <td class="td-fixo">
                    {{questao.enunciado.replace(/(<([^>]+)>)/ig,"")}}
                </td>

                <td>
                    {{questao.palavras_chave}}
                </td>

                <td>
                    {{questao.categoria}}
                </td>

                <td>
                    {{questao.dificuldade}}
                </td>

                <td>
                    {{questao.tipo}}
                </td>
                <td>
                    <a href="#" data-toggle="modal" :data-target="'#visualizarModal'+questao.id">
                        <i class="material-icons">
                            visibility
                        </i>
                    </a>

                </td>

                <td>
                    <a href="#" class="dropdown " data-toggle="dropdown">
                        <i class="material-icons">
                            more_horiz
                        </i>
                    </a>
                    <ul class="dropdown-menu" style="padding-left: 10px; " role="menu">
                        <li><a :href="'/questao/edit/'+questao.id">Editar</a></li>
                        <li><a href="#" data-toggle="modal" :data-target="'#removerModal'+questao.id">Excluir</a></li>
                        <li><a href="#" data-toggle="modal" :data-target="'#fazerCopiaModal'+questao.id">Adicionar a lista</a></li>
                    </ul>

                </td>
            </tr>

            <tr v-if="list.length === 0">
                <td colspan="5">Nenhuma questão foi encontrada.</td>
            </tr>

            </tbody>
        </table>
        </div>

        <!-- Inicio modal -->
        <div class="modal fade" id="filtrar" tabindex="-1" role="dialog" aria-labelledby="filtrarModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body modal-visualizar">
                        <h5 class="text-center">Selecione as palavras-chave</h5>
                         <ul class="list-group">
                            <li class="list-group-item">
                                <div class="form-check form-check-inline" v-for="questao in filtroCheck">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" v-model="checkdados" :value="questao">
                                        {{questao}}
                                        <span class="form-check-sign">
                                        <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['questoes'],

        data(){
            return {
                list:[],
                busca : '',
                dados: [],
                checkdados: []

            }
        },
        computed: {
            filtrarCampo: function () {

                let listaDados = this.checkdados
                if(listaDados.length>0) {
                    this.dados = []
                    for (let i = 0; i < listaDados.length; i++) {
                            this.dados.push(...this.list.filter((questao) => {
                                return questao.palavras_chave.toLowerCase().match(listaDados[i].toLowerCase())
                            }))
                    }
                    this.dados = [...new Set(this.dados)]
                    return this.dados.sort((a, b) => (a.palavras_chave.toLowerCase() > b.palavras_chave.toLowerCase()) - (a.palavras_chave.toLowerCase() < b.palavras_chave.toLowerCase()))
                }else{
                    return this.list.sort((a, b) => (a.palavras_chave.toLowerCase() > b.palavras_chave.toLowerCase()) - (a.palavras_chave.toLowerCase() < b.palavras_chave.toLowerCase()))
                }

            },
            filtroCheck: function () {
                let lista = []
                for (let i = 0; i < this.list.length; i++) {
                    lista.push(...this.list[i].palavras_chave.split(","))
                }
                lista = [...new Set(lista)]
                return lista;
            }
        },

        methods: {

        },

        mounted(){
            this.list = JSON.parse(this.questoes)
        },


        name: "v-questoes"
    }
</script>