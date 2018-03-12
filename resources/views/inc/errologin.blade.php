<div class="modal fade" id="modalerro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="logo-modal text-center" id="myModalLabel">PersonalBDQ</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form method="POST" action="/login">
                <div class="modal-body">
                    <div class="row">
                        <h5 class="text-center text-danger" style="margin-left:32%;margin-top:20px;">E-mail ou Senha inválidos</h5>
                    </div>

                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">email</i>
                                </span>
                            </div>
                            {{ csrf_field() }}
                            <input type="text" class="form-control alert-danger"  name="email" placeholder="Email..." id="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">vpn_key</i>
                                </span>
                            </div>
                            <input type="password" class="form-control alert-danger" name="senha" placeholder="Senha" id="senha" required>
                        </div>
                    </div>
                    <div class="text-center" style="margin-bottom: 10px;">
                        <input type="submit" id="login" name="login" class="btn btn-modal col-sm-8" value="Entrar"><br>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>