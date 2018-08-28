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
                        <i class="fa fa-list"></i>
                        <p>Listas</p>
                    </a>
                </li>

                <li class="@yield('mquestoes')">
                    <a href="/questoes">
                        <i class="fa fa-question"></i>
                        <p>Questões</p>
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
