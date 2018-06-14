<template>
    <div>

        <input class="form-control col-md-3 float-right" type="text" v-model="busca" placeholder="Filtrar por palavras chave!">

        <div class="table-responsive">
            <table class="table table-striped" style="margin-bottom: 60px;">
            <thead class="text-primary">
            <tr>
                <th>
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
                    {{questao.enunciado}}
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
                    </ul>

                </td>
            </tr>

            <tr v-if="list.length === 0">
                <td colspan="5">Nenhuma questão foi encontrada.</td>
            </tr>

            </tbody>
        </table>
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
                dados: []

            }
        },
        computed: {
            filtrarCampo: function () {

                let listaDados = this.busca.split(",")

                console.log(listaDados)
                if(listaDados.length>0 && listaDados[0] != "") {
                    this.dados = []
                    for (let i = 0; i < listaDados.length; i++) {
                        if(listaDados[i] != "") {
                            this.dados.push(...this.list.filter((questao) => {
                                return questao.palavras_chave.toLowerCase().match(listaDados[i])
                            }))
                        }
                    }
                    return this.dados;
                }else{
                    this.dados = []
                    this.dados = this.list.filter((questao) => {
                        return questao.palavras_chave.toLowerCase().match(this.busca)
                    })
                    return this.dados;
                }

            }
        },
        /*filtrarCampo: function () {
                return this.list.filter((questao) => {
                    return questao.palavras_chave.toLowerCase().match(this.busca)
                })
            }*/

        methods: {

        },

        mounted(){
            this.list = JSON.parse(this.questoes)
        },


        name: "v-questoes"
    }
</script>
