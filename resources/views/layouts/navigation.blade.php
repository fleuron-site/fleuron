<div id="layoutSidenav_nav">

    <nav class="sidenav shadow-right sidenav-light">

        <div class="sidenav-menu">

            <div class="nav accordion mt-4" id="accordionSidenav">

                <a class="nav-link collapsed {{ (request()->is('home')) ? 'active' : '' }}" href="/home">

                    Accueil

                </a>
                <hr style="margin: 0;">

                <a href="{{ route('admin.skills.skill.index') }}" class=" nav-link collapsed{{ (request()->is('admin.skills.skill.index')) ? 'active' : '' }}">

                    Domaines

                </a>
                <hr style="margin: 0;">

                <a href="{{ route('admin.projects.project.index') }}" class="nav-link collapsed {{ (request()->is('projects')) ? 'active' : '' }}">

                    Projets

                </a>
                <hr style="margin: 0;">

                <a href="{{ route('admin.imageurls.imageurl.index') }}" class="nav-link collapsed {{ (request()->is('imageurls')) ? 'active' : '' }}">

                    Images profiles

                </a>
                <hr style="margin: 0;">

                <a href="{{ route('admin.candidatures.candidature') }}" class="nav-link collapsed {{ (request()->is('candidatures')) ? 'active' : '' }}">

                    Candidatures

                </a>
                <hr style="margin: 0;">
                <a href="{{ route('admin.countries.countrie.index') }}" class="nav-link {{ (request()->is('countries')) ? 'active' : '' }}">

                    Pays

                </a>
                <hr style="margin: 0;">

                <a href="{{ route('admin.languages.language.index') }}" class="nav-link {{ (request()->is('languages')) ? 'active' : '' }}">

                    Langue

                </a>
                <hr style="margin: 0;">

                <!-- <div class="sidenav-menu-heading">Paramètrages</div> -->

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">

                    Administration

                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                </a>

                <div class="collapse" id="collapseFlows" data-bs-parent="#accordionSidenav">

                    <nav class="sidenav-menu-nested nav">

                        <a href="{{ route('admin.users.user.index') }}" class="nav-link {{ (request()->is('users')) ? 'active' : '' }}">

                            <i class="fa fa-angle-right"></i>

                            &nbsp;&nbsp;&nbsp;&nbsp;Utilisateurs

                        </a>
                        
                        <a href="{{ route('admin.userinfos.userinfo.index') }}" class="nav-link collapsed {{ (request()->is('userinfos')) ? 'active' : '' }}">

                            <i class="fa fa-angle-right"></i>

                            &nbsp;&nbsp;&nbsp;&nbsp;Infos complementaires

                        </a>

                    </nav>

                </div>
                <hr style="margin: 0;">

        </div>

    </nav>

</div>