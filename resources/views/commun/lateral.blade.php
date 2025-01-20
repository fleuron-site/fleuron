<div class="col-lg-3">
    <div class="nav-sticky">
        <div class="card">
            <div class="card-body p-0">
                <ul class="nav flex-column" id="stickyNav">
                    @if(empty(count($userinfos)))
                        <li class="nav-item py-2 lat">
                            <a class="nav-link {{ request()->routeIs('chercheur.form.userinfo_all') ? 'active' : '' }}" 
                            href="{{ route('chercheur.form.userinfo_all') }}">
                                <div class="d-flex align-items-center justify-content-between">
                                    Informations complementaires
                                    <span class="badge bg-primary-soft text-primary">Nouveau</span>
                                </div>
                            </a>
                        </li>
                    @else
                        @foreach($infos as $info)
                            <li class="nav-item py-2 lat">
                                <a class="nav-link {{ request()->routeIs('userinfos') ? 'active' : '' }}" 
                                   href="{{ route('userinfos', $info->id) }}">
                                    Informations complementaires
                                </a>
                            </li>
                        @endforeach
                    @endif
                    @if (Auth::user()->hasRole('chercheur'))
                        @if (empty(count($userinfos_skill)))
                            <li class="nav-item py-2 lat">
                                <a class="nav-link {{ request()->routeIs('chercheur.userinfos_skills.userinfos_skill.create') ? 'active' : '' }}" 
                                    href="{{ route('chercheur.userinfos_skills.userinfos_skill.create') }}">
                                    <div class="d-flex align-items-center justify-content-between">
                                        Domaines d'intervention
                                        <span class="badge bg-primary-soft text-primary">Nouveau</span>
                                    </div>
                                </a>
                            </li>
                        @else
                            <li class="nav-item py-2 lat">
                                <a class="nav-link {{ request()->routeIs('chercheur.userinfos_skills.userinfos_skill.liste') ? 'active' : '' }}" 
                                href="{{ route('chercheur.userinfos_skills.userinfos_skill.liste') }}">
                                    Domaines d'intervention
                                </a>
                            </li>
                        @endif

                        @if (empty(count($languagesUserinfos)))
                            <li class="nav-item py-2 lat">
                                <a class="nav-link {{ request()->routeIs('chercheur.languages_userinfos.languages_userinfo.create') ? 'active' : '' }}" 
                                href="{{ route('chercheur.languages_userinfos.languages_userinfo.create') }}">
                                    <div class="d-flex align-items-center justify-content-between">
                                        Langues officielles
                                        <span class="badge bg-primary-soft text-primary">Nouveau</span>
                                    </div>
                                </a>
                            </li>
                        @else
                            <li class="nav-item py-2 lat">
                                <a class="nav-link {{ request()->routeIs('chercheur.languages_userinfos.languages_userinfo.liste') ? 'active' : '' }}" href="{{ route('chercheur.languages_userinfos.languages_userinfo.liste') }}">
                                    Langues officielles
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item py-2 lat">

                            <a class="nav-link {{ request()->routeIs('recruteur.project.create') ? 'active' : '' }}" 
                                href="{{ route('recruteur.project.create') }}">

                                Rédigez un projet

                            </a>

                        </li>

                        <li class="nav-item py-2 lat">

                            <a class="nav-link {{ request()->routeIs('recruteur.listeChercheurs') ? 'active' : '' }}" 
                                href="{{ route('recruteur.listeChercheurs') }}">

                                Chercheurs disponibles

                            </a>

                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
