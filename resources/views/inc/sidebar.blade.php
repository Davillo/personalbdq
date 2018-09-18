<div class="sidebar" data-color="orange">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
    <div class="logo">
        <h3 style=" font-family: 'arial', cursive;
                color: #ffffff;
                margin-top: 10px;
                margin-left: 20px;">PersonalBDQ</h3>

        <h5  style=" font-family: 'arial', cursive;
                color: #ffffff;
                margin-top: 10px;
                margin-left: 20px;">Usuário:  {{Auth::user()->nome}}</h5>

    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            @if(Auth::user()->admin)
            <li class="@yield('musuario')">
                <a href="/usuario">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Usuarios</p>
                </a>
            </li>
            <li class="@yield('mcurso')">
                 <a href="/curso">
                     <i class="fa fa-book"></i>
                     <p>Cursos</p>
                 </a>
            </li>
            @endif

            @if(!Auth::user()->admin)
                <li class="@yield('mlistas')">
                    <a href="/listas">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Listas</p>
                    </a>
                </li>

                <li class="@yield('mquestoes')">
                    <a href="/questoes">
                        <i class="now-ui-icons design-2_ruler-pencil"></i>
                        <p>Questões</p>
                    </a>
                </li>

                <li class="@yield('mavaliacoes')">
                    <a href="/avaliacoes">
                        <i class="now-ui-icons education_paper"></i>
                        <p>Minhas Avaliações</p>
                    </a>
                </li>

                <li class="@yield('mcompartilhadas')">
                    <a href="/listas/compartilhadas">
                        <i class="fa fa-share"></i>
                        <p>Compartilhadas comigo</p>
                    </a>
                </li>
                @endif
        </ul>
    </div>
</div>
