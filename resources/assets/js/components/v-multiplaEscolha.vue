<template>
   <div>
    <div class="row">                                                        
        <div class="form-group col-md-8 mx-auto">
        <label for="Alternativas">Alternativas</label>    
    </div>
    </div>
    <div class="row">
        <div class="input-group col-md-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    A
                                </span>
            </div>
            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                     <input type="radio" name="correta" value="1">
                                </span>
            </div>
            <textarea type="text" class="form-control" name="enunciado_alternativa1" placeholder="Alternativa..."></textarea>
        </div>
    </div>
    <div class="row">
        <div class="input-group col-md-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    B
                                </span>
            </div>
            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                     <input type="radio" name="correta" value="2">
                                </span>
            </div>
            <textarea type="text" class="form-control" name="enunciado_alternativa2" placeholder="Alternativa..."></textarea>
        </div>
    </div>
    <div class="row">
        <div class="input-group col-md-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    C
                                </span>
            </div>
            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                     <input type="radio" name="correta" value="3">
                                </span>
            </div>
            <textarea type="text" class="form-control" name="enunciado_alternativa3" placeholder="Alternativa..."></textarea>
        </div>
    </div>
    <div class="row">
        <div class="input-group col-md-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    D
                                </span>
            </div>
            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                     <input type="radio" name="correta" value="4">
                                </span>
            </div>
            <textarea type="text" class="form-control" name="enunciado_alternativa4" placeholder="Alternativa..." ></textarea>
        </div>
    </div>
    <div class="row">
        <div class="input-group col-md-8" style="text-align:center; margin: 0 auto; padding: 10px;">
            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    E
                                </span>
            </div>
            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0" id="basic-addon1">
                                     <input type="radio" name="correta" value="5">
                                </span>
            </div>
            <textarea type="text" class="form-control" name="enunciado_alternativa5" placeholder="Alternativa..."></textarea>
        </div>
    </div>
   </div>
</template>



<style>
    .btn span.glyphicon {
        opacity: 0;
    }
    .btn.active span.glyphicon {
        opacity: 1;
    }
</style>