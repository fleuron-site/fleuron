<footer class="footer pt-10 pb-5 mt-auto bg-light footer-light">
    <div class="container px-3">
        <div class="row gx-3">
            <div class="col-md-3">
                <div  class="footer-brand">Fleuron</div>
                <div class="mb-3"></div>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="{{route('welcome')}}">Accueil</a></li>
                    <li class="mb-2"><a href="{{route('principeFonctionnement')}}">Comment &#231;a marche ?</a></li>
                    <li class="mb-2"><a href="{{route('register')}}">Inscription</a></li>
                    <li class="mb-2"><a href="{{route('login')}}">Connexion</a></li>
                    <li class="mb-2"><a href="{{route('offres')}}">Offres</a></li>
                    <li class="mb-2"><a href="{{route('contacts')}}">Contactez-nous</a></li>
                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="footer-brand">Nos domaines d'intervention!</div>
                <div class="mb-3"></div>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <form method="POST" action="{{ route('searchoffre') }}">
                        {{ csrf_field() }}
                            <input class="form-control btn-key" name="employee_search" type="hidden" value="Developpement">
                            <button type="submit" name="offre" style="background: transparent;border: none;color: inherit !important;">
                                D&eacute;veloppement d'applications
                            </button>
                        </form>
                    </li>
                    <li class="mb-2">
                        <form method="POST" action="{{ route('searchoffre') }}">
                        {{ csrf_field() }}
                            <input class="form-control btn-key" name="employee_search" type="hidden" value="Services">
                            <button type="submit" name="offre" style="background: transparent;border: none;color: inherit !important;">
                                Services
                            </button>
                        </form>
                    </li>
                    <li class="mb-2">
                        <form method="POST" action="{{ route('searchoffre') }}">
                        {{ csrf_field() }}
                            <input class="form-control btn-key" name="employee_search" type="hidden" value="Syst¨¨mes d'entreprise">
                            <button type="submit" name="offre" style="background: transparent;border: none;color: inherit !important;">
                                Syst&egrave;mes d'entreprise
                            </button>
                        </form>
                    </li>
                    <li class="mb-2">
                        <form method="POST" action="{{ route('searchoffre') }}">
                        {{ csrf_field() }}
                            <input class="form-control btn-key" name="employee_search" type="hidden" value="Services">
                            <button type="submit" name="offre" style="background: transparent;border: none;color: inherit !important;">
                                Services
                            </button>
                        </form>
                    </li>
                    <li class="mb-2">
                        <form method="POST" action="{{ route('searchoffre') }}">
                        {{ csrf_field() }}
                            <input class="form-control btn-key" name="employee_search" type="hidden" value="Graphisme">
                            <button type="submit" name="offre" style="background: transparent;border: none;color: inherit !important;">
                                Graphisme
                            </button>
                        </form>
                    </li>
                    <li class="mb-2">
                        <form method="POST" action="{{ route('searchoffre') }}">
                        {{ csrf_field() }}
                            <input class="form-control btn-key" name="employee_search" type="hidden" value="Web">
                            <button type="submit" name="offre" style="background: transparent;border: none;color: inherit !important;">
                                Web
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            
            <div class="col-md-1"></div>
            
            <div class="col-md-2">
                <div class="footer-brand">Suivez-nous!</div>
                <div class="mb-3"></div>
                <div class="icon-list-social mb-5">
                    <a class="icon-list-social-link" href="https://www.facebook.com/FleuronTg" style="text-decoration: none;color: #212832;">
                        <i class="fab fa-facebook fa-w-14"></i><span style="color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;">xx</span>
                    </a>
                    <a class="icon-list-social-link" href="https://twitter.com/FleuronTg"  style="text-decoration: none;color: #212832;">
                        <svg class="svg-inline--fa fa-x-twitter fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="x-twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>xx</svg>
                        <span style="color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;">xx</span>
                    </a>
                    <a class="icon-list-social-link" href="https://www.youtube.com/@FleuronTg"  style="text-decoration: none;">
                        <i class="fab fa-youtube"></i><span style="color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;">xx</span>
                    </a>
                </div>
            </div>
            
        </div>
        <hr class="my-5" />
        <div class="row gx-5 align-items-center">
            <div class="col-md-6 small"><a style="color: rgb(37 35 35 / 70%)" href="{{route('welcome')}}">Copyright &copy; Fleuron 2023</a></div>
            <!--<div class="col-md-6 text-md-end small">
                <a href="#!">Privacy Policy</a>
                Â·
                <a href="#!">Terms &amp; Conditions</a>
            </div>-->
        </div>
    </div>
</footer>