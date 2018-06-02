<template>
   <div>
       <div class="row">
           <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
               <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">
                                        book
                                    </i>
                                </span>
               </div>


               <select name="categoria" class="form-control">
                   <option value="">Categoria...</option>
                   <option value="Avaliação 1">Avaliação 1</option>
                   <option value="Avaliação 2">Avaliação 2</option>
                   <option value="Enade">Enade</option>
               </select>

           </div>
       </div>

       <div class="row">
           <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
               <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">
                                        book
                                    </i>
                                </span>
               </div>

               <select name="dificuldade"  class="form-control">
                   <option value="">Dificuldade...</option>
                   <option value="Fácil">Fácil</option>
                   <option value="Intermediário">Intermediário</option>
                   <option value="Difícil">Difícil</option>
               </select>

           </div>
       </div>

       <div class="row">
           <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
               Palavras Chave:
           </div>
       </div>

       <div class="row">
           <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
               <input type="text" class="form-control" name="palavras_chave" placeholder="Palavras chaves..."></input>
           </div>
       </div>

       <div class="row">
           <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
               Enunciado:
           </div>
       </div>

       <div class="row">
           <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
               <textarea type="text" class="form-control" name="enunciado" placeholder="Enunciado..."></textarea>
           </div>
       </div>
   </div>
</template>


