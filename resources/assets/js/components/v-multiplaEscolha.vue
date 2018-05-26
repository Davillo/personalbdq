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


            <select name="categoria" class="form-control" required>
                <option value="">Categoria...</option>
                <option value="Av1">Avaliação 1</option>
                <option value="Av2">Avaliação 2</option>
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

            <select name="categoria"  class="form-control" required>
                <option value="">Dificuldade...</option>
                <option value="facil">Fácil</option>
                <option value="intermediario">Intermediário</option>
                <option value="dificil">Difícil</option>
            </select>

        </div>
    </div>

    <div class="row">
        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            Enunciado:
        </div>
    </div>

    <div class="row">
        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            <textarea type="text" class="form-control" name="matricula" placeholder="Enunciado..." id="matricula" required></textarea>
        </div>
    </div>

    <div class="row">
        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            Alternativas:
        </div>
    </div>

    <div class="row">
        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    A
                                </span>
            </div>
            <textarea type="text" class="form-control" name="matricula" placeholder="Matricula..." id="matricula" required></textarea>
        </div>
    </div>
    <div class="row">
        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    B
                                </span>
            </div>
            <textarea type="text" class="form-control" name="matricula" placeholder="Matricula..." id="matricula" required></textarea>
        </div>
    </div>
    <div class="row">
        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    C
                                </span>
            </div>
            <textarea type="text" class="form-control" name="matricula" placeholder="Matricula..." id="matricula" required></textarea>
        </div>
    </div>
    <div class="row">
        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    D
                                </span>
            </div>
            <textarea type="text" class="form-control" name="matricula" placeholder="Matricula..." id="matricula" required></textarea>
        </div>
    </div>
    <div class="row">
        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    E
                                </span>
            </div>
            <textarea type="text" class="form-control" name="matricula" placeholder="Matricula..." id="matricula" required></textarea>
        </div>
    </div>
   </div>
</template>

<script>
    export default {

    }
</script>