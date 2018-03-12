
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="logo-modal text-center" id="myModalLabel">Personalbdq</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form method="POST" action="/login">
                <div class="modal-body">
                    <div class="row">
                        <h5 class="text-center" style="margin-left:32%;margin-top:20px;">Acesso ao sistema</h5>
                    </div>

                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">email</i>
                                </span>
                            </div>
                            {{ csrf_field() }}
                            <input type="text" class="form-control " name="email" placeholder="Email..." id="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-8" style="text-align:center; margin: 0 auto; padding: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="material-icons">vpn_key</i>
                                </span>
                            </div>
                            <input type="password" class="form-control" name="senha" placeholder="Senha" id="senha" required>
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