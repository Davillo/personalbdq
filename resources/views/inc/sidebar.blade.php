<div class="sidebar" data-color="orange">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
    <div class="logo">
        <h3 style=" font-family: 'Pacifico', cursive;
                color: #ffffff;
                margin-left: 20px;">PersonalBDQ</h3>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <?php  if(Auth::user()->admin){ ?>
            <li class="@yield('musuario')">
                <a href="/usuario">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Usuarios</p>
                </a>
            </li>
            <li class="@yield('mcurso')">
                 <a href="/curso">
                     <i class="now-ui-icons education_agenda-bookmark"></i>
                     <p>Cursos</p>
                 </a>
            </li>
            <li class="@yield('mlistas')">
                 <a href="/listas">
                      <i class="now-ui-icons education_agenda-bookmark"></i>
                      <p>Listas</p>
                 </a>
            </li>
            <?php }?>
        </ul>
    </div>
</div>
