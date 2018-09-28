<template>
    <div>
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <h5 class="title pt-2">Adicionar questões avaliação</h5>
                    <h6 >{{ dadosAvaliacao.titulo }}</h6>
                </div>
                <div class="col-md-5 pr-4">
                    <a class="btn btn-success float-right" href="" @click.prevent='adicionarQuestoes' v-bind:disabled="(questoesAvaliacao.length < 1)">Adicionar</a>
                </div>
            </div>
        </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 m-auto ">
                <div class="table-responsive">
                    <a class="float-right mr-3" style="font-size:14px;" href="#" data-toggle="modal" data-target="#filtrar">Filtrar por</a>
                    <table class="table table-striped" style="margin-bottom: 60px;">
                    <thead class="text-primary">
                    <tr>
                        <th>
                            #
                        </th>

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
                        <td>
                            <input v-model="questoesAvaliacao" :value="questao.id" type="checkbox" name="questao" id="questao">
                        </td>

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
                    </tr>

                    <tr v-if="listaQuestoes.length === 0">
                        <td colspan="5">Nenhuma questão foi encontrada.</td>
                    </tr>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

        <!-- Inicio modal -->
        <div class="modal fade" id="filtrar" tabindex="-1" role="dialog" aria-labelledby="filtrarModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <h4 class="text-center m-0 p-0 mt-2">Filtrar por</h4> 
                    <div class="modal-body modal-visualizar">
                         <ul class="list-group">
                            <h6>Palavras Chave</h6>
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
                            <h6 class="mt-2">Categoria</h6>
                            <li class="list-group-item">
                                <div class="form-check form-check-inline" v-for="categoria in filtroCategoria">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" v-model="categorias" :value="categoria">
                                        {{categoria}}
                                        <span class="form-check-sign">
                                        <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </li>
                            <h6 class="mt-2">Dificuldade</h6>
                            <li class="list-group-item">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" v-model="dificuldades" value="Fácil">
                                        Fácl
                                        <span class="form-check-sign">
                                        <span class="check"></span>
                                        </span>
                                    </label>
                                </div>   
                                <div class="form-check form-check-inline"> 
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" v-model="dificuldades" value="Intermediário">
                                        Intermediário
                                        <span class="form-check-sign">
                                        <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" v-model="dificuldades" value="Difícil">
                                        Difícil
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
        props: ['questoes', 'questoesjaadd','avaliacao'],

        data(){
            return {
                listaQuestoes:[],
                checkdados: [],
                categorias: [],
                dificuldades: [],
                questoesAvaliacao: [],
                questoesJaAdicionadas: [],
                dadosAvaliacao: []
            }
        },
        computed: {
            filtrarCampo: function () {
                let questoesFiltradas
                if(this.checkdados.length>0) {
                    questoesFiltradas = []
                    this.checkdados.forEach(checkdado => 
                        this.listaQuestoes.filter((questao) => {
                            questao.palavras_chave.split(",").forEach(palavraChave => 
                            {
                                if(palavraChave.toLowerCase() === checkdado.toLowerCase())
                                    questoesFiltradas.push(questao)
                            })    
                        }))     
                    questoesFiltradas = [...new Set(questoesFiltradas)]
                    }else{
                    questoesFiltradas = this.listaQuestoes
                }
                
                if(this.categorias.length>0) {
                    let questoesFiltradasAux = []
                    this.categorias.forEach(categoria => 
                        questoesFiltradasAux.push(...questoesFiltradas.filter((questao) => 
                            questao.categoria === categoria )))       
                    questoesFiltradas = questoesFiltradasAux       
                }

                if(this.dificuldades.length>0) {
                    let questoesFiltradasAux = []
                    this.dificuldades.forEach(dificuldade => 
                        questoesFiltradasAux.push(...questoesFiltradas.filter((questao) => 
                            questao.dificuldade === dificuldade )))       
                    questoesFiltradas = questoesFiltradasAux       
                }

                return questoesFiltradas.sort((a, b) => (a.palavras_chave.toLowerCase() > b.palavras_chave.toLowerCase()) - (a.palavras_chave.toLowerCase() < b.palavras_chave.toLowerCase()))
            },
            filtroCheck: function () {
                const lista = []
                this.listaQuestoes.map(questao => questao.palavras_chave).forEach(questao => lista.push(...questao.split(",")))
                return [...new Set(lista)]
            },
            filtroCategoria: function () {
                return [...new Set(this.listaQuestoes.map(questao => questao.categoria))].sort()
            }
        },

        methods: {
            adicionarQuestoes(){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                axios.post('/avaliacao/addQuestoes', {'questoesavaliacao':this.questoesAvaliacao, 'idavaliacao':this.dadosAvaliacao.id})
                .then((response) => window.location.href='/avaliacao/'+this.dadosAvaliacao.id)
                .catch(error => console.log(error))
            }
        },

        mounted(){
            this.listaQuestoes = JSON.parse(this.questoes)
            this.questoesJaAdicionadas = JSON.parse(this.questoesjaadd)
            this.dadosAvaliacao = JSON.parse(this.avaliacao)
            if(this.questoesJaAdicionadas.length > 0){
                this.questoesJaAdicionadas.forEach(questao => {
                    this.listaQuestoes.splice(this.listaQuestoes.findIndex(q => q.id === questao.questao_id),1)
                })
            }
        },

        name: "v-questoesavaliacao"
    }
</script>